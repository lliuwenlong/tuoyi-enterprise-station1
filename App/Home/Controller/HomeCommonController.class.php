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
 * @Last Modified time: 2017-11-25 16:42:27
 */
namespace Home\Controller;

use Think\Controller;

//公共验证控制器HomeCommonController
class HomeCommonController extends Controller {
	public $uid;
	public $email;
	public $uf; //标识
	// 空操作，404页面
	public function _empty() {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		$this->display(get_tpl('404.html'));
	}

	protected function _initialize() {
		$this->uid   = intval(get_cookie('uid'));
		$this->email = get_cookie('email');
		$this->uf    = get_cookie('uf');
		if (C('CFG_WEBSITE_CLOSE') == 1) {
			exit_msg(C('CFG_WEBSITE_CLOSE_INFO'));
		}
		if (!function_exists('get_sys_mcp') || !function_exists('get_sys_xcp')) {
			$msg = base64_decode('WFlIQ01T5qC45b+D5paH5Lu26KKr56C05Z2P');
			exit_msg($msg);
		}

		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$this->email = '';
		}
	}

}
