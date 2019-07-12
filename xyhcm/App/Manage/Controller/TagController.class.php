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
 * @Date:   2017-10-16 22:27:31
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-10-16 22:06:38
 */

namespace Manage\Controller;

use Think\Controller;

class TagController extends CommonController {

	public function index() {
		$keyword = I('keyword', '', 'htmlspecialchars,trim'); //关键字

		$where = array();
		if (!empty($keyword)) {
			$where['tag_name'] = array('LIKE', "%{$keyword}%");
		}

		$count          = M('Tag')->where($where)->count();
		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$list  = M('Tag')->where($where)->order('sort,id desc')->limit($limit)->select();

		$this->assign('keyword', $keyword);
		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', 'Tag列表');
		$this->display();
	}

	//编辑文章
	public function repair() {
		//当前控制器名称
		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误！');
		}

		$num  = M('TagIndex')->where(array('tag_id' => $id))->count();
		$data = array('id' => $id, 'num' => $num);

		if (false !== M('Tag')->save($data)) {
			$this->success('修复成功', U('index'));
		} else {

			$this->error('修复失败');
		}

	}

	//删除
	public function del() {

		$id = I('id', 0, 'intval');
		if (empty($id)) {
			$this->error('参数错误！');
		}

		if (false === M('TagIndex')->where(array('tag_id' => $id))->delete()) {
			$this->error('删除失败[tagIndex]!');
		}

		if (false !== M('Tag')->delete($id)) {
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败');
		}
	}

	//批量更新排序
	public function sort() {
		$aid      = I('get.aid', 0, 'intval');
		$sortlist = I('sortlist', array(), 'intval');

		foreach ($sortlist as $k => $v) {
			$data = array(
				'id'   => $k,
				'sort' => $v,
			);
			M('Tag')->save($data);
		}
		$this->redirect('index');
	}

}
