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
 * @Description: 权限管理
 * @Author: gosea
 * @Date:   2015-04-10 10:10:57
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-12-04 09:53:28
 */
namespace Manage\Controller;

use Common\Lib\Category;

class AuthController extends CommonController {

	//用户组列表
	public function index() {

		$vlist = M('AuthGroup')->alias('a')->field('a.*')
			->order('a.id ASC')->select();
		$this->meta_title = '职位管理';

		$this->assign('vlist', $vlist);
		$this->setAssign();
		$this->display();
	}

	/**
	 * 用户组添加
	 */
	public function addGroup() {

		if (IS_POST) {

			//M验证
			$validate = array(
				array('title', 'require', '职位名称不能为空！'),
			);
			$data = M('AuthGroup');
			if (!$data2 = $data->validate($validate)->create()) {
				$this->error($data->getError());
			}

			if (M('AuthGroup')->where(array('title' => $data2['title']))->find()) {
				$this->error('此部门职位已经存在');
			}
			$data->status = I('status', 0, 'intval');

			if ($data->add()) {
				$this->success('添加成功', U('index'));
			} else {

				$this->error('添加失败');
			}

			exit();
		}

		$this->meta_title = "添加职位";
		$this->setAssign();
		$this->display();
	}

	public function editGroup() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}

		if (IS_POST) {
			$data           = I('post.', '');
			$data['id']     = I('id', 0, 'intval');
			$data['status'] = I('status', 0, 'intval');

			if (empty($data['title'])) {
				$this->error('名称不能为空！');
			}
			if (M('AuthGroup')->where(array('title' => $data['title'], 'id' => array('NEQ', $data['id'])))->find()) {
				$this->error('此职位已经存在，请更换');
			}

			if (false !== M('AuthGroup')->save($data)) {
				$this->success('修改成功', U('index'));
			} else {

				$this->error('修改失败');
			}

			exit();
		}
		$vdata = M('AuthGroup')->find($id);
		if (!$vdata) {
			$this->error('记录不存在');
		}

		$this->meta_title = "修改职位";

		$this->assign('vdata', $vdata);
		$this->setAssign();
		$this->display();
	}

	public function updateGroup() {
		$data['id']     = I('id', 0, 'intval');
		$data['status'] = I('status', 0, 'intval');
		if (empty($data['id'])) {
			$this->error('参数错误');
		}

		if ($data['status'] == 1) {
			$msg            = '禁用';
			$data['status'] = 0;
		} else {
			$msg            = '启用';
			$data['status'] = 1;
		}

		if (false !== M('AuthGroup')->save($data)) {
			$this->success($msg . '成功', U('index'));
		} else {

			$this->error($msg . '失败');
		}

	}

	public function access() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}
		if (IS_POST) {
			$data['id']    = I('id', 0, 'intval');
			$data['rules'] = I('roleslist', '');
			$data['rules'] = implode(',', $data['rules']);
			if (false !== M('AuthGroup')->save($data)) {

				$this->success('设置权限成功', U('index'));
			} else {
				$this->error('设置权限失败');
			}

			exit();
		}
		$roles = M('AuthGroup')->where(array('id' => $id))->getField('rules');
		$roles = explode(',', $roles);

		$vlist            = M('AuthRule')->where(array('status' => 1))->select();
		$vlist            = Category::toTree($vlist);
		$this->meta_title = '设置职位权限';

		$this->assign('vlist', $vlist);
		$this->assign('roles', $roles);
		$this->assign('id', $id);
		$this->setAssign();
		$this->display();
	}

	public function categoryAccess() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}
		if (IS_POST) {
			//$id   = I('id', 0, 'intval');
			$acc_roleid = I('acc_roleid', ''); //管理组权限

			//清除权限--管理组
			M('categoryAccess')->where(array('role_id' => $id, 'flag' => 1))->delete();

			//管理员组权限
			if (!empty($acc_roleid)) {
				$access = array();
				foreach ($acc_roleid as $v) {
					$tmp      = explode(',', $v);
					$access[] = array(
						'cat_id'  => $tmp[1],
						'role_id' => $id,
						'action'  => $tmp[0],
						'flag'    => 1,
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

		$roles = M('CategoryAccess')->where(array('role_id' => $id, 'flag' => 1))->select();

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

		$this->meta_title = '设置栏目权限';

		$this->assign('cate', $cate);
		$this->assign('id', $id);
		$this->setAssign();
		$this->display();
	}

	public function rule() {

		$vlist            = M('AuthRule')->select();
		$vlist            = Category::toTree($vlist);
		$this->meta_title = '规则管理';

		$this->assign('vlist', $vlist);
		$this->setAssign();
		$this->display();
	}

	public function addRule() {

		if (IS_POST) {

			//M验证
			$validate = array(
				array('title', 'require', '名称不能为空！'),
				array('name', 'require', '规则不能为空！'),
				array('name', '', '规则标识已经存在！', 0, 'unique', 1),
			);
			$data = M('AuthRule');
			if (!$data->validate($validate)->create()) {
				$this->error($data->getError());
			}

			$data->status = I('status', 0, 'intval');
			$data->pid    = I('pid', 0, 'intval');
			$data->type   = 1;

			if ($data->add()) {
				$this->success('添加成功', U('rule'));
			} else {

				$this->error('添加失败');
			}

			exit();
		}
		$pid              = I('pid', 0, 'intval');
		$plist            = M('AuthRule')->where(array('status' => 1))->select();
		$plist            = Category::toLevel($plist);
		$this->meta_title = "添加规则";

		$this->assign('plist', $plist);
		$this->assign('pid', $pid);
		$this->setAssign();
		$this->display();
	}

	public function editRule() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}

		if (IS_POST) {
			$data           = I('post.', '');
			$data['id']     = I('id', 0, 'intval');
			$data['status'] = I('status', 0, 'intval');

			if (empty($data['title'])) {
				$this->error('名称不能为空！');
			}
			if (empty($data['name'])) {
				$this->error('规则不能为空！');
			}
			if (M('AuthRule')->where(array('name' => $data['name'], 'id' => array('NEQ', $data['id'])))->find()) {
				$this->error('规则标识已经存在,请更换');
			}

			if (false !== M('AuthRule')->save($data)) {
				$this->success('修改成功', U('rule'));
			} else {

				$this->error('修改失败');
			}

			exit();
		}
		$vdata = M('AuthRule')->find($id);
		if (!$vdata) {
			$this->error('记录不存在');
		}

		$plist            = M('AuthRule')->where(array('status' => 1))->select();
		$plist            = Category::toLevel($plist);
		$this->meta_title = "修改规则";

		$this->assign('plist', $plist);
		$this->assign('vdata', $vdata);
		$this->setAssign();
		$this->display();
	}

	public function delRule() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}

		//是否存在子集
		$data = M('AuthRule')->where(array('pid' => $id))->find();
		if ($data) {
			$this->error('请先删除子规则，才能删除本规则');
		}
		if (M('AuthRule')->delete($id)) {
			$this->success('删除成功', U('rule'));
		} else {
			$this->error('删除失败');
		}

	}

	/* Admin User Manage */
	public function indexOfUser() {
		$keywords      = I('keywords', '', 'htmlspecialchars,trim');
		$department_id = I('department_id', 0, 'intval');

		$where = array();
		if (!empty($department_id)) {
			$where['_string'] = ' FIND_IN_SET(' . $department_id . ', department)'; //销售部
		}
		if (!empty($keywords)) {
			$where['username|realname'] = array('LIKE', '%' . $keywords . '%');
		}

		// 查询总数
		$count = M('Admin')->where($where)->count();

		$Page           = new \Think\Page($count, 25); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->rollPage = 10;

		//$Page->setConfig('theme', '%LINK_PAGE%');
		$limit = $Page->firstRow . ',' . $Page->listRows;

		$vlist = M('Admin')->where($where)->limit($limit)->select();
		foreach ($vlist as $key => &$val) {
			$val['department_list'] = M('Department')->where(array('id' => array('IN', $val['department'])))->select();
			$val['group']           = M('AuthGroup')->alias('a')
				->field('a.id,a.title')
				->join('INNER JOIN __AUTH_GROUP_ACCESS__ b ON b.group_id = a.id')
				->where(array('b.uid' => $val['id']))
				->order('a.department_id ASC, a.id ASC')
				->select();
		}

		$vlistDepartment  = M('Department')->order('sorting ASC, id ASC')->select();
		$vlistDepartment  = Category::toLevel($vlistDepartment);
		$this->meta_title = '用户管理';

		$this->assign('vlist', $vlist);
		$this->assign('vlistDepartment', $vlistDepartment);
		$this->assign('page', $Page->show());
		$this->assign('keywords', $keywords);
		$this->assign('department_id', $department_id);
		$this->setAssign();
		$this->display();
	}

	public function addUser() {

		if (IS_POST) {
			//用户组
			$group_id   = I('group_id', array());
			$department = I('department', array());
			if (empty($department)) {
				$this->error('请选择部门');
			}
			if (empty($group_id)) {
				$this->error('请选择职位');
			}

			//M验证
			$validate = array(
				array('username', 'require', '用户名不能为空！'),
				array('password', 'require', '密码不能为空！'),
				array('password', '5,20', '密码必须在5到20位之间', 0, 'length'),
				array('username', '', '用户名已经存在！', 0, 'unique', 1),
			);
			$data = M('Admin');
			if (!$data->validate($validate)->create()) {
				$this->error($data->getError());
			}
			$password         = get_password($data->password);
			$data->password   = $password['password'];
			$data->encrypt    = $password['encrypt'];
			$data->status     = I('status', 0, 'intval');
			$data->department = implode(',', $department);
			$data->login_time = date('Y-m-d H:i:s');
			$data->login_ip   = '';

			if ($id = $data->add()) {
				$group_data = array();
				foreach ($group_id as $key => $val) {
					$group_data[] = array('uid' => $id, 'group_id' => $val);
				}

				$result = M('AuthGroupAccess')->addAll($group_data);
				if ($result) {
					$this->success('添加成功', U('indexOfUser'));
				} else {
					$this->error('权限设置失败|用户添加成功');
				}

			} else {

				$this->error('添加失败');
			}

			exit();
		}
		$_vListOfDepartment = M('Department')->order('sorting ASC, id ASC')->select();
		$vListOfDepartment  = \Common\Lib\Category::toTree($_vListOfDepartment);

		$vListOfGroup     = M('AuthGroup')->where(array('status' => 1))->select();
		$this->meta_title = "添加管理员";

		$this->assign('vListOfDepartment', $vListOfDepartment);
		$this->assign('vListOfGroup', $vListOfGroup);
		$this->setAssign();
		$this->display();
	}

	public function editUser() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}

		if (IS_POST) {
			$data           = I('post.', '');
			$data['id']     = I('id', 0, 'intval');
			$data['status'] = I('status', 0, 'intval');

			$group_id   = I('group_id', array());
			$department = I('department', array());
			if (empty($department)) {
				$this->error('请选择部门');
			}
			if (empty($group_id)) {
				$this->error('请选择职位');
			}

			if (empty($data['username'])) {
				$this->error('名称不能为空！');
			}

			if (M('Admin')->where(array('username' => $data['username'], 'id' => array('NEQ', $id)))->find()) {
				$this->error('用户名已经存在,请更换');
			}

			$data['department'] = implode(',', $department);

			//判断密码为空，直接不修改
			if (empty($data['password'])) {
				unset($data['password']);
			} else {
				if (strlen($data['password']) < 5 || strlen($data['password']) > 20) {
					$this->error('密码必须在5到20位之间');
				} else {
					//修改密码
					$password         = get_password($data['password']);
					$data['password'] = $password['password'];
					$data['encrypt']  = $password['encrypt'];
				}
			}

			if (false !== M('Admin')->save($data)) {

				//其实用户和用户组是1:N,
				$group_data = array();
				foreach ($group_id as $key => $val) {
					$group_data[] = array('uid' => $id, 'group_id' => $val);
				} //删除原来记录
				M('AuthGroupAccess')->where(array('uid' => $id))->delete(); //Warning: Illegal offset type in isset or empty in
				//exit();

				$result = M('AuthGroupAccess')->addAll($group_data);
				if ($result) {
					$this->success('修改成功', U('indexOfUser'));
				} else {
					$this->error('权限设置失败,用户修改成功');
				}
			} else {

				$this->error('修改失败');
			}

			exit();
		}
		$vdata = M('Admin')->find($id);
		if (!$vdata) {
			$this->error('记录不存在');
		}

		$_vListOfDepartment = M('Department')->order('sorting ASC, id ASC')->select();
		$vListOfDepartment  = \Common\Lib\Category::toTree($_vListOfDepartment);

		$vdata['department'] = explode(',', $vdata['department']);

		$vListOfGroup = M('AuthGroup')->where(array('status' => 1))->select();

		$vdata['group'] = M('AuthGroupAccess')->where(array('uid' => $id))->getField('group_id', true);

		$this->meta_title = "修改管理员";

		$this->assign('vListOfDepartment', $vListOfDepartment);
		$this->assign('vListOfGroup', $vListOfGroup);
		$this->assign('vdata', $vdata);
		$this->setAssign();
		$this->display();
	}

	public function delUser() {
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误');
		}

		if (M('Admin')->delete($id)) {
			M('AuthGroupAccess')->where(array('uid' => $id))->delete();
			$this->success('删除成功', U('indexOfUser'));
		} else {
			$this->error('删除失败');
		}

	}

	public function updateStatusOfUser() {
		$data['id']      = I('id', 0, 'intval');
		$data['is_lock'] = I('is_lock', 0, 'intval');
		if (empty($data['id'])) {
			$this->error('参数错误');
		}

		if ($data['is_lock'] == 1) {
			$msg             = '锁定';
			$data['is_lock'] = 0;
		} else {
			$msg             = '启用';
			$data['is_lock'] = 1;
		}

		if (false !== M('Admin')->save($data)) {
			$this->success($msg . '成功', U('indexOfUser'));
		} else {

			$this->error($msg . '失败');
		}

	}

}
