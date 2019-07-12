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
 * @Last Modified time: 2017-11-11 08:35:02
 */
namespace Api\Controller;

use Common\Lib\Category;

class LtController extends ApiCommonController {

	protected $app_secret; //申请应用时分配密钥

	protected $is_mobile; //手机访问--公共

	/**
	 * 初始化
	 */
	public function _initialize() {

		$this->app_secret = I('app_secret', '');
		$this->is_mobile  = I('ismobile', 0, 'intval');

	}

	/*
		*   list标签
	*/
	public function alist() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('total_rows' => 0, 'total_pages' => 0, 'list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$type_id     = I('typeid', '0');
		$flag        = I('flag', 0, 'intval');
		$title_len   = I('titlelen', 0, 'intval');
		$info_len    = I('infolen', 0, 'intval');
		$point_start = I('pointstart', 0, 'intval');
		$point_end   = I('pointend', 0, 'intval');
		$order_by    = I('orderby', 'point DESC,id DESC');
		$limit       = I('limit', '10');
		$limit       = get_limit($limit); //
		$field_flag  = I('fieldflag', 0, 'intval');
		$model_pre   = I('modelpre', ''); //模型标识:art文章,pro产品,pic图片集,sof下载
		$page_size   = I('pagesize', 0, 'intval');
		$page_no     = I('pageno', 1, 'intval'); //当前页

		$keyword = I('keyword', '');

		$flag       = flag2sum($flag);
		$field_flag = empty($field_flag) ? 0 : 1;
		$nofield    = $field_flag ? '' : 'content,picture_urls';

		$_table_name = '';
		switch ($model_pre) {
		case 'art':
			$_table_name = 'article';
			break;
		case 'pro':
			$_table_name = 'product';
			break;
		case 'pic':
			$_table_name = 'picture';
			break;
		case 'sof':
			$_table_name = 'soft';
			break;
		default:
			break;
		}

		if (!empty($type_id)) {
			$type_id_arr = explode(',', $type_id);
			$ids_arr     = array();

			foreach ($type_id_arr as $type_id_key => $type_id_val) {
				$type_id_val = intval($type_id_val);
				if (empty($type_id_val)) {
					continue;
				}
				if (empty($_table_name)) {
					$_selfcate   = Category::getSelf(get_category(10), $type_id_val);
					$_table_name = strtolower($_selfcate['table_name']);
				}

				$type_id_ids = Category::getChildsId(get_category(10), $type_id_val, true);
				$ids_arr     = array_merge($ids_arr, $type_id_ids);

			}

			$ids_arr = array_unique($ids_arr);

			if ($_table_name == '') {
				$_table_name = 'article';
			}

			if (!empty($ids_arr)) {
				$where = array($_table_name . '.delete_status' => 0, $_table_name . '.cid' => array('IN', $ids_arr));
			} else {
				$where = array($_table_name . '.delete_status' => 0);
			}

		} else {
			if (empty($_table_name)) {
				$_table_name = 'article';
			}

			$where = array($_table_name . '.status' => 0);
			$where = array('cate_status' => array('LT', 2));
		}

		if ($point_start > 0 && $point_end > 0) {
			$where[$_table_name . '.point'] = array('between', array($point_start, $point_end));
		} else if ($point_start > 0) {
			$where[$_table_name . '.point'] = array('EGT', $point_start);
		} else if ($point_end > 0) {
			$where[$_table_name . '.point'] = array('ELT', $point_end);
		}

		if ($keyword != '') {
			$where[$_table_name . '.title'] = array('like', '%' . $keyword . '%');
		}

		if ($flag > 0) {
			$where['_string'] = $_table_name . ".flag & $flag = $flag ";
		}

		if (!empty($_table_name) && $_table_name != 'page') {
			//分页
			if ($page_size > 0) {
				$count   = D2('ArcView', $_table_name)->where($where)->count();
				$pages   = ceil($count / $page_size);
				$page_no = $page_no > $pages ? $pages : ($page_no < 1 ? 1 : $page_no);

				$result['data']['total_rows']  = (int) $count;
				$result['data']['total_pages'] = $pages;

				//设置显示的页数
				$limit = ($page_no - 1) * $page_size . ',' . $page_size;

			}

			$_list = D2('ArcView', $_table_name)->nofield($nofield)->where($where)->order($order_by)->limit($limit)->select();

			if (empty($_list)) {
				$_list = array();
			}
			foreach ($_list as $key => $val) {
				$_jumpflag          = ($val['flag'] & B_JUMP) == B_JUMP ? true : false;
				$_list[$key]['url'] = $this->getUrl($this->is_mobile, array('cid' => $val['cid'], 'id' => $val['id']), array('ename' => $val['ename'], 'id' => $val['id']), $_jumpflag, $val['jump_url']);
				if ($title_len) {
					$_list[$key]['title'] = str2sub($val['title'], $title_len, 0);
				}

				if ($info_len) {
					$_list[$key]['description'] = str2sub($val['description'], $info_len, 0);
				}
				if (isset($val['litpic'])) {
					if (empty($val['litpic'])) {
						$val['litpic'] = get_picture($val['litpic'], 0, 0);
					}

					if (stripos($val['litpic'], 'http://') === false && stripos($val['litpic'], 'https://') === false) {
						$val['litpic'] = $this->getDomain() . $val['litpic'];
					}

					$_list[$key]['litpic'] = $val['litpic'];

				}

				if (isset($val['picture_urls'])) {
					$picture_urls = get_picture_array($val['picture_urls']);
					foreach ($picture_urls as $k2 => $v) {
						if (stripos($picture_urls[$k2]['url'], 'http://') === false && stripos($picture_urls[$k2]['url'], 'https://') === false) {
							$picture_urls[$k2]['url'] = $this->getDomain() . $v['url'];
						}

					}

					$_list[$key]['picture_urls'] = $picture_urls;
				}
				if (isset($val['down_link'])) {
					$down_link = get_picture_array($val['down_link']);
					foreach ($down_link as $k2 => $v) {
						if (!empty($v['url'])) {

							$down_link[$k2]['url'] = $this->getUrl($this->is_mobile, array('at' => $key, 'id' => $val['id']), array(), false, '', 'Show', 'download');
						} else {
							unset($down_link[$k2]);
						}
					}

					$_list[$key]['down_link'] = $down_link;
				}

			}
		} else {
			$_list = array();
		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	/*
		*   slist标签--全局搜索
	*/
	public function slist() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('total_rows' => 0, 'total_pages' => 0, 'list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$type_id     = I('typeid', '0'); //多
		$model_id    = I('modelid', 0, 'intval');
		$arc_id      = I('arcid', '0'); //可以多id
		$arc_id      = string2filter($arc_id, ',', true); //
		$title_len   = I('titlelen', 0, 'intval');
		$info_len    = I('infolen', 0, 'intval');
		$point_start = I('pointstart', 0, 'intval');
		$point_end   = I('pointend', 0, 'intval');
		$order_by    = I('orderby', 'id DESC');
		$limit       = I('limit', '10');
		$limit       = get_limit($limit); //
		$field_flag  = I('fieldflag', 0, 'intval');
		$page_size   = I('pagesize', 0, 'intval');
		$page_no     = I('pageno', 1, 'intval'); //当前页

		$keyword = I('keyword', '');
		$where   = array('search_all.delete_status' => 0, 'cate_status' => array('LT', 2));

		if (!empty($type_id)) {
			$type_id_arr = explode(',', $type_id);
			$ids_arr     = array();

			foreach ($type_id_arr as $type_id_key => $type_id_val) {
				$type_id_val = intval($type_id_val);
				if (empty($type_id_val)) {
					continue;
				}

				$type_id_ids = Category::getChildsId(get_category(10), $type_id_val, true);
				$ids_arr     = array_merge($ids_arr, $type_id_ids);

			}

			$ids_arr = array_unique($ids_arr);

			if (!empty($ids_arr)) {
				$where['search_all.cid'] = array('IN', $ids_arr);
			}
		}

		if (!empty($model_id)) {
			$where['search_all.model_id'] = $model_id;
		}

		if ($point_start > 0 && $point_end > 0) {
			$where['search_all.point'] = array('between', array($point_start, $point_end));
		} else if ($pointstart > 0) {
			$where['search_all.point'] = array('EGT', $point_start);
		} else if ($pointend > 0) {
			$where['search_all.point'] = array('ELT', $point_end);
		}

		if ($keyword != '') {
			$where['search_all.title'] = array('like', '%' . $keyword . '%');
		}
		if (!empty($arc_id)) {
			$where['search_all.arc_id'] = array('IN', $arc_id);
		}

		//分页
		if ($page_size > 0) {
			$count   = D2('ArcView', 'search_all')->where($where)->count();
			$pages   = ceil($count / $page_size);
			$page_no = $page_no > $pages ? $pages : ($page_no < 1 ? 1 : $page_no);

			$result['data']['total_rows']  = (int) $count;
			$result['data']['total_pages'] = $pages;
			//设置显示的页数
			$limit = ($page_no - 1) * $page_size . ',' . $page_size;

		}

		$_list = D2('ArcView', 'search_all')->nofield($nofield)->where($where)->order($order_by)->limit($limit)->select();
		if (empty($_list)) {
			$_list = array();
		}
		foreach ($_list as $key => $val) {
			$_jumpflag          = !empty($val['jump_url']) ? true : false;
			$_list[$key]['url'] = $this->getUrl($this->is_mobile, array('cid' => $val['cid'], 'id' => $val['id']), array('ename' => $val['ename'], 'id' => $val['id']), $_jumpflag, $val['jump_url']);

			if ($title_len) {
				$_list[$key]['title'] = str2sub($val['title'], $title_len, 0);
			}

			if ($info_len) {
				$_list[$key]['description'] = str2sub($val['description'], $info_len, 0);
			}
			if (isset($val['litpic'])) {
				if (empty($val['litpic'])) {
					$val['litpic'] = get_picture($val['litpic'], 0, 0);
				}

				if (stripos($val['litpic'], 'http://') === false && stripos($val['litpic'], 'https://') === false) {
					$val['litpic'] = $this->getDomain() . $val['litpic'];
				}

				$_list[$key]['litpic'] = $val['litpic'];

			}

		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	public function catlist() {

		$result = array('code' => 0, 'msg' => '', 'data' => array('list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$type_id   = I('typeid', '0', 'intval');
		$type      = I('type', 'son'); //son表示下级栏目,self表示同级栏目,top顶级栏目(top忽略typeid)
		$flag      = I('flag', 1, 'intval'); //0(不显示链接和单页),1(全部显示--默认)
		$hide_flag = I('hideflag', 1, 'intval'); //0(不显示隐藏的),1(显示隐藏--默认)
		$point_end = I('pointend', 0, 'intval');
		$order_by  = I('orderby', 'point DESC,id DESC');
		$limit     = I('limit', '10');
		$model_id  = I('modelid', 0, 'intval');

		if (strpos($limit, ',') === false) {
			$_limit = array(0, intval($limit));
		} else {
			$_limit    = explode(',', $limit);
			$_limit[0] = intval($_limit[0]);
			$_limit[1] = intval($_limit[1]);
		}

		if ($hide_flag == 1) {
			$__catlist = get_category(10); //status 0,1
		} else {
			$__catlist = get_category(1); //status 1
		}

		if ($model_id) {
			$__catlist = Category::getLevelOfModelId($__catlist, $model_id);
		}

		if ($flag == 0) {
			$__catlist = Category::clearPageAndLink($__catlist);
		}
		if (empty($__catlist)) {
			$__catlist = array();
		}

		foreach ($__catlist as $key => $val) {
			$__catlist[$key]['url'] = $this->getCateUrl($this->is_mobile, $val, false, ''); //($catlist);
		}

		if ($type_id == 0 || $type == 'top') {
			$_catlist = Category::toLayer($__catlist);
		} else {
			//同级分类
			if ($type == 'self') {
				$_typeinfo = Category::getSelf($__catlist, $type_id);
				$_catlist  = Category::toLayer($__catlist, 'child', $_typeinfo['pid']);

			} else {
				//son
				$_catlist = Category::toLayer($__catlist, 'child', $type_id);
			}
		}

		if (empty($_catlist)) {
			$_catlist = array();
		}

		$_list = array();
		foreach ($_catlist as $key => $val) {
			if ($key < $_limit[0]) {
				continue;
			}

			if ($key >= ($_limit[1] + $_limit[0])) {
				break;
			}
			if (isset($val['cat_pic'])) {
				if (empty($val['cat_pic'])) {
					$val['cat_pic'] = '';
				} else if (stripos($val['cat_pic'], 'http://') === false && stripos($val['cat_pic'], 'https://') === false) {
					$val['cat_pic'] = $this->getDomain() . $val['cat_pic'];
				}

				$_catlist[$key]['cat_pic'] = $val['cat_pic'];

			}
			$_list[] = &$_catlist[$key];
		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	public function cattype() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('list' => null));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$type_id  = I('typeid', '0', 'intval');
		$level    = I('level', 'self'); //self 自己(默认),top 顶级，parent父级
		$num_flag = I('numflag', 0, 'intval'); //显示对应文档数

		$_category_all = get_category(0);
		if ($level == 'parent') {
			$cattype = Category::getParent($_category_all, $type_id, 1);
		} else if ($level == 'top') {
			$cattype = Category::getParent($_category_all, $type_id, 2);
		} else {
			$cattype = Category::getSelf($_category_all, $type_id);
		}

		if (!empty($cattype)) {
			$cattype['url'] = get_url($cattype);
			$cattype['url'] = $this->getCateUrl($this->is_mobile, $cattype, false, ''); //($catlist);

			if (isset($cattype['cat_pic'])) {
				if (empty($cattype['cat_pic'])) {
					$cattype['cat_pic'] = '';
				} else if (stripos($cattype['cat_pic'], 'http://') === false && stripos($cattype['cat_pic'], 'https://') === false) {
					$cattype['cat_pic'] = $this->getDomain() . $cattype['cat_pic'];
				}
			}

			if ($num_flag) {
				$cattype['arc_num'] = get_category_count($cattype['id']);
			} else {
				$cattype['arc_num'] = 0;
			}

		} else {
			$cattype = null;
		}

		$result['code']         = 1;
		$result['data']['list'] = $cattype;
		$this->ajaxReturn($result);

	}

	public function gbooklist() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('total_rows' => 0, 'total_pages' => 0, 'list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$order_by  = I('orderby', 'id DESC');
		$show_flag = I('showflag', 0, 'intval'); //全部显示--0只显示审核过的--1全部显示
		$limit     = I('limit', '10');
		$limit     = get_limit($limit); //
		$page_size = I('pagesize', 0, 'intval');
		$page_no   = I('pageno', 1, 'intval'); //当前页

		$keyword = I('keyword', '');
		$where   = array();
		//是否全部显示
		if ($show_flag != 1) {
			$where['status'] = 1; //已审核
		}

		if ($page_size > 0) {
			$count = M('guestbook')->where($where)->count();

			$pages   = ceil($count / $page_size);
			$page_no = $page_no > $pages ? $pages : ($page_no < 1 ? 1 : $page_no);

			$result['data']['total_rows']  = (int) $count;
			$result['data']['total_pages'] = $pages;
			//设置显示的页数
			$limit = ($page_no - 1) * $page_size . ',' . $page_size;
		}

		$_list = M('guestbook')->where($where)->order($order_by)->limit($limit)->select();
		if (empty($_list)) {
			$_list = array();
		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	public function reviewlist() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('total_rows' => 0, 'total_pages' => 0, 'list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }
		$model_id  = I('modelid', 0, 'intval');
		$arc_id    = I('arcid', 0, 'intval');
		$user_id   = I('userid', 0, 'intval');
		$type      = I('type', 0, 'intval'); //树形风格，多维数组
		$order_by  = I('orderby', 'id DESC');
		$show_flag = I('showflag', 0, 'intval'); //全部显示--0只显示审核过的--1全部显示
		$limit     = I('limit', '10');
		$limit     = get_limit($limit); //
		$page_size = I('pagesize', 0, 'intval');
		$page_no   = I('pageno', 1, 'intval'); //当前页

		$keyword = I('keyword', '');
		$where   = array();
		//是否全部显示
		if ($show_flag != 1) {
			$where['status'] = 1; //已审核
		}

		if ($model_id > 0) {
			$where['model_id'] = $model_id;
		}
		if ($arc_id > 0) {
			$where['post_id'] = $arc_id;
		}

		if ($user_id > 0) {
			$where['user_id'] = $user_id;
		}

		//树形风格，多维数组
		if ($type == 1) {
			$where['pid'] = 0;
		}

		if ($page_size > 0) {
			$count = D('CommentView')->where($where)->count();

			$pages   = ceil($count / $page_size);
			$page_no = $page_no > $pages ? $pages : ($page_no < 1 ? 1 : $page_no);

			$result['data']['total_rows']  = (int) $count;
			$result['data']['total_pages'] = $pages;
			//设置显示的页数
			$limit = ($page_no - 1) * $page_size . ',' . $page_size;
		}

		$_list = D('CommentView')->where($where)->order($order_by)->limit($limit)->select();
		if (empty($_list)) {
			$_list = array();
		}

		//$type ,pid >0
		if ($type == 1 && !empty($_list)) {
			$pid_array = array();
			foreach ($_list as $k => $v) {
				$pid_array[]        = $v['id'];
				$_list[$k]['face']  = $this->getDomain($ismobile) . get_avatar($v['face'], 30);
				$_list[$k]['child'] = array(); //后面就不用初始化
				unset($_list[$k]['agent']);

			}
			$where  = array('pid' => array('IN', $pid_array));
			$_child = D('CommentView')->where($where)->select();
			if ($_child) {
				foreach ($_list as $k => $v) {

					foreach ($_child as $k2 => $v2) {
						if ($v['id'] == $v2['pid']) {
							$v2['face'] = $this->getDomain($ismobile) . get_avatar($v2['face'], 30);
							unset($v2['agent']);
							$_list[$k]['child'][] = $v2;
							unset($_child[$k2]); //删除已经认领元素,减少内循环
						}
					}
				}
			}

		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	public function ashow() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('content' => null));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$id         = I('id', 0, 'intval');
		$cid        = I('cid', 0, 'intval');
		$ename      = I('e', '', 'htmlspecialchars,trim');
		$click_flag = I('clickflag', 0, 'intval'); //是否更新点击，1是，0否
		$user_id    = I('userid', 0, 'intval');

		if (empty($id) || (empty($cid) && empty($ename))) {
			$result['msg'] = '非法请求';
			$this->ajaxReturn($result);
		}

		$cate = get_category(10);
		if (!empty($ename)) { //ename不为空
			$self = Category::getSelfByEName($cate, $ename); //当前栏目信息
		} else {
			//$cid来判断
			$self = Category::getSelf($cate, $cid); //当前栏目信息
		}
		if (empty($self) || $self['type'] == 1) {
			//栏目不存在||外链||4禁止访问(4不会读取);
			$result['msg'] = '栏目不存在或禁止访问';
			$this->ajaxReturn($result);
		}
		$cid = $self['id'];

		//访问权限
		$group_id = 0;
		$group_id = (empty($group_id) || empty($user_id)) ? 1 : $group_id; //1为游客
		//判断访问权限
		$access = M('categoryAccess')->where(array('cat_id' => $cid, 'flag' => 0, 'action' => 'visit'))->getField('role_id', true);
		//权限存在，则判断
		if (!empty($access) && !in_array($group_id, $access)) {
			$result['msg'] = '您没有访问该信息的权限！';
			$this->ajaxReturn($result);
		}

		$content = M($self['table_name'])->where(array('delete_status' => 0, 'id' => $id))->find();

		if (empty($content)) {
			$result['msg'] = '记录不存在！';
			$this->ajaxReturn($result);
		}
		//更新点击数
		if ($click_flag) {
			M($self['table_name'])->where(array('id' => $id))->setInc('click');
		}

		unset($content['aid']);
		if (isset($content['litpic'])) {
			if (empty($content['litpic'])) {
				$content['litpic'] = get_picture($content['litpic'], 0, 0);
			}

			if (stripos($content['litpic'], 'http://') === false && stripos($content['litpic'], 'https://') === false) {
				$content['litpic'] = $this->getDomain() . $content['litpic'];
			}

		}

		//当前url
		$_jumpflag       = ($content['flag'] & B_JUMP) == B_JUMP ? true : false;
		$content['url']  = $this->getUrl($this->is_mobile, array('cid' => $content['cid'], 'id' => $content['id']), array('ename' => $self['ename'], 'id' => $content['id']), $_jumpflag, $content['jump_url']);
		$content['cate'] = $self;

		if (isset($content['picture_urls'])) {

			$picture_urls = get_picture_array($content['picture_urls']);
			foreach ($picture_urls as $key => $v) {
				if (stripos($picture_urls[$key]['url'], 'http://') === false && stripos($picture_urls[$key]['url'], 'https://') === false) {
					$picture_urls[$key]['url'] = $this->getDomain() . $v['url'];
				}
			}

			$content['picture_urls'] = $picture_urls;
		}

		//下载地址:
		if (isset($content['down_link'])) {
			$down_link = get_picture_array($content['down_link']);

			foreach ($down_link as $key => $v) {
				if (!empty($v['url'])) {

					$down_link[$key]['url'] = $this->getUrl($this->is_mobile, array('at' => $key, 'id' => $content['id']), array(), false, '', 'Show', 'download');
				} else {
					unset($down_link[$key]);
				}
			}

			$content['down_link'] = $down_link;
		}

		$result['code']            = 1;
		$result['data']['content'] = $content;
		$this->ajaxReturn($result);

	}

	public function taglist() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('total_rows' => 0, 'total_pages' => 0, 'list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }
		$type_id   = I('typeid', 0, 'intval');
		$arc_id    = I('arcid', 0, 'intval');
		$order_by  = I('orderby', 'sort ASC,id DESC');
		$limit     = I('limit', '10');
		$limit     = get_limit($limit); //
		$page_size = I('pagesize', 0, 'intval');
		$page_no   = I('pageno', 1, 'intval'); //当前页

		$keyword = I('keyword', '');
		$where   = array();
		if (!empty($type_id)) {
			$where['ti.cid'] = $type_id;
		}

		if (!empty($type_id) && !empty($arc_id)) {
			$where['ti.arc_id'] = $arc_id;
		}

		if ($keyword != '') {
			$where['t.tag_name'] = array('like', '%' . $keyword . '%');
		}

		if ($page_size > 0) {
			$count = M('Tag')->alias('t')->field('t.tag_name,t.id,t.num,t.hit')->join('INNER JOIN __TAG_INDEX__ ti ON ti.tag_id = t.id')->where($where)->count('DISTINCT t.tag_name');

			$pages   = ceil($count / $page_size);
			$page_no = $page_no > $pages ? $pages : ($page_no < 1 ? 1 : $page_no);

			$result['data']['total_rows']  = (int) $count;
			$result['data']['total_pages'] = $pages;

			//设置显示的页数
			$limit = ($page_no - 1) * $page_size . ',' . $page_size;
		}

		$_list = M('Tag')->alias('t')->distinct(true)->field('t.tag_name,t.id,t.num,t.hit')->join('INNER JOIN __TAG_INDEX__ ti ON ti.tag_id = t.id')->where($where)->order($order_by)->limit($limit)->select();

		if (empty($_list)) {
			$_list = array();
		}

		foreach ($_list as $key => $val) {
			$_list[$key]['url'] = $this->getUrl($this->is_mobile, array('tname' => $val['tag_name']), array('controller' => 'Tag', 'tname' => $val['tag_name']), false, '', 'Tag', 'shows');

		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	public function abc() {
		$result = array('code' => 0, 'msg' => '', 'data' => array('total_rows' => 0, 'abc_type' => 0, 'list' => array()));
		// if (!IS_POST) {
		// 	$result['msg'] = '非法请求';
		// 	$this->ajaxReturn($result);
		// }

		$id    = I('id', 0, 'intval');
		$limit = I('limit', 0, 'intval');

		$where = array('aid' => $id, 'status' => 1);
		$limit = "$limit";

		$abc_cate = M('abc')->find($_id);
		if ($abc_cate) {
			$limit               = empty($limit) ? $abc_cate['num'] : $limit;
			$where['start_time'] = array('lt', date('Y-m-d H:i:s'));
			$where['end_time']   = array('gt', date('Y-m-d H:i:s'));
			$_list               = M('abcDetail')->where($where)->order('sort')->limit($limit)->select();
			if (empty($_list)) {
				$_list = array();
			}
			$result['data']['total_rows'] = count($_list);
			$result['data']['abc_type']   = (int) $abc_cate['type'];

			foreach ($_list as $key => $val) {
				$_list[$key]['width']  = $abc_cate['width'];
				$_list[$key]['height'] = $abc_cate['height'];
				if ($abc_cate['type'] > 1 && stripos($val['content'], 'http://') === false && stripos($cattype['content'], 'https://') === false) {
					$_list[$key]['content'] = $this->getDomain() . $val['content'];

				}
			}
		}

		if (empty($_list)) {
			$_list = array();
		}

		$result['code']         = 1;
		$result['data']['list'] = $_list;
		$this->ajaxReturn($result);

	}

	public function getCateUrl($ismobile, $cate, $jumpflag = false, $jumpurl = '') {

		$url = '';
		//如果是跳转，直接就返回跳转网址
		if ($jumpflag && !empty($jumpurl)) {
			return $jumpurl;
		}

		if (empty($cate)) {
			return $url;
		}

		$ename = $cate['ename'];
		if ($cate['type'] == 1) {
			$firstChar = substr($ename, 0, 1);
			if ($firstChar == '@') {
				//内部
				//不存在文档id,也无路由情况
				$ename        = ucfirst(substr($ename, 1)); //
				$_ename_array = explode('/', $ename);
				if (!isset($_ename_array[1])) {
					$_ename_array[1] = 'index';
				}

				//$firstChar = substr($ename, 0, 1);($firstChar != '/')
				$url = $this->getUrl($ismobile, array(), $_ename_array, false, '', $_ename_array[0], $_ename_array[1]);

			} else {
				$url = $ename; //http://
			}

		} else {

			$url = $this->getUrl($ismobile, array('cid' => $cate['id']), array('ename' => $ename), false, '', 'List', 'index', false);

		}

		return $url;

	}

	public function getUrl($ismobile, $params, $eparams, $jumpflag = false, $jumpurl = '', $controller = 'Show', $action = 'index', $suffixflag = true) {
		$url = '';
		//如果是跳转，直接就返回跳转网址
		if ($jumpflag && !empty($jumpurl)) {
			return $jumpurl;
		}
		if (empty($params) && empty($eparams)) {
			return $url;
		}

		$varModule     = C('VAR_MODULE');
		$varController = C('VAR_CONTROLLER');
		$varAction     = C('VAR_ACTION');

		$var                 = array();
		$var[$varModule]     = 'Home';
		$var[$varController] = empty($controller) ? 'Show' : $controller;
		$var[$varAction]     = empty($action) ? 'index' : $action;

		$params  = empty($params) ? array() : $params;
		$eparams = empty($eparams) ? array() : $eparams;

		if ($suffixflag) {
			$suffix = C('URL_HTML_SUFFIX');
			if ($pos = strpos($suffix, '|')) {
				$suffix = substr($suffix, 0, $pos);
			}
		} else {
			$suffix = null;
		}

		if ($ismobile) {
			$var[$varModule] = 'Mobile';
			$url_model       = 3; //C('URL_MODEL');
			$url_depr        = C('URL_PATHINFO_DEPR');
			$url_router_on   = C('URL_ROUTER_ON'); //开启路由
		} else {
			$url_model     = get_cfg_value('HOME_URL_MODEL'); //URL模式 ,0普通模式 ,1:PATHINFO模式（默认模式）,2:REWRITE模式,3 s=/module/c/m/x/x,
			$url_depr      = get_cfg_value('HOME_URL_PATHINFO_DEPR');
			$url_router_on = get_cfg_value('HOME_URL_ROUTER_ON'); //开启路由

		}

		if ($url_router_on == true && empty($eparams)) {
			$url_router_on = false;
		}

		switch ($url_model) {
		case 1:
		case 2:
		case 3:
			if ($var[$varModule] == 'Home') {
				unset($var[$varModule]);
			}
			$var_index = '/index.php/';
			if ($url_model == 2) {
				$var_index = '/';
			} else if ($url_model == 3) {
				$var_index = '/index.php?s=/';
			}

			if ($url_model != 3 && $url_router_on == true) {
				$var_tmp = array(); //U($module . '' . $ename . '/' . $id, '')
				if (isset($var[$varModule])) {
					$var_tmp[$varModule] = $var[$varModule];
				}
				$var_tmp = array_merge($var_tmp, $eparams);

				$url = __ROOT__ . $var_index . implode($url_depr, $var_tmp);
			} else {
				$url = __ROOT__ . $var_index . implode($url_depr, $var);
				foreach ($params as $var => $val) {
					if ('' !== trim($val)) {
						$url .= $url_depr . $var . $url_depr . urlencode($val);
					}

				}

			}
			if ($suffix && '/' != substr($url, -1)) {
				$url .= '.' . ltrim($suffix, '.');
			}
			break;
		default: //0
			$url = __ROOT__ . '/index.php?' . http_build_query($var) . '&' . http_build_query($params);
			break;
		}

		$url = $this->getDomain($ismobile) . $url;

		return $url;
	}

	protected function getDomain($ismobile = false) {

		$domain  = $_SERVER['HTTP_HOST'];
		$_domain = (is_ssl() ? 'https://' : 'http://') . $domain;

		return $_domain;

	}

}
