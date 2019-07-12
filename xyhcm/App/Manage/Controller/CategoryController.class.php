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
 * @Last Modified time: 2017-11-25 10:10:46
 */
namespace Manage\Controller;

use Common\Lib\Category;

class CategoryController extends CommonController {

	//分类列表
	public function index() {

		//CategoryView 视图模型//$cate = get_category();
		$cate = D('CategoryView')->nofield('content')->order('category.sort,category.id')->select();
		$cate = Category::toLevel($cate, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);

		$this->assign('cate', $cate);
		$this->display();
	}

	//添加分类
	public function add() {

		if (IS_POST) {
			$this->addPost();
			exit();
		}
		$pid           = I('pid', 0, 'intval');
		$cate          = M('category')->order('sort')->select();
		$cate          = Category::toLevel($cate, '---', 0);
		$modelList     = M('model')->where(array('status' => 1))->order('sort')->select();
		$groupList     = M('MemberGroup')->order('rank')->select();
		$roleList      = M('authGroup')->order('id')->select(); //管理员组
		$styleListList = get_file_folder_List('./Public/Home/' . C('CFG_THEMESTYLE'), 2, 'List_*');
		$styleShowList = get_file_folder_List('./Public/Home/' . C('CFG_THEMESTYLE'), 2, 'Show_*');

		$this->assign('pid', $pid);
		$this->assign('cate', $cate);
		$this->assign('mlist', $modelList);
		$this->assign('groupList', $groupList);
		$this->assign('roleList', $roleList);
		$this->assign('styleListList', $styleListList);
		$this->assign('styleShowList', $styleShowList);
		$this->assign('type', '添加栏目');
		$this->display();
	}

	//添加分类处理

	public function addPost() {

		$data         = I('post.', '');
		$acc_group_id = I('acc_group_id', ''); //会员组权限
		$acc_role_id  = I('acc_role_id', ''); //管理组权限

		$data['name']    = trim($data['name']);
		$data['ename']   = trim($data['ename']);
		$data['type']    = empty($data['type']) ? 0 : intval($data['type']);
		$data['cat_pic'] = I('cat_pic', '', 'htmlspecialchars,trim');

		if (isset($data['type']) && $data['type'] == 1) {
			$data['model_id'] = 0;
		}
		//M验证
		if (empty($data['name'])) {
			$this->error('栏目名称不能为空！');
		}

		if (empty($data['ename'])) {
			$data['ename'] = get_pinyin(iconv('utf-8', 'GBK//ignore', $data['name']), 0, 1, C('DEFAULT_LANG'));
		} elseif ($data['type'] == 0) {
			if (!ctype_alnum($data['ename'])) {
				$this->error('别名只能由字母和数字组成，不能包含特殊字符！');
			}
		}

		if ($id = M('category')->add($data)) {
			//管理员组权限
			if (!empty($acc_role_id)) {
				$access = array();
				foreach ($acc_role_id as $v) {
					$tmp      = explode(',', $v);
					$access[] = array(
						'cat_id'  => $id,
						'role_id' => $tmp[1],
						'action'  => $tmp[0],
						'flag'    => 1,
					);
				}

				M('categoryAccess')->addAll($access);
			}

			//会员组权限
			if (!empty($acc_group_id)) {
				$access = array();
				foreach ($acc_group_id as $v) {
					$tmp      = explode(',', $v);
					$access[] = array(
						'cat_id'  => $id,
						'role_id' => $tmp[1],
						'action'  => $tmp[0],
						'flag'    => 0,
					);
				}
				M('categoryAccess')->addAll($access);
			}

			//attachment index 图片入库
			$first_pic = $data['cat_pic'];
			$content   = '';
			insert_att_index($content, $first_pic, $id, 0, 'category');

			get_category(0, 1); //清除栏目缓存
			get_category(1, 1); //清除栏目缓存
			get_category(10, 1); //清除栏目缓存
			get_category(2, 1); //清除栏目缓存
			$this->success('添加栏目成功<script type="text/javascript" language="javascript">window.parent.get_cate();</script>', U('Category/index'));
		} else {
			$this->error('添加栏目失败');
		}

	}

	//修改分类
	public function edit() {

		if (IS_POST) {
			$this->editPost();
			exit();
		}
		$id   = I('id', 0, 'intval');
		$data = M('category')->find($id);
		if (!$data) {
			$this->error('记录不存在');
		}

		$cate          = M('category')->order('sort')->select();
		$cate          = Category::toLevel($cate, '---', 0);
		$modelList     = M('model')->where(array('status' => 1))->order('sort')->select();
		$groupList     = M('MemberGroup')->order('rank')->select();
		$roleList      = M('authGroup')->order('id')->select(); //管理员组
		$styleListList = get_file_folder_List('./Public/Home/' . C('CFG_THEMESTYLE'), 2, 'List_*');
		$styleShowList = get_file_folder_List('./Public/Home/' . C('CFG_THEMESTYLE'), 2, 'Show_*');

		$this->assign('data', $data);
		$this->assign('cate', $cate);
		$this->assign('mlist', $modelList);
		$this->assign('groupList', $groupList);
		$this->assign('roleList', $roleList);
		$this->assign('styleListList', $styleListList);
		$this->assign('styleShowList', $styleShowList);
		$this->assign('type', '修改栏目');
		$this->display();
	}

	//修改分类处理

