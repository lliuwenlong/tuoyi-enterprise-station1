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
 * @Last Modified time: 2017-10-18 18:31:01
 */
namespace Manage\Controller;

class LinkController extends CommonController {

	public function index() {
		$keyword = I('keyword', '', 'htmlspecialchars,trim'); //关键字

		$where = array();
		if (!empty($keyword)) {
			$where['name'] = array('LIKE', "%{$keyword}%");
		}

		$count = M('link')->where($where)->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = M('link')->where($where)->order('sort')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', '友情连接列表');
		$this->assign('keyword', $keyword);
		$this->display();
	}
	//添加
	public function add() {
		//当前控制器名称
		$actionName = strtolower(CONTROLLER_NAME);
		if (IS_POST) {
			$this->addPost();
			exit();
		}
		$this->display();
	}

	//
	public function addPost() {
		$data             = I('post.', '');
		$data['name']     = trim($data['name']);
		$data['url']      = trim($data['url']);
		$data['is_check'] = I('is_check', 0, 'intval');
		$data['sort']     = I('sort', 0, 'intval');
		if (empty($data['name']) || empty($data['url'])) {
			$this->error('网站名称或网址不能为空');
		}
		$data['post_time'] = date('Y-m-d H:i:s');

		if ($id = M('link')->add($data)) {
			//更新上传附件表
			if (!empty($data['logo'])) {
				//attachment index 图片入库
				$first_pic = $data['logo'];
				$content   = '';
				insert_att_index($content, $first_pic, $id, 0, 'link');
			}

			$this->success('添加成功', U('Link/index'));
		} else {
			$this->error('添加失败');
		}
	}

	//编辑文章
	public function edit() {
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		$actionName = strtolower(CONTROLLER_NAME);
		if (IS_POST) {
			$this->editPost();
			exit();
		}
		$vo = M($actionName)->find($id);
		$this->assign('vo', $vo);
		$this->display();
	}

	//修改文章处理
	public function editPost() {

		$data         = I('post.');
		$data['name'] = trim($data['name']);
		$data['url']  = trim($data['url']);
		$id           = $data['id']           = I('id', 0, 'intval');
		if (empty($data['name']) || empty($data['url'])) {
			$this->error('网站名称或网址不能为空');
		}

		if (false !== M('link')->save($_POST)) {
			//attachment index 图片入库
			$first_pic = $data['logo'];
			$content   = '';
			insert_att_index($content, $first_pic, $id, 0, 'link');

			$this->success('修改成功', U('Link/index'));
		} else {

			$this->error('修改失败');
		}

	}

	//彻底删除文章
	public function del() {

		$id        = I('id', 0, 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->delBatch();
			return;
		}

		if (M('link')->delete($id)) {
			M('AttachmentIndex')->where(array('arcid' => $id, 'model_id' => 0, 'desc' => 'link'))->delete();
			$this->success('彻底删除成功', U('Link/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

	//批量彻底删除文章
	public function delBatch() {

		$idArr = I('key', 0, 'intval');
		if (!is_array($idArr)) {
			$this->error('请选择要彻底删除的项');
		}
		$where = array('id' => array('in', $idArr));

		if (M('link')->where($where)->delete()) {
			M('AttachmentIndex')->where(array('arcid' => array('in', $idArr), 'model_id' => 0, 'desc' => 'link'))->delete();
			$this->success('彻底删除成功', U('Link/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

}
