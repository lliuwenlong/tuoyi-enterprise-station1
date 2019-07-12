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
	    var URL = '/xyhai.php?s=/Database';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Database/index';
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
            </h3>
        </div>
        
    </div>

    <div class="row margin-botton">
        <div class="col-sm-6 column">
            <div class="btn-group btn-group-md">
                <?php if(ACTION_NAME == "index"): ?><button class="btn btn-primary" type="button" onclick="doGoBatch('<?php echo U('backup');?>')"><em class="glyphicon glyphicon-plus-sign"></em> 数据库备份</button>
                    <button class="btn btn-default" type="button" onclick="doGoBatch('<?php echo U('optimize', array('batchFlag' => 1));?>')"><em class="glyphicon glyphicon-th-list"></em> 数据表优化</button>
                    <button class="btn btn-default" type="button" onclick="doGoBatch('<?php echo U('repair', array('batchFlag' => 1));?>')"><em class="glyphicon glyphicon-th-list"></em> 数据表修复</button>
                    <button class="btn btn-default" type="button" onclick="goUrl('<?php echo U('restore');?>')"><em class="glyphicon glyphicon-th-list"></em> 还原管理</button>
                <?php else: ?>
                    <button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('index');?>')"><em class="glyphicon glyphicon-plus-sign"></em> 返回</button>
                    <button class="btn btn-default" type="button" onclick="doGoBatch('<?php echo U('restore');?>')"><em class="glyphicon glyphicon-th-list"></em> 还原</button>
                    <button class="btn btn-default" type="button" onclick="doConfirmBatch('<?php echo U('clear');?>', '确实要彻底删除选择项吗？')"><em class="glyphicon glyphicon-th-list"></em> 删除</button><?php endif; ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Note:</span>
              数据库中共有<?php echo ($tableNum); ?>张表，共计<?php echo ($total); ?>
            </div>
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
                                <th>表名</th>
                                <th>表用途</th>
                                <th>记录行数</th>
                                <th>引擎</th>
                                <th>字符集</th>
                                <th>表大小</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><input type="checkbox" name="key[]" value="<?php echo ($v["name"]); ?>"></td>
                            <td class="aleft"><?php echo ($v["name"]); ?></td>
                            <td><?php echo ($v["comment"]); ?></td>
                            <td><?php echo ($v["rows"]); ?></td>
                            <td><?php echo ($v["engine"]); ?></td>
                            <td><?php echo ($v["collation"]); ?></td>
                            <td><?php echo ($v["size"]); ?></td>
                            <td class="text-right">
                                <a href="<?php echo U('optimize',array('table_name' => $v['name']), '');?>" class="label label-info">优化</a>
                                <a href="<?php echo U('repair',array('table_name' => $v['name']), '');?>" class="label label-success">修复</a>                          
                            </td>
                        </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
            
        </div>
    </div>

    
			
	</div>	
</body>
</html>