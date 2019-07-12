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
 * @Last Modified time: 2017-11-24 21:40:27
 */
namespace Manage\Controller;

class CommentController extends CommonController {

	public function index() {

		$count = D('CommentView')->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = D('CommentView')->order('id DESC')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', '评论管理');
		$this->display();
	}

	//编辑文章
	public function edit() {
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		$actionName = strtolower(CONTROLLER_NAME);
		if (IS_POST) {
			$data            = I('post.');
			$data['content'] = I('content', '', '');
			if (false !== M('comment')->save($data)) {
				$this->success('修改成功', U('Comment/index'));
			} else {

				$this->error('修改失败');
			}
			exit();
		}

		$vo = M($actionName)->find($id);
		$this->assign('vo', $vo);
		$this->display();
	}

	//批量审核
	public function audit() {

		$idArr = I('key', 0, 'intval');
		if (!is_array($idArr)) {
			$this->error('请选择要审核的项');
		}
		$where = array('id' => array('in', $idArr));

		if (false !== M('comment')->where($where)->setField('status', 1)) {
			$this->success('审核成功', U('index'));
		} else {
			$this->error('审核失败');
		}
	}

	//彻底删除
	public function del() {

		$id        = I('id', 0, 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->delBatch();
			return;
		}

		if (M('comment')->delete($id)) {
			$this->success('彻底删除成功', U('Comment/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

	//批量彻底删除
	public function delBatch() {

		$idArr = I('key', 0, 'intval');
		if (!is_array($idArr)) {
			$this->error('请选择要彻底删除的项');
		}
		$where = array('id' => array('in', $idArr));

		if (M('comment')->where($where)->delete()) {
			$this->success('彻底删除成功', U('Comment/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

}