	public function editPost() {

		$data = I('post.', '');
		$id   = $data['id']   = intval($data['id']);
		$pid  = $data['pid'];

		$acc_group_id = I('acc_group_id', ''); //会员组权限
		$acc_role_id  = I('acc_role_id', ''); //管理组权限

		$data['name']    = trim($data['name']);
		$data['ename']   = trim($data['ename']);
		$data['type']    = empty($data['type']) ? 0 : intval($data['type']);
		$data['cat_pic'] = I('cat_pic', '', 'htmlspecialchars,trim');

		if (isset($data['type']) && $data['type'] == 1) {
			$data['model_id'] = 0;
		}

		//M验证
		if (empty($data['name'])) {
			$this->error('栏目名称不能为空！');
		}

		if ($id == $pid) {
			$this->error('失败！父级栏目不能是自己，请重新选择父级栏目');
		}
		$cate      = M('category')->field('id,pid')->order('sort')->select();
		$child_ids = Category::getChildsId($cate, $id, 1); //所有子栏目id--

		if (in_array($pid, $child_ids)) {
			$this->error('失败！父级栏目不能是自己子栏目，请重新选择父级栏目');
		}

		if ($data['old_model_id'] != $data['model_id']) {

			$table_name = M('model')->where(array('id' => $data['old_model_id']))->getField('table_name');
			if (!empty($table_name) && $table_name != 'page') {
				$vlist = M($table_name)->where(array('cid' => $id))->find();

				if ($vlist) {
					$this->error('请删除栏目下的文档，才能切换到新模型！');
				}
			}
		}

		if (empty($data['ename'])) {
			$data['ename'] = get_pinyin(iconv('utf-8', 'GBK//ignore', $data['name']), 0, 1, C('DEFAULT_LANG'));
		} elseif ($data['type'] == 0) {
			if (!ctype_alnum($data['ename'])) {
				$this->error('别名只能由字母和数字组成，不能包含特殊字符！');
			}
		}

		/*
			        if (M('category')->where(array('name' => $data['name'], 'id' => array('neq' , $id)))->find()) {
			        $this->error('栏目名称已经存在！');
			        }
		*/

		if (false !== M('category')->save($data)) {

			//清除权限
			M('categoryAccess')->where(array('cat_id' => $id))->delete();
			//管理员组权限
			if (!empty($acc_role_id)) {
				$access = array();
				foreach ($acc_role_id as $v) {
					$tmp      = explode(',', $v);
					$access[] = array(
						'cat_id'  => $id,
						'role_id' => $tmp[1],
						'action'  => $tmp[0],
						'flag'    => 1,
					);
				}

				M('categoryAccess')->addAll($access);
			}

			//会员组权限
			if (!empty($acc_group_id)) {
				$access = array();
				foreach ($acc_group_id as $v) {
					$tmp      = explode(',', $v);
					$access[] = array(
						'cat_id'  => $id,
						'role_id' => $tmp[1],
						'action'  => $tmp[0],
						'flag'    => 0,
					);
				}
				M('categoryAccess')->addAll($access);
			}

			//attachment index 图片入库
			$first_pic = $data['cat_pic'];
			$content   = '';
			insert_att_index($content, $first_pic, $id, 0, 'category');

			get_category(0, 1); //清除栏目缓存
			get_category(1, 1);
			get_category(10, 1); //清除栏目缓存
			get_category(2, 1);
			$this->success('修改栏目成功<script type="text/javascript" language="javascript">window.parent.get_cate();</script>', U('Category/index'));
		} else {
			$this->error('修改栏目失败');
		}

	}

	//批量更新排序
	public function sort() {
		$sortlist = I('sortlist', array(), 'intval');
		foreach ($sortlist as $k => $v) {
			$data = array(
				'id'   => $k,
				'sort' => $v,
			);
			M('category')->save($data);
		}
		// $this->redirect('Category/index');
		$this->success('更新排序成功', U('index'));
	}

	//修改分类处理

	public function del() {

		$id = I('id', 0, 'intval');

		//查询是否有子类
		$childnum = M('category')->where(array('pid' => $id))->count();
		if ($childnum) {
			$this->error('删除失败：请先删除本栏目下的子栏目');
		}
		$self = D('CategoryView')->field(array('model_id', 'table_name'))->where(array('category.id' => $id))->find();
		if (!$self) {
			$this->error('栏目不存在');
		}
		$table_name = $self['table_name'];
		$model_id   = $self['model_id'];

		if (M('category')->delete($id)) {
			$msg = '';
			if (!empty($table_name) && $table_name != 'page') {
				//删除栏目下文档之前，先删除文章资源引用
				$arc_id = M($table_name)->where(array('cid' => $id))->getField('id', true);
				if (!empty($arc_id)) {

					// delete picture index
					delete_att_tag_search(array('arc_id' => $arc_id, 'model_id' => $model_id));
					M($table_name)->where(array('cid' => $id))->delete();
				}
				$msg = '!!!';
			}
			M('categoryAccess')->where(array('cat_id' => $id))->delete();
			M('AttachmentIndex')->where(array('arc_id' => $id, 'model_id' => 0, 'desc' => 'category'))->delete();

			//更新栏目缓存
			get_category(0, 1);
			get_category(1, 1);
			get_category(10, 1);
			get_category(2, 1);
			$this->success('删除栏目成功' . $msg . '<script type="text/javascript" language="javascript">window.parent.get_cate();</script>', U('Category/index'));
		} else {
			$this->error('删除栏目失败');
		}
	}

}
