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
 * 公共模型内容验证控制器CommonContentController
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-11-25 20:09:28
 */

namespace Manage\Controller;

use Think\Controller;

class CommonContentController extends Controller {

	protected $pid    = 0; //栏目id
	protected $cs_key = '';

	//_initialize自动运行方法，在每个方法前，系统会首先运动这个方法
	public function _initialize() {
		$this->pid    = I('pid', 0, 'intval');
		$this->cs_key = get_sys_xcp();
		if (empty($this->pid)) {
			$this->pid = I('get.pid', 0, 'intval');
		}

		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->redirect(MODULE_NAME . '/Login/index');
		}
		C(get_cfg_value()); //添加配置

		$adminFlag = isset($_SESSION[C('ADMIN_AUTH_KEY')]) ? $_SESSION[C('ADMIN_AUTH_KEY')] : 0;
		$adminRole = session('yang_adm_group_id');
		chk_sys(1);
		if (!$adminFlag) {
			check_category_access($this->pid, ACTION_NAME, $adminRole) || $this->error('没有权限');
		}

	}
}
