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
 * @Last Modified time: 2017-12-04 09:54:54
 */
namespace Manage\Controller;

use Common\Lib\Category;

class SoftController extends CommonContentController {

	public function index() {

		$keyword = I('keyword', '', 'htmlspecialchars,trim'); //关键字

		//所有子栏目列表
		$cate    = get_category();
		$subcate = Category::toLayer(Category::clearCate(Category::getChilds($cate, $this->pid), 'type'), 'child', $this->pid); //子类,多维
		$poscate = Category::getParents($cate, $this->pid);

		if ($this->pid) {
			$idarr = Category::getChildsId($cate, $this->pid, 1); //所有子类ID
			//$where = array('soft.delete_status' => 0, 'cid' => $this->pid);
			$where = array('soft.delete_status' => 0, 'cid' => array('in', $idarr));
		} else {
			$where = array('soft.delete_status' => 0);
		}

		if (!empty($keyword)) {
			$where['soft.title'] = array('LIKE', "%{$keyword}%");
		}

		$count = D2('ArcView', 'soft')->where($where)->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$art   = D2('ArcView', 'soft')->nofield('content,picture_urls,update_log,down_link')->where($where)->order('soft.point DESC, soft.id DESC')->limit($limit)->select();

		$this->assign('pid', $this->pid);
		$this->assign('subcate', $subcate);
		$this->assign('poscate', $poscate);
		$this->assign('keyword', $keyword);
		$this->assign('page', $page->show());
		$this->assign('vlist', $art);
		$this->assign('type', '软件下载列表');
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
		$cate = get_category(2);
		$cate = get_category_access(Category::getLevelOfModel(Category::toLevel($cate), $actionName), 'add');

		$this->assign('pid', $this->pid);
		$this->assign('softtypelist', get_item('softtype'));
		$this->assign('softlanguage', get_item('softlanguage'));
		$this->assign('cate', $cate);
		$this->assign('flagtypelist', get_item('flagtype')); //文档属性
		$this->assign('type', '添加软件下载');
		$this->display();
	}

	//
	public function addPost() {

		$data                  = I('post.');
		$data['cid']           = I('cid', 0, 'intval');
		$data['title']         = I('title', '', 'htmlspecialchars,rtrim');
		$data['short_title']   = I('short_title', '', 'htmlspecialchars,rtrim');
		$data['keywords']      = trim($data['keywords']);
		$data['content']       = I('content', '', '');
		$data['update_log']    = str_replace("\n", '<br />', I('update_log', '', ''));
		$data['os']            = implode(' ', I('os', array()));
		$data['down_link']     = I('down_link', '', '');
		$data['soft_type']     = I('soft_type', 0, 'intval');
		$data['language']      = I('language', 0, 'intval');
		$data['publish_time']  = I('publish_time', date('Y-m-d H:i:s'));
		$data['update_time']   = I('update_time', date('Y-m-d H:i:s'));
		$data['click']         = I('click', 0, 'intval');
		$data['delete_status'] = 0;
		$data['aid']           = session(C('USER_AUTH_KEY'));
		$clickFlag             = I('clickFlag', 0, 'intval');

		if ($clickFlag) {
			$data['click'] = rand(10, 95);
		}

		$flags = I('flags', array(), 'intval');
		$pic   = $data['litpic'];

		if (empty($data['title'])) {
			$this->error('名称不能为空');
		}
		if (!$data['cid']) {
			$this->error('请选择栏目');
		}
		$this->pid = $data['cid']; //转到自己的栏目

		if (empty($data['description'])) {
			$data['description'] = str2sub(strip_tags($data['content']), 120);
		}
		$down_link = json_decode($data['down_link'], true);
		if (!is_array($down_link)) {
			$$down_link = array();
		}
		foreach ($down_link as $key => $val) {
			$down_link[$key]['alt'] = $val['alt'] == '' ? '下载地址' : $val['alt'];
		}
		$data['$down_link'] = json_encode_ex($$down_link);

		//图片标志
		if (!empty($pic) && !in_array(B_PIC, $flags)) {
			$flags[] = B_PIC;
		}
		$data['flag'] = 0;
		foreach ($flags as $v) {
			$data['flag'] += $v;
		}

		//获取属于分类信息,得到model_id
		$selfCate = Category::getSelf(get_category(0), $data['cid']); //当前栏目信息
		$model_id = $selfCate['model_id'];

		if ($id = M('soft')->add($data)) {

			//attachment index 图片入库
			$first_pic = $data['litpic'];
			insert_att_index($data['content'], $first_pic, $id, $model_id);

			//更新缩略图
			if (empty($data['litpic']) && !empty($first_pic)) {
				//更新表字段
				$updata = array('id' => $id, 'litpic' => $first_pic);
				if (!in_array(B_PIC, $flags)) {
					$updata['flag'] = array('exp', 'flag+' . B_PIC);
				}
				M('soft')->save($updata);
			}

			//Tag
			update_tag_index($id, $data['cid'], $model_id, $data['keywords']);

			//SearchAll
			$data_search             = array('arc_id' => $id, 'title' => $data['title'], 'litpic' => $data['litpic'], 'description' => $data['description'], 'jump_url' => $data['jump_url'], 'publish_time' => $data['publish_time'], 'cid' => $data['cid'], 'model_id' => $model_id, 'point' => $data['point'], 'delete_status' => $data['delete_status'], 'audit_status' => 1);
			$data_search['jump_url'] = (($data['flag'] & B_JUMP) == B_JUMP) ? $data['jump_url'] : '';
			update_search_all($data_search);

			//更新静态缓存
			del_cache_html('List/index_' . $data['cid'], false, 'list:index');
			del_cache_html('Index_index', false, 'index:index');

			$this->success('添加成功', U('Soft/index', array('pid' => $this->pid)));
		} else {
			$this->error('添加失败');
		}
	}

