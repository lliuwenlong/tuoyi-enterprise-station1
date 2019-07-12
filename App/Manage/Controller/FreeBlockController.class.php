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
 * @Last Modified time: 2017-10-18 18:28:27
 */
namespace Manage\Controller;

class FreeBlockController extends CommonController {

	public function index() {

		$keyword = I('keyword', '', 'htmlspecialchars,trim'); //关键字

		$where = array();
		if (!empty($keyword)) {
			$where['name'] = array('LIKE', "%{$keyword}%");
		}

		$count          = M('FreeBlock')->where($where)->count();
		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = M('FreeBlock')->where($where)->order('id desc')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', '自由块列表');
		$this->assign('keyword', $keyword);

		$this->display();
	}
	//添加
	public function add() {

		if (IS_POST) {
			$this->addPost();
			exit();
		}

		$this->assign('type', '添加自由块');
		$this->assign('blocktypelist', get_item('blocktype'));

		$this->display();
	}

	//
	public function addPost() {
		//当前控制器名称
		$actionName = strtolower(CONTROLLER_NAME);

		$data['name']       = I('name', '', 'htmlspecialchars,trim');
		$data['block_type'] = I('block_type', 0, 'intval');
		$data['remark']     = I('remark', '');
		$content            = I('content', '', '');

		if (empty($data['name'])) {
			$this->error('请填写名称');
		}

		if (empty($data['block_type'])) {
			$this->error('请选择类型');
		}

		if (M('FreeBlock')->where(array('name' => $data['name']))->find()) {
			$this->error('自由块名称已经存在!');
		}

		$data['content'] = $content[$data['block_type']];
		if (stripos($data['content'], '<?php') !== false) {
			$data['content'] = preg_replace('/<\?php(.+?)\?>/i', '', $data['content']);
		}

		if ($id = M('FreeBlock')->add($data)) {

			//更新缓存
			get_block($data['name'], 1);

			//图片类型
			if ($data['block_type'] == 2) {
				//attachment index 图片入库
				$first_pic = $data['content'];
				$content   = '';
				insert_att_index($content, $first_pic, $id, 0, 'block'); //图片的id--get_att_attachment
			} elseif ($data['block_type'] == 3) {
				//attachment index 图片入库
				$first_pic = null;
				insert_att_index($data['content'], $first_pic, $id, 0, 'block'); //内容中的图片--get_att_content
			}

			$this->success('添加成功', U('FreeBlock/index'));
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
		//非富文本,引号的问题
		$vo['content2'] = htmlspecialchars(preg_replace('/<script[\s\S]*?<\/script>/i', '', $vo['content']));
		$vo['content']  = str_replace("&#39;", "'", $vo['content']); //只针对input,textarea,ueditor切换
		$vo['content']  = htmlspecialchars($vo['content']);

		$this->assign('type', '修改自由块');
		$this->assign('blocktypelist', get_item('blocktype'));
		$this->assign('vo', $vo);

		$this->display();
	}

	//修改处理
	public function editPost() {
		$actionName = CONTROLLER_NAME;

		$id                 = $data['id']                 = I('id', 0, 'intval');
		$data['name']       = I('name', '', 'htmlspecialchars,trim');
		$data['block_type'] = I('block_type', 0, 'intval');
		$data['remark']     = I('remark', '');
		$content            = I('content', '', '');

		if (empty($data['name'])) {
			$this->error('请填写名称');
		}

		if (empty($data['block_type'])) {
			$this->error('请选择类型');
		}

		$data['content'] = $content[$data['block_type']];
		if (stripos($data['content'], '<?php') !== false) {
			$data['content'] = preg_replace('/<\?php(.+?)\?>/i', '', $data['content']);
		}

		if (M('FreeBlock')->where(array('name' => $data['name'], 'id' => array('neq', $id)))->find()) {
			$this->error('自由块名称已经存在!');
		}

		if (false !== M('FreeBlock')->save($data)) {

			//更新缓存
			get_block($data['name'], 1);

			//图片类型
			if ($data['block_type'] == 2) {
				//attachment index 图片入库
				$first_pic = $data['content'];
				$content   = '';
				insert_att_index($content, $first_pic, $id, 0, 'block'); //图片的id--get_att_attachment
			} elseif ($data['block_type'] == 3) {
				//attachment index 图片入库
				$first_pic = null;
				insert_att_index($data['content'], $first_pic, $id, 0, 'block'); //内容中的图片--get_att_content
			}

			$this->success('修改成功', U('FreeBlock/index'));
		} else {

			$this->error('修改失败');
		}

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
		$name = M('FreeBlock')->where(array('id' => $id))->getField('name'); //清除F缓存用
		if (M('FreeBlock')->delete($id)) {

			M('AttachmentIndex')->where(array('arc_id' => $id, 'model_id' => 0, 'desc' => 'block'))->delete();
			get_block($name, 1); //清除缓存(更新)
			$this->success('彻底删除成功', U('FreeBlock/index'));
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
		$name  = M('FreeBlock')->where($where)->getField('name', true); //清除F缓存用

		if (M('FreeBlock')->where($where)->delete()) {
			M('AttachmentIndex')->where(array('arc_id' => array('in', $idArr), 'model_id' => 0, 'desc' => 'block'))->delete();

			foreach ($name as $v) {
				get_block($v, 1); //清除缓存(更新)
			}
			$this->success('彻底删除成功', U('FreeBlock/index'));
		} else {
			$this->error('彻底删除失败');
		}
	}

}
