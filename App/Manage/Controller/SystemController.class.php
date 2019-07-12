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
 * @Last Modified time: 2017-11-11 13:29:47
 */
namespace Manage\Controller;

class SystemController extends CommonController {

	public function index() {

		$group_id = I('group_id', 0, 'intval'); //类别ID
		$keyword  = I('keyword', '', 'htmlspecialchars,trim'); //关键字

		$where = array('id' => array('GT', 0));
		if (!empty($group_id)) {
			$where['group_id'] = $group_id;
		}
		if (!empty($keyword)) {
			$where['name'] = array('LIKE', "%{$keyword}%");
		}

		$count = M("config")->where($where)->count();

		$page           = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow . ',' . $page->listRows;
		$vlist = M("config")->where($where)->order('sort,id DESC')->limit($limit)->select();

		$this->assign('group_id', $group_id);
		$this->assign('keyword', $keyword);
		$this->assign('page', $page->show());
		$this->assign('vlist', $vlist);
		$this->assign('configgroup', get_item('configgroup'));
		$this->assign('type', '配置项管理');
		$this->display();
	}

	public function add() {

		if (IS_POST) {
			$data             = I('post.');
			$data['group_id'] = I('group_id', 0, 'intval');
			$data['type_id']  = I('type_id', 0, 'intval');
			$data['sort']     = I('sort', 0, 'intval');
			$data['t_value']  = I('t_value', '', ''); //不过滤html
			$data['s_value']  = I('s_value', '', ''); //不过滤html

			if (stripos($data['t_value'], '<?php') !== false) {
				$data['t_value'] = preg_replace('/<\?php(.+?)\?>/i', '', $data['t_value']);
				exit();
			}
			if (stripos($data['s_value'], '<?php') !== false) {
				$data['s_value'] = preg_replace('/<\?php(.+?)\?>/i', '', $data['s_value']);
			}

			if (empty($data['name'])) {
				$this->error('请填写名称(标识)');
			}
			if (empty($data['title'])) {
				$this->error('请填写标题');
			}

			if (!preg_match('/^[a-zA-Z0-9_]+$/', $data['name'])) {
				$this->error('名称只能由字母、数字和"_"组成');
			}
			$data['name'] = strtoupper($data['name']);

			if (M('config')->where(array('name' => $data['name']))->find()) {
				$this->error('配置项名称(标识)已经存在，请更换');
			}

			if (M('config')->add($data)) {
				F('config/site', null); //清空配置缓存
				$this->success('添加成功', U('index'));
			} else {
				$this->error('添加失败');
			}

			exit();
		}

		$this->assign('configgroup', get_item('configgroup'));
		$this->assign('configtype', get_item('configtype'));
		$this->display();
	}

	public function edit() {
		$id = I('id', 0, 'intval');
		if (IS_POST) {
			$data = I('post.');
			$id   = $data['id']   = I('id', 0, 'intval');

			$data['group_id'] = I('group_id', 0, 'intval');
			$data['type_id']  = I('type_id', 0, 'intval');
			$data['sort']     = I('sort', 0, 'intval');
			$data['t_value']  = I('t_value', '', ''); //不过滤html
			$data['s_value']  = I('s_value', '', ''); //不过滤html

			if (stripos($data['t_value'], '<?php') !== false) {
				$data['t_value'] = preg_replace('/<\?php(.+?)\?>/i', '', $data['t_value']);
			}
			if (stripos($data['s_value'], '<?php') !== false) {
				$data['s_value'] = preg_replace('/<\?php(.+?)\?>/i', '', $data['s_value']);
			}

			if (empty($data['name'])) {
				$this->error('请填写名称(标识)');
			}
			if (empty($data['title'])) {
				$this->error('请填写标题');
			}

			if (!preg_match('/^[a-zA-Z0-9_]+$/', $data['name'])) {
				$this->error('名称只能由字母、数字和"_"组成');
			}
			$data['name'] = strtoupper($data['name']);

			if (M('config')->where(array('name' => $data['name'], 'id' => array('neq', $id)))->find()) {
				$this->error('配置项名称(标识)已经存在，请更换');
			}

			if (false !== M('config')->save($data)) {
				F('config/site', null); //清空配置缓存
				$this->success('修改成功', U('index'));
			} else {
				$this->error('修改失败');
			}

			exit();
		}
		$vo            = M('config')->find($id);
		$vo['s_value'] = htmlspecialchars($vo['s_value']); //ueditor

		$this->assign('vo', $vo);
		$this->assign('configgroup', get_item('configgroup'));
		$this->assign('configtype', get_item('configtype'));
		$this->display();
	}

