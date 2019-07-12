<?php

/**
 * 返回节点权限列表(多维数组)
 * @param array $node 节点数据数组
 * @param array $access 权限数据数组
 * @param integer $pid 父级id
 * @return array
 */
function node2layer($node, $access = null, $pid = 0) {

	if ($node == '') {
		return array();
	}

	$arr = array();

	foreach ($node as $v) {
		if (is_array($access)) {

			$v['access'] = in_array($v['id'], $access) ? 1 : 0;
		}
		if ($v['pid'] == $pid) {
			$v['child'] = node2layer($node, $access, $v['id']);
			$arr[]      = $v;
		}
	}

	return $arr;
}

/**
 * 返回自定义属性名称|值列表
 * @param integer $flag 自定义属性值
 * @param string $delimiter 分割符
 * @param boolean $iskey 是否返回key
 * @param boolean $isarray 是否返回数组
 * @return array|string
 */
//返回
function flag2Str($flag, $delimiter = ' ', $iskey = false, $isarray = false) {
	if (empty($flag)) {
		return $isarray ? array() : '';
	}
	$flagStr  = array();
	$flagtype = get_item('flagtype'); //文档属性
	foreach ($flagtype as $k => $v) {
		if ($flag & $k) {
			$flagStr[] = $iskey ? $k : $v;
		}
	}
	if ($isarray) {
		return $flagStr;
	} else {
		return implode($delimiter, $flagStr);
	}

}

/**
 * 检查栏目权限
 * @param integer $cat_id 栏目ID
 * @param string $action 动作
 * @param integer $role_id 角色[后台可能是多角色]
 * @param boolean $flag 是否为管理组[0会员组,1管理员组]
 * @return boolean
 */
function check_category_access($cat_id, $action, $role_id, $flag = 1) {
	$value             = false;
	static $access     = null;
	static $access_cid = 0;
	if (!is_array($access) || $access_cid != $cat_id) {
		$access = M('categoryAccess')->where(array('cat_id' => $cat_id))->select();
		if (empty($access)) {
			$access = array();
		}
		$access_cid = $cat_id;
	}

	$role_id = explode(',', $role_id);

	foreach ($access as $v) {
		if ($v['flag'] == $flag && in_array($v['role_id'], $role_id) && $v['action'] == $action) {
			$value = true;
			break;
		}
	}
	return $value;
}

/**
 * 返回有权限的栏目(添加文档或修改文档时)
 * @param array $cate 栏目数组
 * @param string $action 动作
 * @return array
 */
function get_category_access($cate, $action = 'add') {
	if (empty($cate)) {
		return array();
	}
	//权限检测//超级管理员
	if (!empty($_SESSION[C('ADMIN_AUTH_KEY')])) {
		return $cate;
	}

	$where = array('flag' => 1, 'role_id' => intval($_SESSION['yang_adm_group_id']));
	if (!empty($action)) {
		$where['action'] = $action;
	}

	$checkaccess = M('categoryAccess')->distinct(true)->where($where)->getField('cat_id', true);
	if (empty($checkaccess)) {
		$checkaccess = array();
	}

	$array = array();
	foreach ($cate as $v) {
		if (in_array($v['id'], $checkaccess)) {
			$array[] = $v;
		}
	}
	return $array;
}

/**
 * 快速文件数据读取和保存(原数据)-针对简单类型数据 字符串、数组
 * @param string $name 缓存名称
 * @param mixed $value 缓存值
 * @param string $path 缓存路径
 * @return mixed
 */
function rw_data($name, $value = '', $path = CONF_PATH) {

	static $_cache = array();
	$filename      = $path . $name . '.php';
	if ('' !== $value) {
		if (is_null($value)) {
			// 删除缓存
			return false !== strpos($name, '*') ? array_map("unlink", glob($filename)) : unlink($filename);
		} else {
			// 缓存数据
			$dir = dirname($filename);
			// 目录不存在则创建
			if (!is_dir($dir)) {
				mkdir($dir, 0755, true);
			}

			$_cache[$name] = $value;
			return file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($value, true) . ";?>"));
		}
	}
	if (isset($_cache[$name])) {
		return $_cache[$name];
	}

	// 获取缓存数据
	if (is_file($filename)) {
		$value         = include $filename;
		$_cache[$name] = $value;
	} else {
		$value = false;
	}
	return $value;
}

/**
 * 返回内容中附件id数组
 * @param string $content 内容 in
 * @param string $firstpic 第一张缩略图 out
 * @param boolean $flag 是否获取第一张缩略图
 * @return mixed
 */
