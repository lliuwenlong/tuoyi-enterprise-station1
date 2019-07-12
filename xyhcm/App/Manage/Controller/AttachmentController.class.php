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
 * @Last Modified time: 2017-11-12 22:41:32
 */
namespace Manage\Controller;

class AttachmentController extends CommonController {

	public function index() {

		$count          = M('attachment')->count();
		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = M('attachment')->order('id DESC')->limit($limit)->select();
		if (!$list) {
			$list = array();
		}

		//统计引用
		foreach ($list as $k => $v) {
			$list[$k]['num'] = M('AttachmentIndex')->where(array('att_id' => $v['id']))->count();
		}

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('upload', get_url_path(get_cfg_value('CFG_UPLOAD_ROOTPATH')));
		$this->assign('type', '已上传文件管理');
		$this->display();
	}

	//重新生成缩略图
	public function reThum() {

		$id = I('id', 0, 'intval');
		$vo = M('attachment')->find($id);
		if (empty($vo)) {
			$this->error('不存在');
		}
		if ($vo['file_type'] != 1 || $vo['has_litpic'] != 1) {
			$this->error('重新生成缩略图失败！原因：原文件不是图片或不包含缩略图！');
		}
		//$_SERVER['DOCUMENT_ROOT'];//有的虚拟主机不行
		$path_upload = C('CFG_UPLOAD_ROOTPATH');
		// "/"开始,则转为绝对路径
		if (strpos($path_upload, "/") === 0) {
			$doc_path    = str_ireplace(str_replace("\\", "/", $_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_FILENAME']);
			$path_upload = $doc_path . $path_upload;
		}

		$file = $path_upload . $vo['file_path'];

		if (is_file($file) && file_exists($file)) {

			$ext_dest = 'jpg'; //针对图片--生成缩略图格式
			/*缩略图设置*/
			//设置需要生成缩略图,仅对图像文件有效
			//读取配置文件中的设置
			$imgtbSize     = C('CFG_IMGTHUMB_SIZE');
			$imgtbArray    = array();
			$imgtbFixArray = array();
			foreach ($imgtbSize as $v) {
				$t_size = explode('X', $v);

				if (empty($t_size) || empty($t_size[0])) {
					continue;
				}
				if (empty($t_size[1])) {
					//固定宽等比缩略
					$imgtbFixArray[] = array('w' => intval($t_size[0]), 'h' => intval($t_size[0] * 100));
				} else {
					$imgtbArray[] = array('w' => intval($t_size[0]), 'h' => intval($t_size[1]));
				}

			}

			if (!empty($imgtbFixArray) || !empty($imgtbArray)) {
				//默认使用GD
				$think_img = new \Think\Image();
				$thumbType = C('CFG_IMGTHUMB_TYPE') ? 3 : 1; //配置大小
				$real_path = $file;

				//生成缩略图,固定大小
				foreach ($imgtbArray as $i => $v) {
					$strSuffix = '!' . $v['w'] . 'X' . $v['h'];
					$think_img->open($real_path)->thumb($v['w'], $v['h'], $thumbType)->save($real_path . $strSuffix . '.' . $ext_dest, $ext_dest);

				}
				//生成缩略图，不放大，等宽，高度不限
				foreach ($imgtbFixArray as $v) {
					$strSuffix = '!' . $v['w'] . 'X';
					$think_img->open($real_path)->thumb($v['w'], $v['h'], 1)->save($real_path . $strSuffix . '.' . $ext_dest, $ext_dest);
				}

			}

			$this->success('重新生成缩略图成功！', U('index'));

		} else {
			$this->error('重新生成缩略图失败！文件：' . $file . ' 不存在或不是图片文件');
		}

	}

	//彻底删除文章
	public function del() {

		$id = I('id', 0, 'intval');
		$vo = M('attachment')->find($id);
		if (empty($vo)) {
			$this->error('不存在');
		}
		//$_SERVER['DOCUMENT_ROOT'];//有的虚拟主机不行
		$path_upload = C('CFG_UPLOAD_ROOTPATH');
		// "/"开始,则转为绝对路径
		if (strpos($path_upload, "/") === 0) {
			$doc_path    = str_ireplace(str_replace("\\", "/", $_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_FILENAME']);
			$path_upload = $doc_path . $path_upload;
		}

		$list = glob($path_upload . $vo['file_path'] . '*');

		if (!empty($list)) {
			foreach ($list as $v) {
				if (is_file($v) && file_exists($v)) {
					$ret = @unlink($v);
					if (!$ret) {
						$this->error('删除文件失败！文件：' . $v);
					}
				}

			}
		}

		if (M('attachment')->delete($id)) {
			M('AttachmentIndex')->where(array('att_id' => $id))->delete();
			$this->success('删除成功', U('Attachment/index'));
		} else {
			$this->error('删除失败');
		}
	}

}
