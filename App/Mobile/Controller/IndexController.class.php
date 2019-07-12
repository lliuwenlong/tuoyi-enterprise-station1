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
 * @Last Modified time: 2017-06-20 21:47:39
 */

namespace Mobile\Controller;

class IndexController extends MobileCommonController {
	//方法：index
	public function index() {

		$site_name  = C('CFG_WEBNAME');
		$site_title = C('CFG_WEBTITLE');
		$this->assign('title', empty($site_title) ? $site_name : $site_title);
		$this->assign('keywords', C('CFG_KEYWORDS'));
		$this->assign('description', C('CFG_DESCRIPTION'));
		$this->display();

	}
}
