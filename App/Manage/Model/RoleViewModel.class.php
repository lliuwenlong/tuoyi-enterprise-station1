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
 * @Last Modified time: 2016-06-21 12:37:02
 */
namespace Manage\Model;

use Think\Model\ViewModel;

//视图模型,假设是一对一，其实 不是多对多，暂时用吧
class RoleViewModel extends ViewModel
{

    protected $viewFields = array(
        'role_user' => array(
            'user_id' => 'user_id',
            //'_type' => 'LEFT'
        ),

        'role'      => array(
            'name'   => 'name', //显示字段name as role
            'remark' => 'remark', //显示字段name as role
            'status' => 'rstatus',
            '_on'    => 'role_user.role_id = role.id', //_on 对应上面LEFT关联条件
        ),
        /*    */

    );
}