	//删除
	public function del() {

		$id       = I('id', 0, 'intval');
		$group_id = I('group_id', 0, '');
		//批量删除
		if (empty($id)) {
			$this->error('参数错误!');
		}

		if (M('config')->delete($id)) {
			F('config/site', null); //清空配置缓存
			$this->success('删除成功', U('index', array('group_id' => $group_id)));

		} else {
			$this->error('删除失败');
		}
	}

	//批量更新排序
	public function sort() {
		$sortlist = I('sortlist', array(), 'intval');
		$group_id = I('group_id', 0, 'intval');
		foreach ($sortlist as $k => $v) {
			$data = array(
				'id'   => $k,
				'sort' => $v,
			);
			M('config')->save($data);
		}
		$this->redirect('System/index', array('group_id' => $group_id));
	}

	public function site() {
		if (IS_POST) {

			$data = I('config', array(), 'trim');
			foreach ($data as $key => $val) {
				if (stripos($val, '<?php') !== false) {
					$data[$key] = preg_replace('/<\?php(.+?)\?>/i', '', $val);
				}

			}

			$data['CFG_IMGTHUMB_SIZE'] = strtoupper($data['CFG_IMGTHUMB_SIZE']);
			$data['CFG_IMGTHUMB_SIZE'] = str_replace(array('，', 'Ｘ'), array(',', 'X'), $data['CFG_IMGTHUMB_SIZE']);
			if (empty($data['CFG_IMGTHUMB_SIZE'])) {
				$this->error('缩略图组尺寸不能为空');
			}

			if (!empty($data['CFG_IMAGE_WATER_FILE'])) {
				$img_ext = pathinfo($data['CFG_IMAGE_WATER_FILE'], PATHINFO_EXTENSION);
				$img_ext = strtolower($img_ext);
				if (!in_array($img_ext, array('jpg', 'gif', 'png', 'jpeg'))) {
					$this->error('水印图片文件不是图片格式！请重新上传！');
					return;
				}

			}

			foreach ($data as $k => $v) {
				$ret = M('config')->where(array('name' => $k))->save(array('s_value' => $v));
			}
			if ($ret !== false) {
				F('config/site', null);
				$this->success('修改成功', U('System/site'));

			} else {

				$this->error('修改失败！');
			}

			exit();
		}
		$vlist = M("config")->where(array('group_id' => array('LT', 900)))->order('group_id,sort')->select();
		if (!$vlist) {
			$vlist = array();
		}
		$configgroup = get_item('configgroup');

		$glist = array();
		foreach ($configgroup as $k => $v) {
			if ($k >= 900) {
				unset($configgroup[$k]);
				continue;
			}
			$glist[$k] = array();
			foreach ($vlist as $k2 => $v2) {
				if ($k == $v2['group_id']) {
					$glist[$k][] = $v2;
					//unset($vlist[$k2]);
				}

			}
		}

		$this->assign('vlist', $glist);
		$this->assign('configgroup', $configgroup);
		$this->assign('groupnum', count($configgroup));
		$this->assign('configtype', get_item('configtype'));
		$this->display();

	}

