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
 * @Last Modified time: 2017-12-04 09:53:51
 */
namespace Manage\Controller;
use Common\Lib\Category;

class MemberGroupController extends CommonController {

	public function index() {

		$keyword = I('keyword', '', 'htmlspecialchars,trim'); //关键字
		$where   = array();
		if (!empty($keyword)) {
			$where['name'] = array('LIKE', "%{$keyword}%");
		}
		$count = M('MemberGroup')->where($where)->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = M('MemberGroup')->where($where)->order('rank,id')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', '会员组列表');
		$this->assign('keyword', $keyword);
		$this->display();
	}
	//添加
	public function add() {
		//当前控制器名称
		$actionName = strtolower(CONTROLLER_NAME);
		if (IS_POST) {
			$this->addPost();
			exit();
		}
		$this->display();
	}

	//
	public function addPost() {
		//M验证
		$validate = array(
			array('name', 'require', '会员组名必须填写！'),
			array('name', '', '会员组名已经存在！', 0, 'unique', 1),
		);
		$db = M('MemberGroup');
		if (!$db->validate($validate)->create()) {
			$this->error($db->getError());
		}
		if ($id = M('MemberGroup')->add()) {
			$this->success('添加成功', U('MemberGroup/index'));
		} else {
			$this->error('添加失败');
		}
	}

	//编辑
	public function edit() {
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		$actionName = CONTROLLER_NAME;

		if (IS_POST) {
			$this->editPost();
			exit();
		}

		$vo = M($actionName)->find($id);
		$this->assign('vo', $vo);
		$this->display();
	}

	//修改
	public function editPost() {

		$name = I('name', '', 'trim');
		$id   = I('id', 0, 'intval');
		if (empty($name)) {
			$this->error('会员组名必须填写！');
		}

		if (M('MemberGroup')->where(array('name' => $name, 'id' => array('neq', $id)))->find()) {
			$this->error('会员组名已经存在！');
		}

		if (false !== M('MemberGroup')->save($_POST)) {
			$this->success('修改成功', U('MemberGroup/index'));
		} else {

			$this->error('修改失败');
		}

	}

	public function categoryAccess() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}
		if (IS_POST) {
			//$id   = I('id', 0, 'intval');
			$acc_group_id = I('acc_group_id', ''); //会员权限

			//清除权限--管理组
			M('categoryAccess')->where(array('role_id' => $id, 'flag' => 0))->delete();

			//管理员组权限
			if (!empty($acc_group_id)) {
				$access = array();
				foreach ($acc_group_id as $v) {
					$tmp      = explode(',', $v);
					$access[] = array(
						'cat_id'  => $tmp[1],
						'role_id' => $id,
						'action'  => $tmp[0],
						'flag'    => 0,
					);
				}
				//p($access);exit();
				if (false !== M('categoryAccess')->addAll($access)) {
					$this->success('设置权限成功', U('index'));
				} else {
					$this->error('设置权限失败');
				}
			} else {
				$this->success('设置权限成功.', U('index'));
			}

			exit();
		}

		$cate = M('category')->order('sort')->select();
		$cate = Category::toLevel($cate, '&nbsp;&nbsp;&nbsp;', 0);

		$roles = M('CategoryAccess')->where(array('role_id' => $id, 'flag' => 0))->select();

		if (is_array($roles)) {
			foreach ($cate as $key => $val) {
				$cate[$key]['_access'] = array();
				foreach ($roles as $key2 => $val2) {
					if ($val2['cat_id'] == $val['id']) {
						$cate[$key]['_access'][] = $val2['action'];
						unset($val2[$key2]);
					}
				}
			}
		} else {
			foreach ($cate as $key => $val) {
				$cate[$key]['_access'] = array();
			}
		}

		$this->meta_title = '设置会员组栏目权限';

		$this->assign('cate', $cate);
		$this->assign('id', $id);
		$this->setAssign();
		$this->display();
	}

	//彻底删除
	public function del() {

		$id        = I('id', 0, 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->delBatch();
			return;
		}

		if (M('MemberGroup')->delete($id)) {
			$this->success('彻底删除成功', U('MemberGroup/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

	//批量彻底删除
	public function delBatch() {

		$idArr = I('key', 0, 'intval');
		if (!is_array($idArr)) {
			$this->error('请选择要彻底删除的项');
		}
		$where = array('id' => array('in', $idArr));

		if (M('MemberGroup')->where($where)->delete()) {
			$this->success('彻底删除成功', U('MemberGroup/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

}
