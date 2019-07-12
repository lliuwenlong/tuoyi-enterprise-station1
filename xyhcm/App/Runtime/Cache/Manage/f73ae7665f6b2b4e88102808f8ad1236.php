<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>后台</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="/Data/static/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">	
	<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/main.css" />
	<!-- 头部css文件|自定义  -->
	

	<script type="text/javascript" src="/Data/static/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Data/static/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="/Data/static/js/html5shiv.min.js"></script>
		<script src="/Data/static/js/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="/Data/static/jq_plugins/layer/layer.js"></script>
	<script language="JavaScript">
	    <!--
	    var URL = '/xyhai.php?s=/Article';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Article/index/pid/1';
	    var PUBLIC='/App/Manage/View/Public';
	    var data_path = "/Data";
		var tpl_public = "/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
</head>
<body>
	<div class="xyh-content">
		
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
            <?php echo ($type); ?> 
            <span class="xyh-pos">
                <i class="glyphicon glyphicon-log-out"></i>
                <?php if(ACTION_NAME == "index"): if(is_array($poscate)): foreach($poscate as $key=>$v): ?><a href="<?php echo U('' . ucfirst($v['table_name']) .'/index', array('pid' => $v['id']));?>"><?php echo ($v["name"]); ?> </a> <em class="glyphicon glyphicon-menu-right"></em><?php endforeach; endif; endif; ?>
            </span>         
            </h3>
            

            <?php if($subcate): ?><nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <span class="navbar-text">子栏目：</span>
                        <?php if(is_array($subcate)): foreach($subcate as $key=>$v): ?><a href="<?php echo U(''. ucfirst($v['table_name']) . '/index', array('pid' => $v['id']));?>" class="btn btn-sm btn-default navbar-btn"><?php echo ($v["name"]); if(!empty($v['child'])): ?>&there4;<?php endif; ?></a><?php endforeach; endif; ?>
                    </div>
                </div>
            </nav><?php endif; ?>
        </div>
        
    </div>

    <div class="row margin-botton">
        <div class="col-sm-6 column">
            <div class="btn-group btn-group-md">
            <?php if(ACTION_NAME == "index"): ?><button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('add', array('pid'=>$pid));?>')"><em class="glyphicon glyphicon-plus-sign"></em> 添加文章</button>
                 <button class="btn btn-default" type="button" onclick="toGetSubmit('<?php echo U('move', array('pid' => $pid));?>', <?php echo C('URL_MODEL');?>, '<?php echo C('URL_PATHINFO_DEPR');?>')"><em class="glyphicon glyphicon-th-list"></em> 移动</button>                 
                 <button class="btn btn-default" type="button" onclick="doConfirmBatch('<?php echo U('del', array('batchFlag' => 1,'pid' => $pid));?>', '确实要删除选择项吗？')"><em class="glyphicon glyphicon-remove-circle"></em> 删除</button>                 
                 <button class="btn btn-default" type="button" onclick="goUrl('<?php echo U('trach', array('pid' => $pid));?>')"><em class="glyphicon glyphicon-trash"></em> 回收站</button>
            <?php else: ?>
                <button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('index', array('pid'=>$pid));?>')"><em class="glyphicon glyphicon-chevron-left"></em> 返回</button>
                 <button class="btn btn-default" type="button" onclick="doGoBatch('<?php echo U('restore', array('batchFlag' => 1, 'pid' => $pid));?>')"><em class="glyphicon glyphicon-retweet"></em> 还原</button>                 
                 <button class="btn btn-default" type="button" onclick="doConfirmBatch('<?php echo U('clear', array('batchFlag' => 1, 'pid' => $pid));?>', '确实要彻底删除选择项吗？')"><em class="glyphicon glyphicon-remove-circle"></em> 彻底删除</button><?php endif; ?>

            </div>
        </div>
        <div class="col-sm-6 text-right">
            <?php if(ACTION_NAME == "index"): ?><form class="form-inline" method="post" action="<?php echo U('index');?>">
                  <div class="form-group">
                    <label class="sr-only" for="inputKeyword">关键字</label>
                    <input type="text" class="form-control" name="keyword" id="inputKeyword" placeholder="关键字" value="<?php echo ($keyword); ?>">
                  </div>
                  <input type="hidden" name="pid" value="<?php echo ($pid); ?>">
                  <button type="submit" class="btn btn-default">搜索</button>
                </form><?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" id="form_do" name="form_do">
                <div class="table-responsive">
                    <table class="table table-hover xyh-table-bordered-out">
                        <thead>
                            <tr class="active">
                                <th><input type="checkbox" id="check"></th>
                                <th>编号</th>
                                <th>标题</th>
                                <th>分类</th>
                                <th>权重</th>
                                <th>点击数</th>
                                <th>发布时间</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                            <td><?php echo ($v["id"]); ?></td>
                            <td class="aleft" style="color:<?php echo ($v["color"]); ?>"><?php echo ($v["title"]); if($v["flag"] > 0): ?><span style="color:#079B04;">[<?php echo (flag2Str($v["flag"])); ?>]</span><?php endif; ?></td>
                            <td><?php echo ($v["cate_name"]); ?></td>
                            <td><?php echo ($v["point"]); ?></td>
                            <td><?php echo ($v["click"]); ?></td>
                            <td><?php echo ($v["publish_time"]); ?></td>
                            <td class="text-right">
                            <?php if(ACTION_NAME == "index"): ?><a href="<?php echo (view_url($v)); ?>" target="_blank" class="label label-info">查看</a>
                            <a href="<?php echo U('edit',array('id' => $v['id'],'pid' => $pid), '');?>" class="label label-success">编辑</a>
                            <a href="javascript:;" onclick="toConfirm('<?php echo U('del',array('id' => $v['id'], 'pid' => $pid), '');?>', '确实要删除吗？')" class="label label-danger">删除</a>
                            <?php else: ?>
                            <a href="<?php echo U('restore',array('id' => $v['id'], 'pid' => $pid), '');?>" class="label label-info">还原</a>
                            <a href="javascript:;" onclick="toConfirm('<?php echo U('clear',array('id' => $v['id'], 'pid' => $pid), '');?>', '确实要彻底删除吗？')" class="label label-danger">彻底删除</a><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="xyh-page">
                        <?php echo ($page); ?>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    
			
	</div>	
</body>
</html>