function get_att_content(&$content, &$firstpic = null, $flag = false) {

	if (empty($content)) {
		return array();
	}

	//内容中的图片
	$img_arr = array();

	$reg = "/<img[^>]*src=\"((.+)\/(.+)\.(jpg|jpeg|gif|bmp|png))\"/isU";
	preg_match_all($reg, $content, $img_arr, PREG_PATTERN_ORDER);
	// 匹配出来的不重复图片
	$img_arr      = array_unique($img_arr[1]);
	$att_id_array = array();

	if (!empty($img_arr)) {

		$baseurl  = get_url_path(get_cfg_value('CFG_UPLOAD_ROOTPATH'), true);
		$baseurl2 = get_url_path(get_cfg_value('CFG_UPLOAD_ROOTPATH')); //不带域名
		/*
	    foreach ($img_arr as $k => $v) {
	    	$img_arr[$k] = str_replace(array($baseurl,$baseurl2), array('',''), $v);//清除域名前缀
	    }
	    */
		$img_arr = str_replace(array($baseurl, $baseurl2), array('', ''), $img_arr); //清除域名前缀

		$att_id = M('attachment')->field('id,file_path')->where(array('file_path' => array('in', $img_arr)))->select();

		if ($att_id) {

			//只有缩略图为空时,才提取第一张图片
			if ($flag && isset($firstpic)) {
				//取出本站内的第一张图
				foreach ($img_arr as $v) {
					foreach ($att_id as $v2) {
						if ($v == $v2['file_path']) {
							$imgtbSize = get_cfg_value('CFG_IMGTHUMB_SIZE'); //配置缩略图第一个参数
							$imgTSize  = explode('X', $imgtbSize[0]);
							$firstpic  = get_picture($baseurl2 . $v2['file_path'], intval($imgTSize[0]), intval($imgTSize[1]));
							break 2;
						}
					}
				}
			}

			//att_id 数组
			foreach ($att_id as $v) {
				$att_id_array[] = $v['id'];
			}
		}

	}

	return $att_id_array;
}

/**
 * 返回附件id数组
 * @param string|array $attachment 附件内容
 * @param boolean $flag 是否是缩略图
 * @return mixed
 */
function get_att_attachment($attachment, $flag = false) {

	if (empty($attachment)) {
		return array();
	}
	$att_id_array = array();
	$baseurl      = get_url_path(get_cfg_value('CFG_UPLOAD_ROOTPATH'));

	//清除缩略图的!200X200.jpg后缀
	if ($flag) {
		$attachment = preg_replace(array('#!(\d+)X(\d+)\.jpg$#i', '#^' . $baseurl . '#i'), array('', ''), $attachment);
	} else {
		$attachment = str_replace($baseurl, '', $attachment);
	}

	$att_id = M('attachment')->where(array('file_path' => array('IN', $attachment)))->getField('id', true);
	if ($att_id) {
		$att_id_array = $att_id;
	}

	return $att_id_array;
}

/**
 * 返回保存到AttachmentIndex表
 * @param integer|array $att_id 附件id--可以为空
 * @param integer $att_id 附件id
 * @param integer $model_id 模型id
 * @param string $model_name 模型名称(唯一标志符)
 * @return mixed
 */
function insert_att_index(&$content, &$first_pic, $arc_id, $model_id, $model_name = '') {
	if (empty($arc_id)) {
		return false;
	}
	$model_id = intval($model_id);
	if (empty($model_id) && $model_name == '') {
		return false;
	}

	$att_id_litpic = empty($first_pic) ? array() : get_att_attachment($first_pic, true);
	$new_att_id    = get_att_content($content, $first_pic, empty($first_pic)); //内容中解析图片id
	$new_att_id    = array_merge($new_att_id, $att_id_litpic); //

	if (is_array($new_att_id)) {
		$new_att_id = array_unique($new_att_id);
	} else {
		$new_att_id = array();
	}

	$old_att_ids = M('AttachmentIndex')->where(array('arc_id' => $arc_id, 'model_id' => $model_id, 'desc' => $model_name))->getField('att_id', true);
	if (empty($old_att_ids)) {
		$old_att_ids = array();
	}

	foreach ($old_att_ids as $key => $val) {
		//删除不存的旧记录(与新的att_id比较)
		if (empty($new_att_id) || !in_array($val, $new_att_id)) {
			M('AttachmentIndex')->where(array('att_id' => $val, 'arc_id' => $arc_id, 'model_id' => $model_id, 'desc' => $model_name))->delete();
		}
	}

	foreach ($new_att_id as $v) {
		if (empty($old_att_ids) || !in_array($val, $old_att_ids)) {
			if ($model_id > 0) {
				M('AttachmentIndex')->add(array('att_id' => $v, 'arc_id' => $arc_id, 'model_id' => $model_id));
			} else {
				M('AttachmentIndex')->add(array('att_id' => $v, 'arc_id' => $arc_id, 'desc' => $model_name));
			}
		}

	}

	return true;
}

