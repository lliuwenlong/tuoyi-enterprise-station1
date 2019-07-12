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
 * @Description: 部门管理
 * @Author: gosea
 * @Date:   2017-02-14 19:34:13
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-02-14 19:34:19
 */
namespace Manage\Controller;
use Common\Lib\Category;

class DepartmentController extends CommonController
{

    //部门列表
    public function index()
    {

        $vlist = M('Department')->order('sorting ASC, id ASC')->select();
        $vlist = Category::toLevel($vlist, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);
        $this->meta_title = '部门管理';

        $this->assign('vlist', $vlist);
        $this->setAssign();
        $this->display();
    }

    /**
     * 部门添加
     */
    public function add()
    {

        if (IS_POST) {

            //M验证
            $validate = array(
                array('name', 'require', '部门名称不能为空！'),
                array('name', '', '部门已经存在！', 0, 'unique', 1),
            );
            $data = M('Department');
            if (!$data->validate($validate)->create()) {
                $this->error($data->getError());
            }

            if ($data->add()) {
                $this->success('添加成功', U('index'));
            } else {

                $this->error('添加失败');
            }

            exit();
        }
        $pid = I('get.pid', 0, 'intval');

        $vlistDepartment = M('Department')->order('sorting ASC, id ASC')->select();
        $vlistDepartment = Category::toLevel($vlistDepartment);

        $this->meta_title = "添加部门";

        $this->assign('vlistDepartment', $vlistDepartment);
        $this->assign('pid', $pid);
        $this->setAssign();
        $this->display();
    }

    public function edit()
    {
        $id = I('id', 0, 'intval');
        if (empty($id)) {
            $this->error('参数错误');
        }

        if (IS_POST) {
            $data            = I('post.', '');
            $data['id']      = I('id', 0, 'intval');
            $data['sorting'] = I('sorting', 0, 'intval');

            if (empty($data['name'])) {
                $this->error('名称不能为空！');
            }
            if (M('Department')->where(array('name' => $data['name'], 'id' => array('NEQ', $data['id'])))->find()) {
                $this->error('部门名已经存在，请更换');
            }

            if (false !== M('Department')->save($data)) {
                $this->success('修改成功', U('index'));
            } else {

                $this->error('修改失败');
            }

            exit();
        }
        $vdata = M('Department')->find($id);
        if (!$vdata) {
            $this->error('记录不存在');
        }

        $vlistDepartment = M('Department')->order('sorting ASC, id ASC')->select();
        $vlistDepartment = Category::toLevel($vlistDepartment);

        $this->meta_title = "修改部门";

        $this->assign('vdata', $vdata);
        $this->assign('vlistDepartment', $vlistDepartment);
        $this->setAssign();
        $this->display();
    }

    public function sort()
    {
        $sort_list = I('sort_list', array());
        if (empty($sort_list)) {
            $this->error('参数错误');
        }

        foreach ($sort_list as $key => $val) {
            $data = array('id' => $key, 'sorting' => $val);
            M('Department')->save($data);
        }
        $this->success('更新排序完成', U('index'));

    }

    public function del()
    {
        $id = I('id', 0, 'intval');
        if (empty($id)) {
            $this->error('参数错误');
        }

        //是否存在子集
        $data = M('Department')->where(array('pid' => $id))->find();
        if ($data) {
            $this->error('请先删除下属部门，才能删除本部门');
        }
        if (M('Department')->delete($id)) {
            $this->success('删除成功', U('index'));
        } else {
            $this->error('删除失败');
        }

    }

}