	//编辑文章
	public function edit() {
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		$actionName = strtolower(CONTROLLER_NAME);

		if (IS_POST) {
			$this->editPost();
			exit();
		}

		$cate = get_category(2);
		$cate = get_category_access(Category::getLevelOfModel(Category::toLevel($cate), $actionName), 'edit');

		$vo               = M($actionName)->find($id);
		$vo['update_log'] = htmlspecialchars(str_replace('<br />', "\n", $vo['update_log']));
		$vo['content']    = htmlspecialchars($vo['content']);
		$vo['os']         = explode(' ', $vo['os']);

		$this->assign('pid', $this->pid);
		$this->assign('vo', $vo);
		$this->assign('softtypelist', get_item('softtype'));
		$this->assign('softlanguage', get_item('softlanguage'));
		$this->assign('cate', $cate);
		$this->assign('flagtypelist', get_item('flagtype')); //文档属性
		$this->assign('type', '修改软件下载');
		$this->display();
	}

	//修改文章处理
	public function editPost() {

		$data                 = I('post.');
		$id                   = $data['id']                   = I('id', 0, 'intval');
		$data['cid']          = I('cid', 0, 'intval');
		$data['title']        = I('title', '', 'htmlspecialchars,rtrim');
		$data['short_title']  = I('short_title', '', 'htmlspecialchars,rtrim');
		$data['keywords']     = trim($data['keywords']);
		$data['content']      = I('content', '', '');
		$data['update_log']   = str_replace("\n", '<br />', I('update_log', '', ''));
		$data['os']           = implode(' ', I('os', array()));
		$data['down_link']    = I('down_link', '', '');
		$data['soft_type']    = I('soft_type', 0, 'intval');
		$data['language']     = I('language', 0, 'intval');
		$data['publish_time'] = I('publish_time', date('Y-m-d H:i:s'));
		$data['update_time']  = I('update_time', date('Y-m-d H:i:s'));

		$flags = I('flags', array(), 'intval');
		$pic   = $data['litpic'];

		if (empty($data['title'])) {
			$this->error('标题不能为空');
		}
		if (!$data['cid']) {
			$this->error('请选择栏目');
		}
		$this->pid = $data['cid']; //转到自己的栏目

		if (empty($data['description'])) {
			$data['description'] = str2sub(strip_tags($data['content']), 120);
		}

		$down_link = json_decode($data['down_link'], true);
		if (!is_array($down_link)) {
			$$down_link = array();
		}

		foreach ($down_link as $key => $val) {
			$down_link[$key]['alt'] = $val['alt'] == '' ? '下载地址' : $val['alt'];
		}
		$data['$down_link'] = json_encode_ex($$down_link);

		//图片标志
		if (!empty($pic) && !in_array(B_PIC, $flags)) {
			$flags[] = B_PIC;
		}
		$data['flag'] = 0;
		foreach ($flags as $v) {
			$data['flag'] += $v;
		}

		//获取属于分类信息,得到model_id
		$selfCate = Category::getSelf(get_category(0), $data['cid']); //当前栏目信息
		$model_id = $selfCate['model_id'];

		if (false !== M('soft')->save($data)) {
			//attachment index 图片入库
			$first_pic = $data['litpic'];
			insert_att_index($data['content'], $first_pic, $id, $model_id);

			//更新缩略图
			if (empty($data['litpic']) && !empty($first_pic)) {
				//更新表字段
				$updata = array('id' => $id, 'litpic' => $first_pic);
				if (!in_array(B_PIC, $flags)) {
					$updata['flag'] = array('exp', 'flag+' . B_PIC);
				}
				M('soft')->save($updata);
			}

			//tag
			update_tag_index($id, $data['cid'], $model_id, $data['keywords']);

			//Search
			$data_search             = array('arc_id' => $data['id'], 'title' => $data['title'], 'litpic' => $data['litpic'], 'description' => $data['description'], 'jump_url' => $data['jump_url'], 'publish_time' => $data['publish_time'], 'cid' => $data['cid'], 'model_id' => $model_id, 'point' => $data['point'], 'delete_status' => 0, 'audit_status' => 1);
			$data_search['jump_url'] = (($data['flag'] & B_JUMP) == B_JUMP) ? $data['jump_url'] : '';
			update_search_all($data_search);

			//更新静态缓存
			del_cache_html('List/index_' . $data['cid'] . '_', false, 'list:index');
			del_cache_html('List/index_' . $selfCate['ename'], false, 'list:index'); //还有只有名称
			del_cache_html('Show/index_*_' . $id, false, 'show:index'); //不太精确，会删除其他模块同id文档

			$this->success('修改成功', U('Soft/index', array('pid' => $this->pid)));
		} else {

			$this->error('修改失败');
		}

	}

