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
 * XYHCMS安装程序
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-11-26 09:26:54
 */
error_reporting(E_STRICT);
define('XYHCMS_INSTALL', 1);
header('Content-Type:text/html;charset=UTF-8');
// if(version_compare(PHP_VERSION,'5.3.0','<'))  die('<h1 style="text-align:center">PHP版本太低，请升级PHP，PHP最低要求为php5.3</h1>');

include 'inc/install.lang.php';
if (file_exists('install.lock')) {
	exit($lang['install_is_lock']);
}
$step = isset($_GET['step']) ? intval($_GET['step']) : 1;

if (empty($step)) {
	$step = 1;
}
switch ($step) {
case 1:
	$license = file_get_contents("./license.txt");
	require 'tpl/step_1.php';
	break;
case 2:
	/* 环境 */
	$environment_all = 1; //环境通过
	$software        = explode('/', $_SERVER["SERVER_SOFTWARE"]);
	$os_software     = '<span class="ok">' . PHP_OS . '<br />' . $software[0] . '/' . str_replace('PHP', '', $software[1]) . '</span>';
	/* phpversion */
	$phpversion = phpversion();
	$lowest     = '5.3.0';
	if (version_compare($phpversion, $lowest, '>=')) {
		$environment_phpversion = '<span class="ok">' . $phpversion . '</span>';
	} else {
		$environment_all = 0;
		//exit($lang['system_installation_requirements_php'].$lowest);
		$environment_phpversion = '<span class="no red">&nbsp;</span>';
	}
	/* mysql */
	$mysql_lowest = '5.1.0';
	/* pdo_mysql */
	if (extension_loaded('pdo_mysql')) {
		$environment_mysql = '<span class="ok">' . $lang['install_on'] . '</span>';
		$environment_pdo   = '<span class="ok">' . $lang['support'] . '</span>';
	} else {
		$environment_all   = 0;
		$environment_mysql = '<span class="no red">&nbsp;</span>';
		$environment_pdo   = '<span class="no red">' . $lang['unsupport'] . '</span>';
	}

	/* session_start */
	if (function_exists('session_start')) {
		$environment_session = '<span class="ok">' . $lang['install_on'] . '</span>';
	} else {
		$environment_all     = 0;
		$environment_session = '<span class="no red">' . $lang['unsupport'] . '</span>';
	}
	/* uploads */
	$environment_upload = ini_get('file_uploads') ? '<span class="ok">' . ini_get('upload_max_filesize') . '</span>' : '<span class="no red">&nbsp;</span>';

	/* iconv */
	if (function_exists('iconv')) {
		$environment_iconv = '<span class="ok">' . $lang['support'] . '</span>';
	} else {
		$environment_all   = 0;
		$environment_iconv = '<span class="no red">' . $lang['unsupport'] . '</span>';
	}
	/* GD */
	if (extension_loaded('gd')) {
		$environment_gd = '<span class="ok">' . $lang['support'] . '</span>';
	} else {
		$environment_all = 0;
		$environment_gd  = '<span class="no red">' . $lang['unsupport'] . '</span>';
	}

	/* mbstring */
	if (extension_loaded('mbstring')) {
		$environment_mb = '<span class="ok">' . $lang['support'] . '</span>';
	} else {
		$environment_all = 0;
		$environment_mb  = '<span class="no red">' . $lang['unsupport'] . '</span>';
	}

	/* file chmod */
	$_file = array(
		'/Install',
		'/uploads',
		'/App/Runtime',
		'/App/Common/Conf',
		'/App/Html',
		'/Data/resource',
	);
	$file = array();
	foreach ($_file as $key => $val) {
		$dirvalue = dirname(getcwd()) . '/' . ltrim($val, '/');
		$is_read  = is_readable($dirvalue);
		$is_write = is_writable($dirvalue);
		if (!$is_read || !$is_write) {
			$environment_all = 0;
		}
		$file[] = array(
			'path'  => $val,
			'read'  => $is_read,
			'write' => $is_write,
		);
	}

	require 'tpl/step_2.php';
	break;
case 3:

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (empty($_POST['DB_HOST'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['install_mysql_host_empty'], 'input' => 'DB_HOST')));
		}
		if (empty($_POST['DB_PORT'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['install_mysql_port_empty'], 'input' => 'DB_PORT')));
		}
		if (empty($_POST['DB_USER'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['install_mysql_username_empty'], 'input' => 'DB_USER')));
		}
		if (empty($_POST['DB_NAME'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['install_mysql_name_empty'], 'input' => 'DB_NAME')));
		}
		if (empty($_POST['DB_PREFIX'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['install_mysql_prefix_empty'], 'input' => 'DB_PREFIX')));
		}
		if (empty($_POST['WEB_URL'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['site_url_empty'], 'input' => 'WEB_URL')));
		}
		if (empty($_POST['username'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['install_founder_name_empty'], 'input' => 'username')));
		}
		if (empty($_POST['password'])) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['founder_invalid_password'], 'input' => 'password')));
		}
		if (strlen($_POST['password']) < 6) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['founder_invalid_password'], 'input' => 'password')));
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['email_failed'], 'input' => 'email')));
		}
		$dsn = "mysql:host={$_POST['DB_HOST']};port={$_POST['DB_PORT']};charset=utf8";

		try {
			$db = new PDO($dsn, $_POST['DB_USER'], $_POST['DB_PWD']);
		} catch (PDOException $e) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['database_connection_failed'] . ',' . $lang['error_message'] . $e)));
		}

		$db->exec("SET NAMES UTF8");
		$result = $db->exec("CREATE DATABASE IF NOT EXISTS `" . $_POST['DB_NAME'] . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;");

		//PDO和PDOStatement对象有errorCode() 和 errorInfo() 方法，如果没有任何错误, errorCode() 返回的是: 00000 ，否则就会返回一些错误代码。errorInfo() 返回的一个数组

		//失败，无返回值
		//if (!$result) {
		if ($result === false) {
			$err = $db->errorInfo();

			exit(json_encode(array('status' => 'error', 'info' => $lang['database_create_failed'] . ',' . $lang['error_message'] . end($err), 'input' => 'DB_NAME')));
		}
		unset($db);

		//右边的/一定要去除
		$_POST['WEB_URL']  = rtrim($_POST['WEB_URL'], '/');
		$_POST['add_test'] = isset($_POST['add_test']) ? intval($_POST['add_test']) : 0;
		$content           = var_export($_POST, true);
		if (file_put_contents('temp.php', "<?php\r\nreturn " . $content . "\r\n?>")) {
			exit(json_encode(array('status' => 'success')));
		} else {
			exit(json_encode(array('status' => 'error', 'info' => $lang['write_tmp_failed'])));
		}

		//判断配置目录是否可写
		if (!is_writable("../App/Conf")) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['conf_not_write'])));
		}

	} else {
		if (!empty($_SERVER['REQUEST_URI'])) {
			$scriptName = $_SERVER['REQUEST_URI'];
		} else {
			$scriptName = $_SERVER['PHP_SELF'];
		}

		$basepath = preg_replace("#\/install(.*)$#i", '', $scriptName);

		if (!empty($_SERVER['HTTP_HOST'])) {
			$baseurl = 'http://' . $_SERVER['HTTP_HOST'];
		} else {
			$baseurl = "http://" . $_SERVER['SERVER_NAME'];
		}

		$weburl = rtrim("http://" . $_SERVER['SERVER_NAME'] . $basepath, '/');

		require 'tpl/step_3.php';
	}
	break;
