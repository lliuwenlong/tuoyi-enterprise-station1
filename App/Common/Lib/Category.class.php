<?php
namespace Common\Lib;

class Category {

	//清除包含对应字段的分类
	static public function clearCate($cate, $status = 'status', $value = 1) {

		$arr = array();
		foreach ($cate as $v) {
			if ($v[$status] != $value) {
				$arr[] = $v;
			}
		}
		return $arr;
	}

	//栏目显示只针对XYHCMS（清除单页模型(model_id=2)和外链(type!=0)）
	static public function clearPageAndLink($cate, $model_id = 2, $type = 0) {

		$arr = array();
		foreach ($cate as $v) {
			if ($v['model_id'] != $model_id && $v['type'] == $type) {
				$arr[] = $v;
			}
		}
		return $arr;
	}

	//一维数组
	static public function toLevel($cate, $delimiter = '———', $pid = 0, $level = 0) {

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$v['level']     = $level + 1;
				$v['delimiter'] = str_repeat($delimiter, $level);
				$arr[]          = $v;
				$arr            = array_merge($arr, self::toLevel($cate, $delimiter, $v['id'], $v['level']));
			}
		}

		return $arr;

	}

	//组成多维数组
	static public function toLayer($cate, $name = 'child', $pid = 0) {

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$v[$name] = self::toLayer($cate, $name, $v['id']);
				$arr[]    = $v;
			}
		}

		return $arr;
	}

	/**
	 * 把返回的数据集转换成Tree-多维数组
	 * @param array $list 要转换的数据集
	 * @param string $id id标记字段　//方便扩展|可以不要
	 * @param string $pid parent标记字段　//方便扩展|可以不要
	 * @param string $child child标记字段
	 * @param integer $root 根ID[开始的pid]
	 * @return array
	 */
	static public function toTree($list, $root = 0, $pk = 'id', $pid = 'pid', $child = '_child') {
		// 创建Tree
		$tree = array();
		if (is_array($list)) {
			// 创建基于主键的数组引用
			$refer = array();
			foreach ($list as $key => $data) {
				$refer[$data[$pk]] = &$list[$key];
			}
			foreach ($list as $key => $data) {
				// 判断是否存在parent
				$parentId = $data[$pid];
				if ($root == $parentId) {
					$tree[] = &$list[$key];
				} else {
					if (isset($refer[$parentId])) {
						$parent           = &$refer[$parentId];
						$parent[$child][] = &$list[$key];
					}
				}
			}
		}
		return $tree;
	}

	//一维数组(同模型)(model = table_name相同)，删除其他模型的分类
	static public function getLevelOfModel($cate, $table_name = 'article') {

		$arr = array();
		foreach ($cate as $v) {
			if ($v['table_name'] == $table_name) {
				$arr[] = $v;
			}
		}

		return $arr;

	}

	//一维数组(同模型)(model_id)，删除其他模型的分类
	static public function getLevelOfModelId($cate, $model_id = 0) {

		$arr = array();
		foreach ($cate as $v) {
			if ($v['model_id'] == $model_id) {
				$arr[] = $v;
			}
		}

		return $arr;

	}

	//传递一个子分类ID返回他的所有父级分类
	static public function getParents($cate, $id) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['id'] == $id) {
				$arr[] = $v;
				$arr   = array_merge(self::getParents($cate, $v['pid']), $arr);
			}
		}
		return $arr;
	}

	//传递分类ID，返回他父级分类或顶级分类
	// $type 1为父级，2为顶级
	static public function getParent($cate, $id, $type = 1) {
		$parent_info = array();
		$arrs        = self::getParents($cate, $id);
		if (empty($arrs)) {
			return $parent_info;
		}

		$self = array();
		foreach ($arrs as $v) {
			if ($v['id'] == $id) {
				$self = $v;
				break;
			}
		}

		//父级/顶级 是自己，则直接返回
		if ($self['pid'] == 0) {
			return $parent_info; //空/null
		}

		foreach ($arrs as $v) {
			if ($type == 1) {
				if ($v['id'] == $self['pid']) {
					$parent_info = $v;
					break;
				}
			} else if ($type == 2) {
				//顶级
				if ($v['pid'] == 0) {
					$parent_info = $v;
					break;
				}
			}

		}
		return $parent_info;
	}

	//传递一个子分类ID返回他的同级分类
	static public function getSameCate($cate, $id) {
		$arr  = array();
		$self = self::getSelf($cate, $id);
		if (empty($self)) {
			return $arr;
		}

		foreach ($cate as $v) {
			if ($v['id'] == $self['pid']) {
				$arr[] = $v;
			}
		}
		return $arr;
	}

	//判断分类是否有子分类,返回false,true
	static public function hasChild($cate, $id) {
		$arr = false;
		foreach ($cate as $v) {
			if ($v['pid'] == $id) {
				$arr = true;
				return $arr;
			}
		}

		return $arr;
	}

	//传递一个父级分类ID返回所有子分类ID
	/**
	 *@param $cate 全部分类数组
	 *@param $pid 父级ID
	 *@param $flag 是否包括父级自己的ID，默认不包括
	 **/
	static public function getChildsId($cate, $pid, $flag = 0) {
		$arr = array();
		if ($flag) {
			$arr[] = $pid;
		}
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v['id'];
				$arr   = array_merge($arr, self::getChildsId($cate, $v['id']));
			}
		}

		return $arr;
	}

	//传递一个父级分类ID返回所有子级分类
	static public function getChilds($cate, $pid) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v;
				$arr   = array_merge($arr, self::getChilds($cate, $v['id']));
			}
		}
		return $arr;
	}

	//传递一个分类ID返回该分类相当信息
	static public function getSelf($cate, $id) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['id'] == $id) {
				$arr = $v;
				return $arr;
			}
		}
		return $arr;
	}

	//传递一个分类ID返回该分类相当信息
	static public function getSelfByEName($cate, $ename) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['ename'] == $ename) {
				$arr = $v;
				return $arr;
			}
		}
		return $arr;
	}

}

?>