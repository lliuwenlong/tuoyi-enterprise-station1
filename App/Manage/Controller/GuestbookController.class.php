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
 * @Last Modified time: 2017-11-28 13:23:34
 */
namespace Manage\Controller;

class GuestbookController extends CommonController {

	public function index() {

		$count = M('guestbook')->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = M('guestbook')->order('id DESC')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', '留言本管理');
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

		//M验证
		$validate = array(
			array('username', 'require', '姓名不能为空！'),
			array('content', 'require', '留言内容不能为空！'),
		);

		$auto = array(
			array('ip', 'get_client_ip', 1, 'function'),
		);

		$db = M('guestbook');
		if (!$db->auto($auto)->validate($validate)->create()) {
			$this->error($db->getError());
		}
		$db->post_time = date('Y-m-d H:i:s');

		if ($id = $db->add()) {
			$this->success('添加成功', U('Guestbook/index'));
		} else {
			$this->error('添加失败');
		}
	}

	//回复
	public function reply() {
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		$actionName = strtolower(CONTROLLER_NAME);
		if (IS_POST) {
			$this->replyPost();
			exit();
		}

		$vo          = M($actionName)->find($id);
		$vo['reply'] = htmlspecialchars($vo['reply']);

		$this->assign('vo', $vo);
		$this->display();
	}

	//回复处理
	public function replyPost() {

		$id           = I('id', '', 'intval');
		$reply        = I('reply', '', 'trim');
		$status       = I('status', 0, 'intval'); //1审核
		$private_flag = I('private_flag', 0, 'intval'); //1悄悄话
		$pic          = I('logo', '', 'trim');
		if (!$id) {
			$this->error('参数错误');
		}
		$data = array(
			'id'           => $id,
			'status'       => $status,
			'id'           => $id,
			'reply'        => $reply,
			'private_flag' => $private_flag,
			'reply_time'   => date('Y-m-d H:i:s'),
		);

		if (false !== M('guestbook')->save($data)) {
			$this->success('修改成功', U('Guestbook/index'));
		} else {

			$this->error('修改失败');
		}

	}

	//批量审核
	public function audit() {

		$idArr = I('key', 0, 'intval');
		if (!is_array($idArr)) {
			$this->error('请选择要审核的项');
		}
		$where = array('id' => array('in', $idArr));

		if (false !== M('guestbook')->where($where)->setField('status', 1)) {
			$this->success('审核成功', U('index'));
		} else {
			$this->error('审核失败');
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

		if (M('guestbook')->delete($id)) {
			$this->success('彻底删除成功', U('Guestbook/index'));
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

		if (M('guestbook')->where($where)->delete()) {
			$this->success('彻底删除成功', U('Guestbook/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

}
