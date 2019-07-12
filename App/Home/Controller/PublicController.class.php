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
 * @Last Modified time: 2017-11-26 10:12:46
 */
namespace Home\Controller;

class PublicController extends HomeCommonController {

	public function login() {

		$member_open = C('CFG_MEMBER_OPEN'); //会员中心是否关闭
		if (!$member_open) {
			exit_msg('会员中心已关闭！');
		}

		$furl = $_SERVER['HTTP_REFERER'];
		if (IS_POST) {
			$this->loginPost();
			exit();
		}
		$this->assign('furl', $furl);
		$this->assign('title', '用户登录');
		$this->display();
	}

	public function loginPost() {

		if (!IS_POST) {
			exit();
		}

		$furl = I('furl', '', 'htmlspecialchars,trim');
		if (empty($furl) || strpos($furl, 'register') || strpos($furl, 'login') || strpos($furl, 'logout') || strpos($furl, 'activate') || strpos($furl, 'sendActivate')) {
			$furl = U(MODULE_NAME . '/Member/index');

		}

		$email    = I('email', '', 'htmlspecialchars,trim');
		$password = I('password', '');

		$verify = I('vcode', '', 'htmlspecialchars,trim');
		if (C('CFG_VERIFY_LOGIN') == 1 && !check_verify($verify)) {
			$this->error('验证码不正确');
		}

		if ($email == '') {
			$this->error('请输入帐号！', '', array('input' => 'email')); //支持ajax,$this->error(info,url,array);
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->error('账号为邮箱地址，格式不正确！', '', array('input' => 'email')); //支持ajax,$this->error(info,url,array);
		}

		if (strlen($password) < 4 || strlen($password) > 20) {
			$this->error('密码必须是4-20位的字符！', '', array('input' => 'password'));
		}

		$user = M('member')->where(array('email' => $email))->find();

		if (!$user || ($user['password'] != get_password($password, $user['encrypt']))) {
			$this->error('账号或密码错误', '', array('input' => 'password'));
		}

		if ($user['is_lock']) {
			$this->error('用户被锁定！', '', array('input' => ''));
		}
		//更新数据库的参数
		$data = array('id' => $user['id'], //保存时会自动为此ID的更新
			'login_time'       => date('Y-m-d H:i:s'),
			'login_ip'         => get_client_ip(),
			'login_num'        => $user['login_num'] + 1,

		);
		//更新数据库
		M('member')->save($data);

		$uf = $user['id'] . '.' . md5($user['password']) . '.' . get_random(6); //检测因子
		session('uid', $user['id']);

		set_cookie(array('name' => 'uid', 'value' => $user['id']));
		set_cookie(array('name' => 'email', 'value' => $user['email']));
		set_cookie(array('name' => 'nickname', 'value' => $user['nickname']));
		set_cookie(array('name' => 'group_id', 'value' => $user['group_id'])); //20140801
		set_cookie(array('name' => 'login_time', 'value' => $user['login_time']));
		set_cookie(array('name' => 'login_ip', 'value' => $user['login_ip']));
		set_cookie(array('name' => 'status', 'value' => $user['status'])); //激活状态
		set_cookie(array('name' => 'verifytime', 'value' => time())); //激活状态

		set_cookie(array('name' => 'uf', 'value' => $uf)); //登录标识

		$this->success('登录成功', $furl, array('input' => ''));
	}

	//退出
	public function logout() {

		$furl = $_SERVER['HTTP_REFERER'];

		if (empty($furl) || strpos($furl, 'register') || strpos($furl, 'login') || strpos($furl, 'activate') || strpos($furl, 'sendActivate')) {
			$furl = U(MODULE_NAME . '/Public/login');

		}

		session('uid', null);
		del_cookie(array('name' => 'uid'));
		del_cookie(array('name' => 'uf'));
		del_cookie(array('name' => 'email'));
		del_cookie(array('name' => 'nickname'));
		del_cookie(array('name' => 'group_id'));
		del_cookie(array('name' => 'login_time'));
		del_cookie(array('name' => 'login_ip'));
		del_cookie(array('name' => 'status'));
		del_cookie(array('name' => 'verifytime'));

		//$this->redirect(MODULE_NAME.'/Public/login');
		$this->success('安全退出', $furl);
	}

