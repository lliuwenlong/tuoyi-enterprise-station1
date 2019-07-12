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
 * @Last Modified time: 2016-06-21 12:39:20
 */
namespace Home\Controller;

class GoController extends HomeCommonController
{

    public function index()
    {

        $url = I('url', 0, '');
        if (!empty($url)) {
            redirect($url);
        }

    }

    public function link()
    {

        $url = I('url', 0, '');
        if (!empty($url)) {
            $url = base64_decode($url);
            redirect($url);
        }

    }
}