	//移动
	public function move() {
		//当前控制器名称
		$id         = I('key', 0);
		$actionName = strtolower(CONTROLLER_NAME);

		if (IS_POST) {
			$id  = I('id', 0);
			$cid = I('cid', 0, 'intval');
			if (empty($id)) {
				$this->error('请选择要移动的文档');
			}

			if (!$cid) {
				$this->error('请选择栏目');
			}
			$model_id = D2('ArcView', 'soft')->where(array('id' => array('in', $id)))->getField('model_id');
			if (empty($model_id)) {
				$this->error('文档不存在，请刷新重试');
			}

			if (false !== M($actionName)->where(array('id' => array('in', $id)))->setField('cid', $cid)) {
				//AttachmentIndex no setting
				//set SearchAll of cid
				M('SearchAll')->where(array('arc_id' => array('in', $id), 'model_id' => $model_id))->setField('cid', $cid);
				//set TagIndex of cid
				M('TagIndex')->where(array('arc_id' => array('in', $id), 'model_id' => $model_id))->setField('cid', $cid);

				$this->success('移动成功', U('Soft/index', array('pid' => $this->pid)));
			} else {
				$this->error('移动失败');
			}
			exit();
		}

		if (empty($id)) {
			$this->error('请选择要移动的文档');
		}

		$cate = get_category(2);
		$cate = get_category_access(Category::getLevelOfModel(Category::toLevel($cate), $actionName), 'move');

		$this->assign('id', $id);
		$this->assign('pid', $this->pid);
		$this->assign('cate', $cate);
		$this->assign('type', '移动文档');
		$this->display();
	}

	//回收站文章列表
	public function trach() {

		$where = array('soft.delete_status' => 1);
		$count = D2('ArcView', 'soft')->where($where)->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$art   = D2('ArcView', 'soft')->nofield('content,picture_urls,update_log,down_link')->where($where)->limit($limit)->select();

		$this->assign('pid', $this->pid);
		$this->assign('page', $page->show());
		$this->assign('vlist', $art);
		$this->assign('subcate', '');
		$this->assign('type', '软件回收站');
		$this->display('index');
	}

