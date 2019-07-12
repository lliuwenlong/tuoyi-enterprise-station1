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
 * @Last Modified time: 2017-10-22 21:36:57
 */
namespace Home\Controller;

class SearchController extends HomeCommonController {

	public function index() {

		$modelid = I('model_id', 0, 'intval');
		$typeid  = I('type_id', 0, 'intval');
		$keyword = I('keyword', '', 'htmlspecialchars,trim'); //关键字

		if ($keyword == '请输入关键词') {
			$keyword = '';
		}

		if (empty($keyword)) {
			$title = '搜索中心';
		} else {
			$title = $keyword . '_搜索中心';
		}

		$this->assign('title', $title);
		$this->assign('keyword', $keyword);
		$this->assign('searchurl', U('Search/index'));
		$this->assign('model_id', $modelid);
		$this->assign('type_id', $typeid);
		$this->display();

	}

}
