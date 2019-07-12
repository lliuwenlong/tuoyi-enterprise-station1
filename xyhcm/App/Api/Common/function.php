<?php

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
		//删除不存的旧记录
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