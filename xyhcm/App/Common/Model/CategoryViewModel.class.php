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
 * @Last Modified time: 2017-10-01 12:41:11
 */
namespace Common\Model;

//视图模型
class CategoryViewModel extends ExViewModel {

	protected $viewFields = array(
		'category' => array('*', '_type' => 'LEFT'),
		'model'    => array(
			'name'       => 'model_name', //显示字段name as model
			'table_name' => 'table_name', //显示字段name as model
			'_on'        => 'category.model_id = model.id', //_on 对应上面LEFT关联条件
		),

	);
}
