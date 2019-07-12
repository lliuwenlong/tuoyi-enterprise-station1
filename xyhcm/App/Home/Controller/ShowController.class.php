<?php
/**
 *　                  oooooooooooo
 *
 *                  ooooooooooooooooo
 *                       o
 *                      o
 *                     o        o
 *                    oooooooooooo
 *
 *         ～～         ～～         　　～～
 *       ~~　　　　　~~　　　　　　　　~~
 * ~~～~~～~~　　　~~~～~~～~~～　　　~~~～~~～~~～
 * ·······              ~~XYHCMS~~            ·······
 * ·······  闲看庭前花开花落 漫随天外云卷云舒 ·······
 * ·············     www.xyhcms.com     ·············
 * ··················································
 * ··················································
 *
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-11-08 15:45:19
 */
namespace Home\Controller;

use Common\Lib\Category;

class ShowController extends HomeCommonController {
	//方法：index
	public function index() {
		$id    = I('id', 0, 'intval');
		$cid   = I('cid', 0, 'intval');
		$ename = I('e', '', 'htmlspecialchars,trim');

		if ($id == 0) {
			$this->error('参数错误');
		}

		$cate = get_category(10);
		if (!empty($ename)) { //ename不为空
			$self = Category::getSelfByEName($cate, $ename); //当前栏目信息
		} else {
			//$cid来判断
			$self = Category::getSelf($cate, $cid); //当前栏目信息
		}
		if (empty($self) || $self['type'] == 1) {
			//栏目不存在||外链||4禁止访问(4不会读取);
			R('Home/Empty/_empty'); //404
			return;
		}

		$cid         = $self['id']; //当使用ename获取的时候，就要重新给$cid赋值，不然0
		$_GET['cid'] = $cid; //栏目ID
		$self['url'] = get_url($self);

		//访问权限
		$group_id = intval(get_cookie('group_id'));
		$group_id = (empty($group_id) || empty($this->uid)) ? 1 : $group_id; //1为游客
		//判断访问权限
		$access = M('categoryAccess')->where(array('cat_id' => $cid, 'flag' => 0, 'action' => 'visit'))->getField('role_id', true);
		//权限存在，则判断
		if (!empty($access) && !in_array($group_id, $access)) {
			$this->error('您没有访问该信息的权限！');
		}

		$patterns      = array('/' . C('TMPL_TEMPLATE_SUFFIX') . '$/');
		$replacements  = array('');
		$template_show = preg_replace($patterns, $replacements, $self['template_show']);

		if (empty($template_show)) {
			$this->error('模板不存在');
		}

		$content = M($self['table_name'])->where(array('delete_status' => 0, 'id' => $id))->find();

		if (empty($content)) {
			R('Home/Empty/_empty'); //404
			//$this->error('内容不存在');
			return;
		}

		//当前url
		$_jumpflag      = ($content['flag'] & B_JUMP) == B_JUMP ? true : false;
		$content['url'] = get_content_url($content['id'], $content['cid'], $self['ename'], $_jumpflag, $content['jump_url']);

		$this->assign('cate', $self);
		$this->assign('title', $content['title']);
		$this->assign('keywords', $content['keywords']);
		$this->assign('description', empty($content['description']) ? $content['title'] : $content['description']);
		$this->assign('comment_flag', $content['comment_flag']); //是否允许评论,debug,以后加上个全局评价 $content['comment_flag'] && CFG_Comment
		$this->assign('table_name', $self['table_name']);
		$this->assign('id', $id);

		switch ($self['table_name']) {
		case 'article':
			break;
		case 'phrase':
			break;
		case 'page':
			break;
		case 'picture':
		case 'product':
			$content['picture_urls'] = get_picture_array($content['picture_urls']);
			break;

		case 'soft':
			//图片
			$content['picture_urls'] = get_picture_array($content['picture_urls']);
			//下载地址:
			$down_link = get_picture_array($content['down_link']);

			foreach ($down_link as $key => $v) {
				if (!empty($v['url'])) {
					$down_link[$key]['url'] = U('Show/download', array('id' => $id, 'at' => $key));
				} else {
					unset($down_link[$key]);
				}
			}
			$content['down_link'] = $down_link;
			break;
		default:
			$userOther = A(ucfirst($self['table_name']));
			$userOther->shows();
			return;
			break;
		}

		$this->assign('content', $content);
		$this->display($template_show);

	}

	public function download() {
		$id = I('id', 0, 'intval');
		$at = I('at', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}
		$down_link_tmp = M('soft')->where(array('id' => $id))->getField('down_link');
		if (empty($down_link_tmp)) {
			$this->error('文件不存在');
		}

		//下载地址:
		$down_link = get_picture_array($down_link_tmp);

		if (!isset($down_link[$at]['url'])) {
			$this->error('文件不存在!');
		}
		$fileurl = trim($down_link[$at]['url']);

		$cfg_download_hide = C('CFG_DOWNLOAD_HIDE');

		//远程文件
		if (strpos($fileurl, ':/') || empty($cfg_download_hide)) {
			header("Location: $fileurl");
		} else {

			$filename = basename($fileurl);
			//处理中文文件

			$ext      = strtolower(substr(strrchr($filename, "."), 1)); //获取文件扩展名
			$filename = date('Ymd_his') . get_randomstr(3) . '.' . $ext;
			$this->downLocalFile($fileurl, $filename);

		}
	}

	/**
	 * 文件下载
	 * @param $filepath 文件路径
	 * @param $filename 文件名称
	 */
	private function downLocalFile($filepath, $filename = '') {
		if (!$filename) {
			$filename = basename($filepath);
		}

		$doc_path = str_ireplace(str_replace("\\", "/", $_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_FILENAME']);
		$realpath = $doc_path . $filepath;
		if (!file_exists($realpath)) {
			header('HTTP/1.1 404 Not Found');
			echo "Error: 404 Not Found.(server file path error)<!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding -->";
			exit;
		}

		$filetype = strtolower(substr(strrchr($filename, "."), 1)); //获取文件扩展名
		$filesize = sprintf("%u", filesize($realpath));
		if (ob_get_length() !== false) {
			@ob_end_clean();
		}

		header('Pragma: public');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: pre-check=0, post-check=0, max-age=0');
		header('Content-Transfer-Encoding: binary');
		header('Content-Encoding: none');
		header('Content-type: ' . $filetype);
		if (preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT'])) {
			//for IE
			header('Content-Disposition: attachment; filename="' . rawurlencode($filename) . '"');
		} else {
			header('Content-Disposition: attachment; filename="' . $filename . '"');
		}
		header('Content-length: ' . $filesize);
		readfile($realpath);
		exit;
	}

}
