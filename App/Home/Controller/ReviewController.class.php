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
 * @Last Modified time: 2017-11-08 14:23:36
 */
namespace Home\Controller;

class ReviewController extends HomeCommonController {
	//方法：index
	public function index() {

	}

	public function add() {
		header("Content-Type:text/html; charset=utf-8");
		if (!IS_AJAX || !IS_POST) {
			//exit(json_encode( array('status' => 0, 'info' => '非法请求' ) ));
			$this->error('非法请求');
		}
		//M验证
		$data['post_id']   = I('post_id', 0, 'intval');
		$data['model_id']  = I('model_id', 0, 'intval');
		$data['pid']       = I('review_id', 0, 'intval');
		$data['title']     = I('title', '');
		$data['content']   = I('content', '');
		$data['post_time'] = date('Y-m-d H:i:s');
		$data['ip']        = get_client_ip();
		$data['agent']     = $_SERVER['HTTP_USER_AGENT'];

		$verify = I('vcode', '', 'htmlspecialchars,trim');
		if (C('cfg_verify_review') == 1 && !check_verify($verify)) {
			$this->error('验证码不正确');
		}

		//不能用empty(get_cookie('uid')),empty不能用于函数返回值
		if (!empty($this->uid)) {
			$data['user_id'] = $this->uid;
			$data['email']   = get_cookie('email');
			/*
				            if(get_cookie('nickname') != '') {
				            $data['username'] = get_cookie('nickname');
				            } else {
				            $data['username'] = preg_replace('/(\w+)\@(\w+)\.(\w+)/is',"$1@*.$3",get_cookie('email'));
				            }
			*/
			$data['username'] = get_cookie('nickname');

		} else {
			$data['user_id']  = 0;
			$data['username'] = I('nickname', '游客');
			$data['email']    = I('email', '', 'htmlspecialchars,trim');
		}
		if ($data['user_id'] == 0 && !C('CFG_FEEDBACK_GUEST')) {
//允许匿名评论
			$this->error('请登录后评论');
		}

		if (empty($data['post_id']) || empty($data['model_id'])) {
			$this->error('参数错误');
		}

		if (empty($data['title'])) {
			$this->error('文章不正确，请刷新再评论');
		}

		if (empty($data['content']) || mb_strlen($data['content'], 'utf-8') < 3) {
			$this->error('请填写评论内容，内容太短');
		}

		if (check_badword($data['content'])) {
			$this->error('评论内容包含非法信息，请认真填写！');
		}

		if ($id = M('comment')->add($data)) {
			//$this->success('添加成功',U(MODULE_NAME. '/Guestbook/index'));
			$list = array(
				//'status' => 1,
				'id'        => $id,
				'user_id'   => $data['user_id'],
				'review_id' => $data['pid'],
				'username'  => $data['username'],
				'ico'       => '',
				'avatar'    => get_avatar(get_cookie('face'), 30),
				'content'   => $data['content'],
				'post_time' => date('Y-m-d H:i:s'),
			);
			$furl = $_SERVER['HTTP_REFERER'];
			//exit(json_encode($list));
			$this->success('添加成功', $furl, $list);
		} else {
			$this->error('添加失败' . M('comment')->getError());
		}

	}

	public function getlist() {

		header("Content-Type:text/html; charset=utf-8"); //不然返回中文乱码
		if (!IS_AJAX) {
			exit('非法请求');
		}

		$post_id  = I('post_id', 0, 'intval');
		$model_id = I('model_id', 0, 'intval');
		$pageSize = I('num', 2, 'intval');
		$page     = I('page', 1, 'intval');
		$avatar   = I('avatar', 'middle');
		$user_id  = get_cookie('uid');
		$user_id  = empty($user_id) ? '0' : get_cookie('uid');

		$count = D('CommentView')->where(array('pid' => 0, 'post_id' => $post_id, 'model_id' => $model_id))->count();
		if ($count % $pageSize) {
			$pageCount = (int) ($count / $pageSize) + 1; //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
		} else {
			$pageCount = $count / $pageSize;
		}
		$page = $page > $pageCount ? $pageCount : $page;
		$page = $page < 1 ? 1 : $page;

		$data = D('CommentView')->where(array('pid' => 0, 'post_id' => $post_id, 'model_id' => $model_id))->order('comment.id DESC')->limit(($page - 1) * $pageSize, $pageSize)->select();
		if (empty($data)) {
			$data = array();
		}
		$list = array(
			'count'   => $count,
			'avatar'  => get_avatar(get_cookie('face'), 30),
			'user_id' => $user_id,
			'guest'   => intval(C('CFG_FEEDBACK_GUEST')),
			//'sql' => M('comment')->getlastsql(),
			//'review' => ''
		);
		$list['list'] = array();
		$ids          = array(); //所有id为下面的查询的pid

		foreach ($data as $k => $v) {
			$list['list'][] = array(
				'id'        => $v['id'],
				'user_id'   => $v['user_id'],
				'username'  => $v['username'],
				'ico'       => '',
				'avatar'    => get_avatar($v['face'], 30),
				'content'   => $v['content'],
				'post_time' => $v['post_time'],
				'child'     => array(), //后面就不用初始化
			);
			$ids[] = $v['id'];
		}

		//评论回复

		if (!empty($ids)) {
			$data = D('CommentView')->where(array('pid' => array('in', $ids), 'post_id' => $post_id, 'model_id' => $model_id))->order('comment.id')->select();

			if (!empty($data)) {
				foreach ($list['list'] as $k => $v) {
					foreach ($data as $k2 => $v2) {
						if ($v['id'] == $v2['pid']) {
							$list['list'][$k]['child'][] = array(
								'id'        => $v2['id'],
								'user_id'   => $v2['user_id'],
								'review_id' => $v2['pid'],
								'username'  => $v2['username'],
								'ico'       => '',
								'avatar'    => get_avatar($v2['face'], 30),
								'content'   => $v2['content'],
								'post_time' => $v2['post_time'],
							);

							unset($data[$k2]); //删除已经认领元素,减少内循环
						}
					}
				}
			}
		}

		unset($data);
		exit(json_encode($list));

	}

}