/**
 * 返回保存Tag
 * @param integer $arc_id 文档id--不变
 * @param string $cid 栏目id--可能会变
 * @param string $model_id 模型id--不变
 * @param string $tags --为空时，则删除
 * @return mixed
 */
function update_tag_index($arc_id, $cid, $model_id, $tags) {

	if (empty($arc_id) || empty($cid) || empty($model_id)) {
		return false;
	}

	$tags_arr = explode(',', $tags);
	$tags_arr = array_filter($tags_arr); //去除空数组'',0,再使用sort()重建索引

	// if (empty($tags_arr)) {
	// 	return false;
	// }
	$tags_arr = array_unique($tags_arr);

	$data        = array();
	$new_tag_ids = array();

	foreach ($tags_arr as $key => $val) {
		$where    = array('tag_name' => $val);
		$tag_info = M('Tag')->where($where)->find();
		if (!$tag_info) {
			$tag_info       = array('tag_name' => $val, 'num' => 0, 'add_time' => date('Y-m-d H:i:s'));
			$id             = M('Tag')->add($tag_info);
			$tag_info['id'] = $id;
			if (!$id) {
				//添加失败
				\Think\Log::record($val . '添加失败[Tag]');
				return false;
			}
		}

		$new_tag_ids[] = $tag_info['id'];

	}

	//p($tag_ids);exit();
	$old_tag_ids = array();

	//取出文档下所有tag记录
	$old_tag_info = M('TagIndex')->where(array('arc_id' => $arc_id, 'model_id' => $model_id))->field('tag_id, cid')->select();

	if (empty($old_tag_info)) {
		$old_tag_info = array();
	} else {
		//[delete]同model_id、arc_id,不同cid(栏目变了)的记录
		//[delete]已经不存在的tag

		foreach ($old_tag_info as $key => $val) {
			if ($val['cid'] != $cid || !in_array($val['tag_id'], $new_tag_ids)) {
				M('TagIndex')->where(array('tag_id' => $val['tag_id'], 'arc_id' => $arc_id, 'cid' => $val['cid']))->delete(); //不属于旧栏目了
				M('Tag')->where(array('id' => $val['tag_id']))->setDec('num');
				//unset($old_tag_ids[$key]);

			} else {
				$old_tag_ids[] = $val['tag_id'];
			}

		}
	}

	//添加新的tag 索引
	foreach ($new_tag_ids as $v) {
		if (!in_array($v, $old_tag_ids)) {

			if (!M('TagIndex')->add(array('tag_id' => $v, 'arc_id' => $arc_id, 'cid' => $cid, 'model_id' => $model_id))) {
				//添加失败
				\Think\Log::record('tag_id: ' . $v . ',arc_id: ' . $arc_id . ',cid: ' . $cid . ' 添加失败[TagIndex]');
				//return false;
			}
			M('Tag')->where(array('id' => $v))->setInc('num');
		}

	}

	return true;
}

/**
 * 返回保存Tag
 * @param array $data 文档相关数据
 * @return mixed
 */
function update_search_all($data) {

	if (empty($data) || empty($data['arc_id']) || empty($data['cid']) || empty($data['model_id'])) {
		return false;
	}

	//文档id和模型model_id永远不会变，栏目可能会变。检测出原来

	$where       = array('arc_id' => $data['arc_id'], 'model_id' => $data['model_id']);
	$search_info = M('SearchAll')->where($where)->find();
	if (!$search_info) {

		$id = M('SearchAll')->add($data);

		if (!$id) {
			//添加失败
			\Think\Log::record('arc_id:' . $data['arc_id'] . '--cid:' . $data['cid'] . '添加全文搜索失败[SearchAll]');
			return false;
		}
	} else {
		$data['id'] = $search_info['id'];
		if (false === M('SearchAll')->save($data)) {
			//更新失败
			\Think\Log::record('arc_id:' . $data['arc_id'] . '--cid:' . $data['cid'] . '更新全文搜索失败[SearchAll]');
			return false;
		}

	}

	return true;
}