	public function url() {
		if (IS_POST) {
			$data = I('config', '', '');

			$data['HOME_URL_ROUTER_ON'] = isset($data['HOME_URL_ROUTER_ON']) ? $data['HOME_URL_ROUTER_ON'] : 0; //路由

			if ($data['HOME_URL_MODEL'] == 0 || $data['HOME_URL_MODEL'] == 3) {
				$data['HOME_URL_ROUTER_ON'] = 0;
			}
			$data['HOME_HTML_CACHE_ON']    = isset($data['HOME_HTML_CACHE_ON']) ? $data['HOME_HTML_CACHE_ON'] : 0;
			$data['MOBILE_HTML_CACHE_ON']  = isset($data['MOBILE_HTML_CACHE_ON']) ? $data['MOBILE_HTML_CACHE_ON'] : 0;
			$data['HTML_CACHE_INDEX_ON']   = isset($data['HTML_CACHE_INDEX_ON']) ? $data['HTML_CACHE_INDEX_ON'] : 0;
			$data['HTML_CACHE_LIST_ON']    = isset($data['HTML_CACHE_LIST_ON']) ? $data['HTML_CACHE_LIST_ON'] : 0;
			$data['HTML_CACHE_SHOW_ON']    = isset($data['HTML_CACHE_SHOW_ON']) ? $data['HTML_CACHE_SHOW_ON'] : 0;
			$data['HTML_CACHE_SPECIAL_ON'] = isset($data['HTML_CACHE_SPECIAL_ON']) ? $data['HTML_CACHE_SPECIAL_ON'] : 0;

			foreach ($data as $k => $v) {
				$ret = M('config')->where(array('name' => $k))->save(array('s_value' => $v));
			}
			if ($ret !== false) {
				F('config/site', null);
				$this->success('修改成功', U('System/url'));

			} else {

				$this->error('修改失败！');
			}

			exit();
		}

		$list = M('config')->where(array('group_id' => 900))->select();
		$vo   = array();
		foreach ($list as $k => $v) {
			$vo[$v['name']] = $v['s_value'];
		}

		$this->assign('vo', $vo);
		$this->display();
	}

	public function online() {
		if (IS_POST) {
			//$data = I('post.', '');

			$data = I('config', '', '');
			//p($data);exit();
			foreach ($data as $k => $v) {
				$ret = M('config')->where(array('name' => $k))->save(array('s_value' => $v));
			}
			if ($ret !== false) {
				F('config/site', null);
				$this->success('修改成功', U('System/online'));

			} else {

				$this->error('修改失败！');
			}

			exit();

		}

		$list = M('config')->where(array('group_id' => 901))->select();
		$vo   = array();
		foreach ($list as $k => $v) {
			$vo[$v['name']] = $v['s_value'];
		}

		$onlineStyleList = get_file_folder_List('./Data/static/js_plugins/online/', 2, '*.css');
		$onlineStyleList = str_replace('.css', '', $onlineStyleList);

		$this->assign('vo', $vo);
		$this->assign('onlineStyleList', $onlineStyleList);
		$this->display();
	}

	public function update() {
		header("Content-Type:text/html; charset=utf-8"); //不然返回中文乱码
		//清除缓存
		$this->clearCache();
	}

	public function clearCache($dellog = false) {

		// LOG_PATH 应用日志目录 （默认为 RUNTIME_PATH.'Logs/'）
		// CACHE_PATH 项目模板缓存目录（默认为 RUNTIME_PATH.'Cache/'）
		// TEMP_PATH 应用缓存目录（默认为 RUNTIME_PATH.'Temp/'）
		// DATA_PATH 应用数据目录 （默认为 RUNTIME_PATH.'Data/'）

		if (IS_AJAX && IS_POST) {
			$id = I('post.id', 0, 'intval');
			if (empty($id)) {
				$this->error('参数错误');
			}

			$info = '';
			$ret  = true; //清除成功
			switch ($id) {
			case 10: //全部清除
				$ret  = del_dir_file(RUNTIME_PATH);
				$info = '应用缓存目录清除完毕！';
				break;
			case 11: //应用日志目录
				$ret  = del_dir_file(LOG_PATH);
				$info = '应用日志目录清除完毕！';
				break;
			case 12: //项目模板缓存目录
				$ret  = del_dir_file(CACHE_PATH);
				$info = '项目模板缓存目录清除完毕！';
				break;
			case 13: //应用缓存目录
				$ret  = del_dir_file(TEMP_PATH);
				$info = '应用缓存目录清除完毕！';
				break;
			case 14: //应用数据目录
				$ret  = del_dir_file(DATA_PATH);
				$info = '应用数据目录清除完毕！';
				break;
			default:
				$info = '参数指定错误，清除失败！';
				$this->error($info);
				break;
			}
			if (!$ret) {
				$info .= '部分清除失败，请重试!';
			}

			$this->success($info, U('clearCache'));
			exit();
		}
		$this->assign('type', '清除系统缓存');
		$this->display();

	}

}