case 4:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$setting  = include './temp.php';
		$datafile = $setting['add_test'] == 1 ? './inc/xyhcms_data.sql' : './inc/xyhcms.sql';

		$content = file_get_contents($datafile); //带演示
		if (empty($setting)) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['load_failed_reinstall'])));
		}

		$cookie_code = get_randomstr(9);
		//去掉注释
		$content = preg_replace('/\/\*[\w\W]*?\*\//', '', $content);
		$content = preg_replace('/-- ----------------------------[\w\W]*?-- ----------------------------/', '', $content);
		$content = str_replace(
			array('#xyh#_', '#web_url#', '#web_name#', '#web_style#', '#web_cookie_code#', "\r"),
			array($setting['DB_PREFIX'], $setting['WEB_URL'], $setting['WEB_NAME'], $setting['WEB_STYLE'], $cookie_code, "\n"),
			$content);

		$content    = explode(";\n", $content);
		$installNum = count($content);

		$dsn = "mysql:host={$setting['DB_HOST']};port={$setting['DB_PORT']};dbname={$setting['DB_NAME']};charset=utf8";

		try {
			$db = new PDO($dsn, $setting['DB_USER'], $setting['DB_PWD']);
		} catch (PDOException $e) {
			exit(json_encode(array('status' => 'error', 'info' => $lang['database_connection_failed'] . ',' . $lang['error_message'] . $e)));
		}

		$db->exec("SET NAMES UTF8");

		$forNum = 0;
		$info   = '';

		foreach ($content as $tempsql) {
			$forNum++;
			$tempsql = trim($tempsql);
			if (empty($tempsql)) {
				continue;
			}

			$tempArray = explode("\n", $tempsql);
			$sql       = '';
			foreach ($tempArray as $query) {
				$sql .= $query;
			}
			if (empty($sql)) {
				continue;
			}

			preg_match('/create\s+table.*\`(.*)\`.*/Ui', $sql, $match);
			$flagOfTable = false;
			if (isset($match[1]) && !empty($match[1])) {
				$tableName   = $lang['data_table'] . $match[1] . '！';
				$flagOfTable = true;
			} else {
				preg_match('/insert\s+into\s+\`(.*)\`.*/iU', $sql, $match);
				if (isset($match[1]) && !empty($match[1])) {
					$tableName = $lang['write_data_table'] . $match[1];
				} else {
					$tableName = '';
				}
			}
			$result = $db->exec($sql . ';');
			if ($result === false) {
				$err    = $db->errorInfo();
				$status = 'error';
				$info .= $lang['install'] . $tableName . $lang['faile'] . ',' . $lang['error_message'] . end($err) . '<br/>';
				//错误直接返回
				exit(json_encode(array('status' => $status, 'info' => $info, 'num' => $forNum)));
			} else {
				$status = 'success';
				if ($flagOfTable) {
					$info .= $lang['installation_successful'] . $tableName . '<br/>';
				}
				$flagOfTable = false;

			}
		}

		//释放变量
		unset($content);

		//添加管理员
		$time = date('Y-m-d H:i:s');
		$ip   = getip();

		$passwordinfo = get_password($setting['password']);
		$password     = $passwordinfo['password'];
		$encrypt      = $passwordinfo['encrypt'];

		$result   = $db->exec("INSERT INTO `{$setting['DB_PREFIX']}admin` (`username`,`password`,`encrypt`,`user_type`,`login_time`,`login_ip`,`is_lock`) VALUES ('{$setting['username']}','$password','$encrypt',9,'$time','$ip',0);");
		$insertId = $db->lastInsertId();
		if (!$result || !$insertId) {
			$err = $db->errorInfo();
			exit(json_encode(array('status' => 'error', 'info' => $lang['create_administrator_failed'] . ',' . $lang['error_message'] . end($err) . ',' . $lang['please_refresh_installation'])));
		}
		unset($db);

		/* 保存install记录,如果删除则得不到最新的更新提示 */
		@file_get_contents('http://www.xyhcms.com/api.php?c=Cms&a=getInstallInfo&email=' . base64_encode($setting['email']) . '&url=' . $_SERVER["HTTP_HOST"] . '&lang=' . $_SERVER['HTTP_ACCEPT_LANGUAGE']);

		$status = 'success_all';
		$info .= 'XYHCMS' . $lang['installation_successful'];

		exit(json_encode(array('status' => $status, 'info' => $info, 'num' => $forNum)));
	}
	require 'tpl/step_4.php';
	break;
