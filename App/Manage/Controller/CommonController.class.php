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
 * 公共验证控制器CommonController
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-11-25 20:14:58
 */

namespace Manage\Controller;

use Think\Controller;

class CommonController extends Controller {
	//模板参数-页面标题
	protected $meta_title = '后台';

	//用户id
	protected $uid = 0;

	protected $cs_key = '';
	protected $cs_val = '';

	//_initialize自动运行方法，在每个方法前，系统会首先运动这个方法
	public function _initialize() {
		$this->uid    = session(C('USER_AUTH_KEY'));
		$this->cs_key = get_sys_xcp();
		$this->cs_val = get_sys_xcp(1);

		//判断用户是否登录
		if (empty($this->uid)) {
			$this->redirect('Login/index', '', 0, '页面跳转中...');
			exit();
		}

		C(get_cfg_value()); //添加配置
		$adminFlag  = session(C('ADMIN_AUTH_KEY'));
		$authOnFlag = C('AUTH_CONFIG.AUTH_ON'); //权限开启

		$noAuth = in_array(CONTROLLER_NAME, explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

		//是否开启验证 且 需要验证控制器或方法
		if (!$noAuth) {
			chk_sys();
		}
		if (!$adminFlag && $authOnFlag) {

			//检测访问权限
			$rule = strtolower(MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME);

			//需认证的模块
			if (!$noAuth) {

				if (!$this->checkCommonRule($rule)) {
					//非公共免权限

					if (!$this->checkRule($rule, 1)) {
						$this->error('无授权访问!');
					} else {
						//以后扩展
						// 检测分类及内容有关的各项动态权限
						$dynamic = $this->checkDynamic();
						if (false === $dynamic) {
							$this->error('无授权访问!');
						}
					}
				}

			} else if ($rule == strtolower(MODULE_NAME) . '/index/index') {
				//无需认证模板且是首页(需要menu)。必须导出session (_AUTH_LIST_XXX for menu);
				$this->checkRule($rule, 1);

			}

		}
		if (!function_exists('chk_sys')) {
			exit();
		}

		$this->assign('uid', $this->uid);
		$this->assign('cms_name', $this->cs_key);
		$this->assign('cms_url', $this->cs_val);
		$this->setAssign();

	}

	//设置公共模板变量
	public function setAssign() {
		$this->assign('meta_title', $this->meta_title);
	}

	/**
	 * 公共免权限检测--即只要登录，不需要权限的规则
	 * @param  string  $rule 检测的规则
	 * @return boolean       true:免权限
	 */
	final protected function checkCommonRule($rule) {
		//公共不需要权限

		$common_rule = array(); //不需要权限的控制器数组--CFG_COMMON_ACTION_FREE
		foreach ($common_rule as $key => &$val) {
			$val = strtolower($val);
		}

		if (in_array($rule, $common_rule)) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * 权限检测
	 * @param  string  $rule 检测的规则
	 * @param  integer $type 只验证type字段值,[1,2, array('in','1,2')]
	 * @param  string  $mode check模式,url,and
	 * @return boolean        [description]
	 */
	final protected function checkRule($rule, $type = 1, $mode = 'url') {
		static $Auth = null;
		if (!$Auth) {
			$Auth = new \Think\Auth();
		}
		if (!$Auth->check($rule, $this->uid, $type, $mode)) {
			return false;
		}
		return true;
	}
	/**
	 * 检测是否是需要动态判断的权限
	 * @return boolean|null
	 *      返回true则表示当前访问有权限
	 *      返回false则表示当前访问无权限
	 *      返回null，则表示权限不明
	 */
	protected function checkDynamic() {

	}

}