	//删除文章到回收站
	public function del() {

		$id        = I('id', 0, 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->delBatch();
			return;
		}

		$model_id = D2('ArcView', 'soft')->where(array('id' => $id))->getField('model_id');
		if (empty($model_id)) {
			$this->error('文档不存在，请刷新重试');
		}

		if (false !== M('soft')->where(array('id' => $id))->setField('delete_status', 1)) {

			//set delete_status =1
			M('SearchAll')->where(array('arc_id' => $id, 'model_id' => $model_id))->setField('delete_status', 1);

			del_cache_html('Show/index_*_' . $id . '.', false, 'show:index');
			$this->success('删除成功', U('Soft/index', array('pid' => $this->pid)));

		} else {
			$this->error('删除失败');
		}
	}

	//批量删除到回收站
	public function delBatch() {

		$idArr = I('key', 0, 'intval');

		if (!is_array($idArr)) {
			$this->error('请选择要删除的项');
		}

		$model_id = D2('ArcView', 'soft')->where(array('id' => array('in', $idArr)))->getField('model_id');
		if (empty($model_id)) {
			$this->error('文档不存在，请刷新重试');
		}

		if (false !== M('soft')->where(array('id' => array('in', $idArr)))->setField('delete_status', 1)) {
			//set delete_status =1
			M('SearchAll')->where(array('arc_id' => array('in', $idArr), 'model_id' => $model_id))->setField('delete_status', 1);

			//更新静态缓存
			foreach ($idArr as $v) {
				del_cache_html('Show/index_*_' . $v . '.', false, 'show:index');
			}
			$this->success('批量删除成功', U('Soft/index', array('pid' => $this->pid)));

		} else {
			$this->error('批量删除文失败');
		}
	}

	//还原文章
	public function restore() {

		$id        = I('id', 0, 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->restoreBatch();
			return;
		}

		$model_id = D2('ArcView', 'soft')->where(array('id' => $id))->getField('model_id');
		if (empty($model_id)) {
			$this->error('文档不存在，请刷新重试');
		}

		if (false !== M('soft')->where(array('id' => $id))->setField('delete_status', 0)) {
			//set delete_status =0
			M('SearchAll')->where(array('arc_id' => $id, 'model_id' => $model_id))->setField('delete_status', 0);

			$this->success('还原成功', U('Soft/trach', array('pid' => $this->pid)));

		} else {
			$this->error('还原失败');
		}
	}

	//批量还原文章
	public function restoreBatch() {

		$idArr = I('key', 0, 'intval');

		if (!is_array($idArr)) {
			$this->error('请选择要还原的项');
		}

		$model_id = D2('ArcView', 'soft')->where(array('id' => array('in', $idArr)))->getField('model_id');
		if (empty($model_id)) {
			$this->error('文档不存在，请刷新重试');
		}

		if (false !== M('soft')->where(array('id' => array('in', $idArr)))->setField('delete_status', 0)) {
			//set delete_status =0
			M('SearchAll')->where(array('arc_id' => array('in', $idArr), 'model_id' => $model_id))->setField('delete_status', 0);

			$this->success('还原成功', U('Soft/trach', array('pid' => $this->pid)));

		} else {
			$this->error('还原失败');
		}
	}

	//彻底删除文章
	public function clear() {

		$id        = I('id', 0, 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->clearBatch();
			return;
		}

		$model_id = D2('ArcView', 'soft')->where(array('id' => $id))->getField('model_id');
		if (empty($model_id)) {
			$this->error('文档不存在，请刷新重试');
		}

		if (M('soft')->delete($id)) {
			// delete picture index
			delete_att_tag_search(array('arc_id' => $id, 'model_id' => $model_id));
			$this->success('彻底删除成功', U('Soft/trach', array('pid' => $this->pid)));
		} else {
			$this->error('彻底删除失败');
		}
	}

	//批量彻底删除文章
	public function clearBatch() {

		$idArr = I('key', 0, 'intval');

		if (!is_array($idArr)) {
			$this->error('请选择要彻底删除的项');
		}
		$where    = array('id' => array('in', $idArr));
		$model_id = D2('ArcView', 'soft')->where(array('id' => array('in', $idArr)))->getField('model_id');
		if (empty($model_id)) {
			$this->error('文档不存在，请刷新重试');
		}

		if (M('soft')->where($where)->delete()) {
			// delete picture index
			delete_att_tag_search(array('arc_id' => $idArr, 'model_id' => $model_id));
			$this->success('彻底删除成功', U('Soft/trach', array('pid' => $this->pid)));
		} else {
			$this->error('彻底删除失败');
		}
	}

}