	//自动登录后，js验证，更新积分
	public function loginChk() {

		if (!IS_AJAX) {
			exit();
		}
		$nickname = get_cookie('nickname');
		$furl     = '';
		if ($this->_loginChk()) {
			$this->success('已登录', $furl, array('nickname' => $nickname));
		} else {
			$this->error('请登录!', '');
		}

	}

	//登录验证
	public function _loginChk() {
		$result = false;

		$nickname   = get_cookie('nickname');
		$login_time = get_cookie('login_time');
		$login_ip   = get_cookie('login_ip');
		$verifytime = intval(get_cookie('verifytime')); //上次登录时间
		$nickname   = empty($nickname) ? $this->email : $nickname;
		$user_id    = intval(session('uid'));

		if (empty($this->uid) || ($user_id > 0 && $user_id != $this->uid) || !filter_var($this->email, FILTER_VALIDATE_EMAIL) || empty($this->uf) || strpos($this->uf, '.') === false) {
			session('uid', null);
			del_cookie(array('name' => 'uid'));
			del_cookie(array('name' => 'uf'));
			del_cookie(array('name' => 'email'));
			del_cookie(array('name' => 'nickname'));
			del_cookie(array('name' => 'group_id'));
			del_cookie(array('name' => 'login_time'));
			del_cookie(array('name' => 'login_ip'));
			del_cookie(array('name' => 'status'));
			del_cookie(array('name' => 'verifytime'));
			return $result;
		}

		if (empty($user_id) || date('Y-m-d', $verifytime) != date('Y-m-d', time())) {

			$user_flag  = explode('.', $this->uf);
			$login_flag = true;
			if (count($user_flag) != 3) {
				$login_flag = false;
			}

			if ($login_flag) {
				$user = M('member')->where(array('id' => $this->uid, 'email' => $this->email))->find();
				if (!$user || (md5($user['password']) != $user_flag[1])) {
					$login_flag = false;
				} else {
					session('uid', $user['id']);
				}

			}

			if (!$login_flag) {
				session('uid', null);
				del_cookie(array('name' => 'uid'));
				del_cookie(array('name' => 'uf'));
				del_cookie(array('name' => 'email'));
				del_cookie(array('name' => 'nickname'));
				del_cookie(array('name' => 'group_id'));
				del_cookie(array('name' => 'login_time'));
				del_cookie(array('name' => 'login_ip'));
				del_cookie(array('name' => 'status'));
				del_cookie(array('name' => 'verifytime'));
				return $result;
			} else {
				set_cookie(array('name' => 'verifytime', 'value' => time())); //本次状态
			}

		}

		$result = true;
		return $result;
	}

	//注册
	public function register() {
		$member_open = C('CFG_MEMBER_OPEN'); //会员中心是否关闭
		if (!$member_open) {
			exit_msg('会员中心已关闭！');
		}

		if (IS_POST) {
			$this->registerPost();
			exit();
		}

		$this->assign('title', '用户注册');
		$this->display();
	}

	//兼容v1.5之前的注册提交
	public function registerHandle() {
		$this->register();
	}

