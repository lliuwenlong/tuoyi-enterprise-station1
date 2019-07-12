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
 * @Last Modified time: 2017-10-01 23:39:00
 */
namespace Common\Model;

//视图模型
class SpecialViewModel extends ExViewModel {

	protected $viewFields = array(
		'special'  => array('*', '_type' => 'LEFT'),
		'category' => array(
			'name'     => 'cate_name',
			'ename'    => 'ename',
			'model_id' => 'model_id',
			'status'   => 'cate_status', //栏目状态，禁止的不显示
			'_on'      => 'special.cid = category.id', //_on 对应上面LEFT关联条件
		),

	);
}