case 5:
	$setting = require './temp.php';
	/* 修改配置文件 */
	//定义数组
	$db = array('DB_TYPE' => 'mysqli',
		'DB_HOST'             => $setting['DB_HOST'],
		'DB_PORT'             => $setting['DB_PORT'],
		'DB_USER'             => $setting['DB_USER'],
		'DB_PWD'              => $setting['DB_PWD'],
		'DB_NAME'             => $setting['DB_NAME'],
		'DB_PREFIX'           => $setting['DB_PREFIX'],
		'DB_CHARSET'          => 'utf8',
	);

	$dbStr = "<?php return " . var_export($db, true) . ";?>";
	file_put_contents('../App/Common/Conf/db.php', $dbStr); //写文件
	//copy('./inc/conf/config.php', '../App/Common/Conf/config.php');
	$cache_prefix = get_randomstr(7) . '_';
	$cfg_content  = file_get_contents('./inc/conf/config.php');
	$cfg_content  = str_replace('#data_cache_prefix#', $cache_prefix, $cfg_content);
	file_put_contents('../App/Common/Conf/config.php', $cfg_content); //写文件

	//删除临时文件
	@unlink('temp.php');
	//删除缓存
	del_dir_file('../App/Runtime', false);
	/* 设置安装完成文件 */
	file_put_contents('install.lock', time());
	require 'tpl/step_5.php';
	break;
default:
	require 'tpl/step_1.php';
}

function getip() {
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$onlineip = $_SERVER['HTTP_CLIENT_IP'];
	} else {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	$onlineip = preg_match('/[\d\.]{7,15}/', addslashes($onlineip), $onlineipmatches);
	return $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';
}

function format_textarea($string) {
	$chars = 'utf-8';
	return nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($string, ENT_COMPAT, $chars)));
}

/**
 * 对用户的密码进行加密
 * @param $password
 * @param $encrypt //传入加密串，在修改密码时做认证
 * @return array/password
 */
function get_password($password, $encrypt = '') {
	$pwd             = array();
	$pwd['encrypt']  = $encrypt ? $encrypt : get_randomstr();
	$pwd['password'] = md5(md5(trim($password)) . $pwd['encrypt']);
	return $encrypt ? $pwd['password'] : $pwd;
}

/**
 * 生成随机字符串
 */
function get_randomstr($length = 6) {
	$chars = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
	$hash  = '';
	$max   = strlen($chars) - 1;
	for ($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

//循环删除目录和文件函数
function del_dir_file($dirName, $bFlag = true) {
	if ($handle = opendir("$dirName")) {
		while (false !== ($item = readdir($handle))) {
			if ($item != "." && $item != "..") {
				if (is_dir("$dirName/$item")) {
					del_dir_file("$dirName/$item");
				} else {
					@unlink("$dirName/$item");
				}
			}
		}
		closedir($handle);
		if ($bFlag) {
			rmdir($dirName);
		}

	}
}
