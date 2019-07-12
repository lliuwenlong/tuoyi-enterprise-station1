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
 * @Last Modified time: 2017-10-06 21:34:51
 */
namespace Home\Controller;

class GuestbookController extends HomeCommonController {

	public function index() {

		$this->assign('title', '留言本');
		$this->display();
	}
	//添加

	public function add() {

		if (!IS_POST) {
			exit();
		}
		$content = I('content', '');
		$data    = I('post.');
		$verify  = I('vcode', '', 'htmlspecialchars,trim');
		if (C('CFG_VERIFY_GUESTBOOK') == 1 && !check_verify($verify)) {
			$this->error('验证码不正确');
		}

		if (empty($data['username'])) {
			$this->error('姓名不能为空!');
		}
		if (empty($data['content'])) {
			$this->error('留言内容不能为空!');
		}
		if (check_badword($content)) {
			$this->error('留言内容包含非法信息，请认真填写!');
		}

		$data['post_time'] = date('Y-m-d H:i:s');
		$data['ip']        = get_client_ip();

		$db = M('guestbook');

		if ($id = $db->add($data)) {
			$this->success('添加成功', U('Guestbook/index'));
		} else {
			$this->error('添加失败');
		}
	}

}
