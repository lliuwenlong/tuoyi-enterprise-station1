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
 * @Last Modified time: 2017-11-25 17:02:34
 */
namespace Manage\Controller;

use Think\Controller;

class LoginController extends Controller {

	public function index() {

		$this->display();
	}

	//登录验证
	public function login() {

		if (!IS_POST) {
			E('页面不存在!');
		}

		$username = I('username', '', 'htmlspecialchars,trim');
		$password = I('password', '');
		$verify   = I('code', '', 'htmlspecialchars,trim');

		if (!check_verify($verify, 'a_login_1')) {
			$this->error('验证码不正确');
		}

		if ($username == '' || $password == '') {
			$this->error('账号或密码不能为空');
		}

		$user = M('admin')->where(array('username' => $username))->find();

		if (!$user || ($user['password'] != get_password($password, $user['encrypt']))) {
			$this->error('账号或密码错误');
		}

		if ($user['is_lock']) {
			$this->error('用户被锁定！');
		}
		//更新数据库的参数
		$data = array('id' => $user['id'], //保存时会自动为此ID的更新
			'login_time'       => date('Y-m-d H:i:s'),
			'login_ip'         => get_client_ip(),
			'login_num'        => $user['login_num'] + 1,
		);
		//更新数据库
		M('admin')->save($data);
		$group_id = M('AuthGroupAccess')->where(array('uid' => $user['id']))->getField('group_id', true);
		$group_id = implode(',', $group_id);

		//保存Session
		session(C('USER_AUTH_KEY'), $user['id']);
		session('yang_adm_username', $user['username']);
		session('yang_adm_realname', $user['realname']);
		session('yang_adm_department', $user['department']); //部门
		session('yang_adm_group_id', $group_id); //职位
		session('yang_adm_time', time()); //登录的时间截
		session('yang_adm_login_time', $user['login_time']);
		session('yang_adm_login_ip', $user['login_ip']);

		//超级管理员
		if (9 == $user['user_type']) {
			session(C('ADMIN_AUTH_KEY'), true);
		}

		unset($_SESSION['_AUTH_LIST_' . $user['id'] . '1']); //清除权限列表--'1' 为type值
		//unset($_SESSION['_AUTH_LIST_'.$user['id']. '2']);//清除权限列表--'2' 为type值

		//跳转
		$this->success('登录成功', U('Index/index'));

	}

	//退出--reflag1为不跳转
	public function logout($reflag = 0) {

		session_unset();
		session_destroy();
		if (!$reflag) {
			$this->redirect('Login/index');
		}

	}

	//登录验证码
	public function verify($id = '1') {

		//ob_clean();
		$config = array(
			'fontSize' => 18,
			'length'   => 4,
			'imageW'   => 230,
			'imageH'   => 40,
			'bg'       => array(206, 233, 246),
			'useCurve' => false,
			'useNoise' => false,
		);
		$verify = new \Think\Verify($config);
		$verify->entry($id);
	}

	//js 用户名
	public function checkusername() {
		$username = I('username', '', 'htmlspecialchars,trim');
		$id       = I('id', 0, 'intval');
		if (empty($username)) {
			exit(0);
		}
		$user = M('admin')->where(array('username' => $username, 'id' => array('neq', $id)))->find();
		if ($user) {
			echo 1;
		} else {
			echo 0;
		}
	}
	//js email
	public function checkemail() {
		$email = I('email', '', 'htmlspecialchars,trim');
		$id    = I('id', 0, 'intval');

		if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			exit(-1);
		}

		$user = M('admin')->where(array('email' => $email, 'id' => array('neq', $id)))->find();
		if ($user) {
			echo 1;
		} else {
			echo 0;
		}
	}

	//RBAC

	//js 角色名
	public function checkRoleName() {
		$name = I('name', '', 'htmlspecialchars,trim');
		$id   = I('id', 0, 'intval');
		if (empty($name)) {
			exit(0);
		}
		$data = M('role')->where(array('name' => $name, 'id' => array('neq', $id)))->find();
		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}

	//js 节点名//debug
	public function checkNodeName() {
		$name = I('name', '', 'htmlspecialchars,trim');
		$id   = I('id', 0, 'intval');
		if (empty($name)) {
			exit(0);
		}
		$data = M('node')->where(array('name' => $name, 'id' => array('neq', $id)))->find();
		if ($data) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