	//注册
	public function registerPost() {

		if (!IS_POST) {
			exit(0);
		}

		$password = I('password', '');

		$verify = I('vcode', '', 'htmlspecialchars,trim');
		if (C('CFG_VERIFY_REGISTER') == 1 && !check_verify($verify)) {
			$this->error('验证码不正确');
		}
		//M验证
		$validate = array(
			array('email', 'require', '电子邮箱必须填写！'),
			array('email', 'email', '邮箱格式不符合要求。'),
			//array('group_id','require','请选择会员组！'),
			array('password', 'require', '密码必须填写！'),
			array('rpassword', 'require', '确认密码必须填写！'),
			array('password', 'rpassword', '两次密码不一致', 0, 'confirm'),
			array('email', '', '邮箱已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
		);

		$db = M('member');
		if (!$db->validate($validate)->create()) {
			$this->error($db->getError());
		}

		if (strlen($password) < 4 || strlen($password) > 20) {
			$this->error('密码必须是4-20位的字符！', '', array('input' => 'password'));
		}

		$nickname     = I('nickname', '', 'htmlspecialchars,trim');
		$notallowname = explode(',', C('CFG_MEMBER_NOTALLOW'));
		if (in_array($nickname, $notallowname)) {
			$this->error('此昵称系统禁用，请重新更换一个！');
		}

		//判断后台是否开始邮件验证
		$data['group_id'] = 2; //注册会员
		/*
	        $mGroup = M('membergroup')->Field('id')->find();
	        if ($mGroup) {
	        $data['group_id'] = $mGroup['id'];
	        }
*/

		$email            = I('email', '', 'htmlspecialchars,trim');
		$data['email']    = $email;
		$data['nickname'] = $nickname;
		$data['nickname'] = I('nickname', '');
		//代替自动完成
		$data['regtime']  = time();
		$passwordinfo     = I('password', '', 'get_password');
		$data['password'] = $passwordinfo['password'];
		$data['encrypt']  = $passwordinfo['encrypt'];
		$regtime          = date('Y年m月d日', time());
		$nextday          = date('Y年m月d日 H:i', strtotime("+2 day"));

		if ($id = $db->add($data)) {
			$msg               = '注册会员成功<br/>';
			$active['expire']  = strtotime("+2 day"); //二天后时间截,相当于time() + 2 * 24 * 60 * 60
			$active['code']    = get_randomstr(11);
			$active['user_id'] = $id;
			$active['id']      = M('active')->add($active);

			$url = rtrim(C('CFG_WEBURL'), '/') . "/index.php?m=" . MODULE_NAME . "&c=Public&a=activate&va={$active['id']}&vc={$active['code']}";
			//$url = preg_replace("#http:\/\/#i", '', $url);
			//$url = 'http://'.preg_replace("#\/\/#i", '/', $url);

			$webname = C('CFG_WEBNAME');
			$weburl  = C('CFG_WEBURL');
			$weburl2 = str_replace('http://www.', '', $weburl);
			$webqq   = C('cfg_qq');
			$webmail = C('cfg_email');

			$subject = "[{$webname}]请激活你的帐号，完成注册";
			$message = <<<str
<p>您于 {$regtime} 注册{$webname}帐号 <a href="mailto:{$email}">{$email}</a> ，点击以下链接，即可激活该帐号：</p>
<p><a href="{$url}" target="_blank">{$url}</a></p>
<p>(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>
<p>为了保障您帐号的安全性，请在 48小时内完成激活，此链接将在您激活过一次后失效！</p>
<p>此邮件由系统发送，请勿直接回复。</p>
str;
			if (C('CFG_MEMBER_VERIFYEMAIL')) {
				if (send_mail($email, $subject, $message) == true) {
					$msg .= '验证邮件已发送，请尽快查收邮件，激活该帐号';
				} else {

					$msg .= '验证邮件发送失败，请写管理员联系';
				}
			}

			$this->success($msg, U(MODULE_NAME . '/Public/login'));
		} else {
			$this->error('注册失败');
		}

	}

	public function sendActivate() {

		if (empty($this->uid)) {
			$this->error('请登录后尝试');
		}

		$user    = M('member')->find($this->uid);
		$email   = $user['email'];
		$regtime = date('Y年m月d日', $user['regtime']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->error('你的邮箱格式有错误！');
		}

		if ($user['status'] == 1) {
			$this->error('你的帐号邮件已经激活，本操作无效！');
		}

		$actinfo = M('active')->where(array('user_id' => $this->uid, 'expire' => array('gt', time())))->find();
		$data    = array();
		//有记录
		if ($actinfo) {
			$data['id']      = $actinfo['id'];
			$data['expire']  = $actinfo['expire'];
			$data['code']    = $actinfo['code'];
			$data['user_id'] = $this->uid;
		} else {

			$data['expire']  = strtotime("+2 day"); //二天后时间截,相当于time() + 2 * 24 * 60 * 60
			$data['code']    = get_randomstr(11);
			$data['user_id'] = $this->uid;
			//M('active')->delete($this->uid);//清除有的记录
			$data['id'] = M('active')->add($data);

		}

		$nextday = date('Y年m月d日 H:i', $data['expire']);

		$url = rtrim(C('CFG_WEBURL'), '/') . "/index.php?m=" . MODULE_NAME . "&c=Public&a=activate&va={$data['id']}&vc={$data['code']}";
		//$url = preg_replace("#http:\/\/#i", '', $url);
		//$url = 'http://'.preg_replace("#\/\/#i", '/', $url);

		$webname = C('CFG_WEBNAME');
		$weburl  = C('CFG_WEBURL');
		$weburl2 = str_replace('http://www.', '', $weburl);
		$webqq   = C('cfg_qq');
		$webmail = C('cfg_email');

		$subject = "[{$webname}]会员邮件验证通知，完成激活";
		$message = <<<str
<p>您于 {$regtime} 注册{$webname}帐号 <a href="mailto:{$email}">{$email}</a> ，点击以下链接，即可激活该帐号：</p>
<p><a href="{$url}" target="_blank">{$url}</a></p>
<p>(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>
<p>为了保障您帐号的安全性，请在 48小时内完成激活，此链接将在您激活过一次后失效！</p>
<p>此邮件由系统发送，请勿直接回复。</p>
str;

		$msg = '';
		if (send_mail($email, $subject, $message) == true) {
			$msg .= '验证邮件已发送，请尽快查收邮件，激活该帐号';
		} else {

			$msg .= '验证邮件发送失败，请写管理员联系';
		}
		$this->success($msg, U(MODULE_NAME . '/Member/index'), 10);

	}

	public function activate() {
		header("Content-Type:text/html; charset=utf-8");

		$id   = I('va', 0, 'intval');
		$code = I('vc', '', 'htmlspecialchars,trim');
		if (empty($code) || $id == 0) {
			exit('你的效验串不合法！<a href="' . C('CFG_WEBURL') . '">返回首页</a>');
		}
		$row = M('active')->where(array('id' => $id, 'expire' => array('gt', time())))->find();
		if ($code != $row['code']) {
			exit('激活码过期或错误！<a href="' . C('CFG_WEBURL') . '">返回首页</a>');
		}

		M('member')->where(array('id' => $row['user_id']))->setField('status', '1'); //激活用户状态设置
		//M('active')->delete($id);//从激活表中删除
		M('active')->where(array('id' => $row['id']))->setField('expire', '0'); //激活用户状态设置
		// 清除会员缓存
		//DelCache($mid);
		$this->success('激活操作成功，请重新登录！', U(MODULE_NAME . '/Public/login'));

	}

	/*Send verification code*/
	public function sendCode() {
		header("Content-Type:text/html; charset=utf-8");
		if (!IS_POST) {
			exit();
		}

		$email = I('username', '', 'htmlspecialchars,trim');
		$flag  = I('flag', 0, 'intval');

		//$flag为1时，需要验证email是否已经被使用，注册必需未使用的email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			//exit(json_encode(array('status'=>0,'info'=>'E-mail格式不正确！','input'=>'email')));
			//$this->ajaxReturn(array('status'=>0,'info'=>'E-mail格式不正确！','input'=>'email'),'JSON');//Thinkphp内部
			$this->error('E-mail格式不正确！', '', array('input' => 'email')); //TP3.1后，error和success支持ajax返回

		}

		if ($flag) {

			if ($user = M('member')->where(array('email' => $email))->find()) {
				$this->error('邮箱已经存在，请更换邮箱或直接登录！', '', array('input' => 'email'));
			}

		}

		//查询active表，是否发送过注册验证码，发过，则不再重新生成新的验证码，直接发送
		$actinfo = M('active')->where(array('email' => $email, 'type' => 1, 'expire' => array('gt', time())))->order('expire DESC')->find();
		$data    = array();
		//有记录
		if ($actinfo) {
			$data['id']      = $actinfo['id'];
			$data['user_id'] = 0;
			$data['code']    = $actinfo['code'];
			$data['expire']  = $actinfo['expire'];
			$data['type']    = $actinfo['type'];
			//小于3分钟,则更新有效期(延长)
			if ($data['expire'] - time() < 3 * 60) {
				$data['expire'] = time() + 20 * 60; //20 minutes
				M('active')->where(array('id' => $data['id']))->setField('expire', $data['expire']);
			}
		} else {

			$data['user_id'] = 0;
			$data['code']    = get_random(6, '1234567890'); //产生数字
			$data['expire']  = time() + 20 * 60; //20 minutes//strtotime("+2 day")  ;
			$data['email']   = $email;
			$data['type']    = 1;
			//M('active')->delete($this->uid);//清除有的记录
			$data['id'] = M('active')->add($data);

		}

		$nextday = date('Y年m月d日 H:i', $data['expire']);

		$regtime = date('Y年m月d日', time());
		$nextday = date('Y年m月d日 H:i', strtotime("+2 day"));

		//$url = rtrim(C('CFG_WEBURL'),'/'). "/index.php?m=". MODULE_NAME ."&c=Public&a=activate&va={$active['id']}&vc={$active['code']}";
		//$url = preg_replace("#http:\/\/#i", '', $url);
		//$url = 'http://'.preg_replace("#\/\/#i", '/', $url);

		$webname = C('CFG_WEBNAME');
		$weburl  = C('CFG_WEBURL');
		$weburl2 = str_replace('http://www.', '', $weburl);
		$webqq   = C('cfg_qq');
		$webmail = C('cfg_email');

		$subject = "[{$webname}]会员注册验证码";
		$message = <<<str
<p>您本次申请的验证码为：{$data['code']}</p>
<p> </p>
<p>1、为了保障您的安全，请不要将以上验证码告诉任何人，本站工作人员不会向您索取验证码。</p>
<p>2、如果本次验证码并非您本人申请，请忽略本邮件。。</p>
<p>此邮件由系统发送，请勿直接回复。</p>
str;
		$msg = '';
		if (send_mail($email, $subject, $message) == true) {
			$msg .= ''; //'验证邮件已发送，请尽快查收邮件，激活该帐号';
		} else {

			$msg .= '!'; //'验证邮件发送失败，请写管理员联系';
		}

		$this->success('验证码发送成功,请到邮箱查收' . $msg, '', array('input' => 'email'));

	}

	//增加点击数
	public function click() {
		$id         = I('id', 0, 'intval');
		$table_name = I('tn', '');
		if (!preg_match('/^[a-zA-Z0-9_]+$/', $table_name)) {
			$table_name = '';
		}
		if (C('HTML_CACHE_ON') == true) {
			echo 'document.write(' . get_click($id, $table_name) . ')';
		} else {
			echo get_click($id, $table_name);
		}

	}

	//证码码
	public function verify() {
		$verify = new \Think\Verify();
		$verify->entry(1);
	}

	//online
	public function online() {

		$mode = get_cfg_value('ONLINE_CFG_MODE');

		if ($mode != 1) {
			return '';
		}

		$style       = get_cfg_value('ONLINE_CFG_STYLE');
		$style       = empty($style) ? 'blue' : $style;
		$qq          = get_cfg_value('ONLINE_CFG_QQ');
		$wangwang    = get_cfg_value('ONLINE_CFG_WANGWANG');
		$phone       = get_cfg_value('ONLINE_CFG_PHONE');
		$css_view    = 'xyh-online-view';
		$style_view  = 'display:block;';
		$style_panel = 'visibility:hidden;'; //panel style

		if (empty($qq)) {
			$qq = array();
		}

		if (empty($wangwang)) {
			$wangwang = array();
		}
		$qq_param       = get_cfg_value('ONLINE_CFG_QQ_PARAM');
		$wangwang_param = get_cfg_value('ONLINE_CFG_WANGWANG_PARAM');
		//位置
		$_h_margin = get_cfg_value('ONLINE_CFG_H') == 2 ? 0 : get_cfg_value('ONLINE_CFG_H_MARGIN'); //水平
		$_v_margin = get_cfg_value('ONLINE_CFG_V') == 2 ? 0 : get_cfg_value('ONLINE_CFG_V_MARGIN');
		$_divM     = 0;
		//页面中间
		if (get_cfg_value('ONLINE_CFG_H') == 2 && get_cfg_value('ONLINE_CFG_V') == 2) {
			$css_view = 'xyh-online-view xyh-online-align-middle';
		} elseif (get_cfg_value('ONLINE_CFG_H') == 2) {
			if (get_cfg_value('ONLINE_CFG_V') == 0) {
				$css_view = 'xyh-online-view xyh-online-align-top';
				$style_view .= 'top:' . $_v_margin . 'px;';
			} else if (get_cfg_value('ONLINE_CFG_V') == 1) {
				$css_view = 'xyh-online-view xyh-online-align-bottom';
				$style_view .= 'bottom:' . $_v_margin . 'px;';
			}

		} elseif (get_cfg_value('ONLINE_CFG_V') == 2) {
			if (get_cfg_value('ONLINE_CFG_H') == 0) {
				$css_view = 'xyh-online-view xyh-online-align-left';
				$style_view .= 'left:' . $_h_margin . 'px;';
			} else if (get_cfg_value('ONLINE_CFG_H') == 1) {
				$css_view = 'xyh-online-view';
				$style_view .= 'right:' . $_h_margin . 'px;';
			}
		} else if (get_cfg_value('ONLINE_CFG_H') == 0) {
			$css_view = 'xyh-online-view xyh-online-align-left';
			$style_view .= 'left:' . $_h_margin . 'px;';
			if (get_cfg_value('ONLINE_CFG_V') == 0) {
				$style_view .= 'top:' . $_v_margin . 'px; margin-top:0;';
			} else if (get_cfg_value('ONLINE_CFG_V') == 1) {
				$style_view .= 'bottom:' . $_v_margin . 'px; margin-top:0;top:auto;';
				$style_panel .= 'bottom: 0; top:auto;';
			}

		} else if (get_cfg_value('ONLINE_CFG_H') == 1) {
			$css_view = 'xyh-online-view';
			$style_view .= 'right:' . $_h_margin . 'px;';
			if (get_cfg_value('ONLINE_CFG_V') == 0) {
				$style_view .= 'top:' . $_v_margin . 'px; margin-top:0; top:auto;';
			} else if (get_cfg_value('ONLINE_CFG_V') == 1) {
				$style_view .= 'bottom:' . $_v_margin . 'px; margin-top:0;top:auto;';
				$style_panel .= 'bottom: 0; top:auto;';
			}
		}

		$js_path = __ROOT__ . '/Data';

		$str = <<<str
		if(typeof jQuery != 'undefined'){
			$(function(){
				$('#XYHOnlineView .xyh-online-tool').mouseover(function(event) {
					$('#XYHOnlineView .xyh-online-panel').css('visibility', 'visible');
				})
				$('#XYHOnlineView').mouseleave(function(event) {
					$('#XYHOnlineView .xyh-online-panel').css('visibility', 'hidden');
				});
				$('#XYHOnlineView .xyh-online-panel-close').click(function(event) {
					$('#XYHOnlineView .xyh-online-panel').css('visibility', 'hidden');
				});
			});

		} else {
			console.log('没有jquery，在线客服开启失败!')
		}


	document.write('<link href="{$js_path}/static/js_plugins/online/{$style}.css?2017" rel="stylesheet" type="text/css" />');
	document.write('<div id="XYHOnlineView" class="{$css_view}" style="{$style_view}">');
	document.write('<div class="xyh-online-box">');
	document.write('<div class="xyh-online-tool"><span>咨询与建议</span></div>');
	document.write('<div class="xyh-online-panel" style="{$style_panel}">');
	document.write('<div class="xyh-online-panel-content">');
	document.write('<div class="xyh-online-panel-close"></div>');
	document.write('<dl>');
	document.write('<dd class="title">马上在线沟通</dd>');
str;
		$str .= "document.write('<dd>');";
		foreach ($qq as $k => $_qq):
			$k = isset($k) ? $k : '点击这里给我发消息';
			$str .= "document.write('" . str_replace(array('[客服号]', '[客服说明]', "\r\n", "'"), array($_qq, $k, '', "\'"), $qq_param) . "');";
		endforeach;

		foreach ($wangwang as $k => $_wangwang):
			$k = isset($k) ? $k : '点击这里给我发消息';
			$str .= "document.write('" . str_replace(array('[客服号]', '[客服说明]', "\r\n", "'"), array($_wangwang, $k, '', "\'"), $wangwang_param) . "');";
		endforeach;

		$str .= "document.write('</dd>');";

		if (get_cfg_value('ONLINE_CFG_PHONE_ON') == 1) {
			$str .= 'document.write(\'<dd class="title">热线电话</dd>\');';
			$str .= 'document.write(\'<dd>\');';
			foreach ($phone as $k => $_phone):
				$str .= 'document.write(\'<span class="xyh-online-item"><em class="xyh-online-ico-tel">&nbsp;</em><a href="tel:' . $_phone . '">' . (empty($k) ? '' : $k . '：') . $_phone . '</a></span>\');';
			endforeach;
			$str .= 'document.write(\'</dd>\');';

		}

		if (get_cfg_value('ONLINE_CFG_GUESTBOOK_ON') == 1) {

			$str .= 'document.write(\'<dd class="title">建议或留言</dd>\');';
			$str .= 'document.write(\'<dd><span class="xyh-online-item"><em class="xyh-online-ico-book">&nbsp;</em><a href="' . U('Guestbook/index') . '" target="_blank">给我们留言</a></span></dd>\');';
		}

		$str .= "document.write('</dl>');";
		$str .= "document.write('</div>');";
		$str .= "document.write('</div>');";
		$str .= "document.write('</div>');";
		$str .= "document.write('</div>');";
		echo $str;

	}

}