/**
 * 返回 删除AttachmentIndex，SearchAll，Tag
 * @param array $data 文档相关数据 array('arc_id' => 11, 'model_id' => 1);
 * @return mixed
 */
function delete_att_tag_search($data) {

	if (empty($data) || empty($data['arc_id']) || empty($data['model_id'])) {
		return false;
	}
	if (is_array($data['arc_id'])) {
		$where = array('arc_id' => array('IN', $data['arc_id']), 'model_id' => $data['model_id']);
	} else {
		$where = array('arc_id' => $data['arc_id'], 'model_id' => $data['model_id']);
	}

	//delete AttachmentIndex
	M('AttachmentIndex')->where($where)->delete();
	//delete SearchAll
	M('SearchAll')->where($where)->delete();
	//delete tag
	$old_tag_info = M('TagIndex')->where($where)->field('tag_id, arc_id, cid')->select();
	if (!empty($old_tag_info)) {

		foreach ($old_tag_info as $val) {
			M('TagIndex')->where(array('tag_id' => $val['tag_id'], 'arc_id' => $val['arc_id'], 'cid' => $val['cid']))->delete(); //不属于旧栏目了
			M('Tag')->where(array('id' => $val['tag_id']))->setDec('num');

		}
	}

	return true;
}

/**
 * 解析配置项的配置项[line2:可选值 格式 a:名称1,b:名称2]--20170830
 * @param  string  $string 字符串
 * @param  integer $type   获取类型[1:显示表单类型(text,select,checkbox...)(位于一行), 0:可选值(位于第二行)]
 * @return mixed
 */
function parse_config_attr($string, $type = 1) {
	$array = preg_split('/[\r\n]+/', trim($string, "\r\n"));
	if ($type) {
		$t = current($array);
		return in_array($t, array('text', 'radio', 'checkbox', 'select', 'textarea', 'file@ad')) ? $t : 'text';
	}

	//select 并且是选择样式
	if (false !== strpos($string, 'select')) {
		if (false !== strpos($string, '__CFG_THEMESTYLE__') || false !== strpos($string, '_CFG_THEMESTYLE_')) {
			$tmp   = get_file_folder_List('./Public/Home/', 1);
			$value = array();
			foreach ($tmp as $key => $val) {
				$value[$val] = $val;
			}

			return $value;
		} elseif (false !== strpos($string, '__CFG_MOBILE_THEMESTYLE__') || false !== strpos($string, '_CFG_MOBILE_THEMESTYLE_')) {
			$tmp   = get_file_folder_List('./Public/Mobile/', 1);
			$value = array();
			foreach ($tmp as $key => $val) {
				$value[$val] = $val;
			}
			return $value;
		} elseif (false !== strpos($string, '__ONLINE_CFG_STYLE__') || false !== strpos($string, '_ONLINE_CFG_STYLE_')) {

			$tmp   = get_file_folder_List('./Data/static/js_plugins/online/', 2, '*.css');
			$tmp   = str_replace('.css', '', $tmp);
			$value = array();
			foreach ($tmp as $key => $val) {
				$value[$val] = $val;
			}
			return $value;
		}
	}

	array_splice($array, 0, 1); //删除第一个元素
	if (strpos($string, ':::')) {
		$value = array();
		foreach ($array as $val) {
			list($k, $v) = explode(':::', $val);
			$value[$k]   = $v;
		}
	} else {
		$value = $array;
	}
	return $value;
}

/*
 * 权限检测
 */
function chk_sys($type = 0) {
	$type  = $type ? 1 : 0;
	$_name = md5(get_sys_xcp($type));
	$_val  = get_sys_mcp($type);

	if ($_name != $_val) {
		exit();
	}
	$err = S('cs_error');
	if ($err) {
		exit();
	}

}
/**
 * 返回文档url,主要针对模型下的文章[或者必须有flag,jump_url字段的文档]
 * @param array $arc 文档内容
 * @param integer $typeid 类型
 * @param string $tvalue 表单类型和可选值
 * @param string|integer $vaule 值
 * @return mixed
 */

function view_url($arc, $act = 'Show/index') {
	if (($arc['flag'] & B_JUMP) && !empty($arc['jump_url'])) {
		$url = go_link($arc['jump_url']);
	} else {
		$url = go_link(C('DEFAULT_MODULE') . '/' . $act . '?cid=' . $arc['cid'] . '&id=' . $arc['id'], 1);
	}
	return $url;
}

?>