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
 * @Last Modified time: 2017-11-25 20:09:19
 */
namespace Manage\Controller;

use Common\Lib\Category;

class IndexController extends CommonController {

	public function index() {

		$menu = M('menu')->where(array('status' => 1))->order('sort,id')->select();
		if (empty($menu)) {
			$menu = array();
		}
		$qmenu = M('menu')->where(array('status' => 1, 'quick' => 1))->order('sort,id')->select();
		if (empty($qmenu)) {
			$qmenu = array();
		}
		$menu_c = $qmenu_c = array();

		$adminFlag  = session(C('ADMIN_AUTH_KEY')); //超级管理员
		$authOnFlag = C('AUTH_CONFIG.AUTH_ON'); //权限开启

		//权限，是否开启验证且不是超级管理员
		if (!$adminFlag && $authOnFlag) {
			if (C('AUTH_CONFIG.AUTH_TYPE') == 1) {
				//时验证模式
			} else {
				$accessList = $_SESSION['_AUTH_LIST_' . $this->uid . '1']; //
			}

			//auth的权限规则目录--只有登录验证有效，否则无值
			foreach ($menu as $key => $val) {
				if (!in_array(strtolower($val['url']), $accessList)) {
					unset($menu[$key]);
				}
			}
			//auth的权限规则目录--只有登录验证有效，否则无值
			foreach ($qmenu as $key => $val) {
				if (!in_array(strtolower($val['url']), $accessList)) {
					unset($qmenu[$key]);
				}
			}

		}

		$this->assign('menu', Category::toLayer($menu));
		$this->assign('qmenu', $qmenu);
		$this->display();
	}

	public function getParentCate() {
		header("Content-Type:text/html; charset=utf-8"); //不然返回中文乱码
		$count = D('CategoryView')->where(array('pid' => 0, 'type' => 0))->count();
		$list  = D('CategoryView')->nofield('content')->where(array('pid' => 0, 'type' => 0))->order('category.sort,category.id')->select();
		if (empty($list)) {
			$list = array();
		}

		//权限检测
		$checkflag = true;
		if (empty($_SESSION[C('ADMIN_AUTH_KEY')])) {
			$checkaccess = M('categoryAccess')->distinct(true)->where(array('flag' => 1, 'role_id' => array('IN', $_SESSION['yang_adm_group_id'])))->getField('cat_id', true);

		} else {
			$checkflag = false;
		}
		if (empty($checkaccess)) {
			$checkaccess = array();
		}

		$menudoclist = array('count' => $count);
		foreach ($list as $v) {
			if (!$checkflag || in_array($v['id'], $checkaccess)) {
				$menudoclist['list'][] = array(
					'id'   => $v['id'],
					'name' => $v['name'],
					'url'  => U(ucfirst($v['table_name']) . '/index', array('pid' => $v['id'])),
				);
			}
		}
		exit(json_encode($menudoclist));
	}

}
