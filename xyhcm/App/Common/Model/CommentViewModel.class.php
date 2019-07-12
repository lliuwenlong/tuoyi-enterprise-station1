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
 * @Last Modified time: 2017-10-01 23:38:41
 */
namespace Common\Model;

use Think\Model\ViewModel;

//视图模型
class CommentViewModel extends ViewModel {

	protected $viewFields = array(
		'comment' => array('*',
			'_type' => 'LEFT',
		),
		'model'   => array(
			'name'       => 'model_name',
			'table_name' => 'table_name',
			'_on'        => 'comment.model_id = model.id', //_on 对应上面LEFT关联条件
			'_type'      => 'LEFT',
		),
		'member'  => array(
			'face'     => 'face', //显示字段name as model
			'nickname' => 'nickname', //显示字段name as model
			'_on'      => 'comment.user_id = member.id', //_on 对应上面LEFT关联条件
		),

	);
}
