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
 * 归档
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-10-01 23:17:56
 */

namespace Home\Controller;

class ArchiveController extends HomeCommonController {
	//方法：index
	public function index() {

		$cid      = I('cid', 0, 'intval');
		$model_id = I('model_id', 1, 'intval');
		$year     = I('year', 0, 'intval');
		$month    = I('month', 0, 'intval');
		$orderby  = 'publishtime desc';

		$model_name = M('model')->where(array('id' => $model_id))->getField('name');
		$model_name = empty($model_name) ? '文档' : str_replace('模型', '', $model_name);
		$title      = $model_name . '存档列表';

		$this->assign('title', $title);
		$this->assign('cid', $cid);
		$this->assign('model_id', $model_id);
		$this->assign('model_name', $model_name);
		$this->assign('year', $year);
		$this->assign('month', $month);
		$this->assign('page', '');
		$this->assign('purl', U('Archive/index', array('model_id' => $model_id)));
		$this->display();

	}

}
