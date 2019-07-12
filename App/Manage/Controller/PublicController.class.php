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
 * @Last Modified time: 2017-11-25 20:02:23
 */
namespace Manage\Controller;

class PublicController extends CommonController {

	public function index() {

	}

	//后台内容主页
	public function main() {
		/* phpversion */
		$this->assign('phpversion', phpversion());
		$this->assign('software', $_SERVER["SERVER_SOFTWARE"]);
		$this->assign('os', PHP_OS);

		$_mysql_ver = M()->query('SELECT VERSION() as ver;');

		if (is_array($_mysql_ver)) {
			$mysql_ver = $_mysql_ver[0]['ver'];
		} else {
			$mysql_ver = '';
		}
		$this->assign('mysql_ver', $mysql_ver);
		$this->assign('saeflag', defined('APP_SAE_FLAG') ? 1 : 0);

		/* uploads */
		$this->assign('environment_upload', ini_get('file_uploads') ? ini_get('upload_max_filesize') : '不支持');
		$this->assign('cms_info', rw_data('ver', '', './Data/resource/'));
		$this->initHtml();
		$this->display();
	}

	public function editorMethod() {
		$_editor = new \Org\Editor\Ueditor();
	}

	//上传图片
	/**
	 * 上传图片
	 * @param  integer $img_flag 是否是图片(带缩略图)
	 * @return [type]               [description]
	 */
	public function upload($img_flag = 0) {
		header("Content-Type:text/html; charset=utf-8"); //不然返回中文乱码
		$result   = array('state' => '失败', 'url' => '', 'name' => '', 'original' => '');
		$sub_path = I('post.sfile', '', 'trim,htmlspecialchars'); //判断其他子目录

		$img_flag = empty($img_flag) ? 0 : 1;

		$yun_upload    = new \Common\Lib\YunUpload($img_flag, $sub_path);
		$upload_result = $yun_upload->upload();

		if ($upload_result['status']) {
			$result['state'] = 'SUCCESS';
			$result['info']  = $upload_result['data'];
		} else {
			$result['state'] = $upload_result['info'];
		}
		echo json_encode($result);

	}

	//文件/夹管理
	public function browseFile($spath = '', $stype = 'file') {
		$base_path  = '/uploads/img1';
		$enocdeflag = I('encodeflag', 0, 'intval');

		$where = array();
		switch ($stype) {
		case 'picture':
			$base_path = '/uploads/img1';
			$where     = array('file_type' => 1, 'has_litpic' => 1);
			break;
		case 'file':
			$base_path = '/uploads/file1';
			//$where     = array('file_type' => array('NEQ', 1));
			$where = array('has_litpic' => 0);
			break;
		case 'ad':
			$base_path = '/uploads/abc1';
			$where     = array('file_path' => array('LIKE', 'abc1/%'));
			break;
		default:
			exit('参数错误');
			break;
		}

		$count = M('attachment')->where($where)->order('upload_time DESC')->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;

		//显示有缩略图　文件
		$list = M('attachment')->where($where)->order('upload_time DESC')->limit($limit)->select();

		$imgtbSize = C('CFG_IMGTHUMB_SIZE'); //配置缩略图第一个参数
		foreach ($imgtbSize as $key => $val) {
			$imgtbSize[$key] = explode('X', $val);
		}

		$sto_url = get_url_path(C('CFG_UPLOAD_ROOTPATH'));
		foreach ($list as $key => $val) {
			$list[$key]['url']  = $sto_url . $val['file_path'];
			$list[$key]['size'] = get_byte($val['file_size']);
			$list[$key]['purl'] = ($val['has_litpic'] == 1 && isset($imgtbSize[0][0])) ? get_picture($sto_url . $val['file_path'], $imgtbSize[0][0], $imgtbSize[0][1]) : $sto_url . $val['file_path'];
			if ($val['has_litpic'] == 1) {
				$list[$key]['thumb_size'] = $imgtbSize;
			}
		}

		$this->assign('vlist', $list);
		$this->assign('stype', $stype);
		$this->assign('page', $page->show());
		$this->assign('type', '浏览文件');
		$this->display();

	}

	public function initHtml() {
		$here  = APP_PATH . MODULE_NAME . '/View/Public_main' . C('TMPL_TEMPLATE_SUFFIX');
		$_here = file_get_contents($here);

		if ($_here == false && file_exists($here)) {
			$_here = file_get_contents($here);
		}
		/* phpversion */
		$content = $this->fetch('Public:main');
		if (strpos($content, $this->cs_key) === false) {
			S('cs_error', 1, 1 * 60 * 60);
		} else {
			S('cs_error', 0, 24 * 60 * 60);
		}
	}

	public function checkState() {
		$result = array('code' => 0, 'msg' => '登录成功', 'data' => '', 'url' => U('Login/logout'));

		//登录失败
		if (empty($this->uid)) {
			$result['code'] = 0;
			$result['msg']  = '登录失败';
			$this->ajaxReturn($result);
		}

		$user = M('admin')->find($this->uid);
		if (!$user) {
			A('Login')->logout(1);
			$result['code'] = 0;
			$result['msg']  = '当前账号不存在，请重新登录';
			$this->ajaxReturn($result);
		}
		if ($user['is_lock'] == 1) {
			$result['code'] = 0;
			$result['msg']  = '当前账号已被锁定，请重新登录';
			A('Login')->logout(1);
			$this->ajaxReturn($result);
		}

		$result['code'] = 1;
		$result['msg']  = '登录成功';
		$result['url']  = U('Login/logout');

		$this->ajaxReturn($result);

	}

}
