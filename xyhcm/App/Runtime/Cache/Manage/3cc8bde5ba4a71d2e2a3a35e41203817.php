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
	    var URL = '/xyhai.php?s=/Templets';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Templets/index';
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
            

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <span class="navbar-text">模板选择：</span>
                        <?php if(is_array($vlistFileType)): foreach($vlistFileType as $key=>$v): ?><a href="<?php echo U('index', array('ftype' => $key));?>" class="btn btn-sm navbar-btn <?php if(($key) == $ftype): ?>btn-info<?php else: ?>btn-default<?php endif; ?>"><?php echo ($v); ?></a><?php endforeach; endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        
    </div>

    <div class="row margin-botton">
        <div class="col-sm-6 column">
            <div class="btn-group btn-group-md">                
                <button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('add', array('ftype'=>$ftype, 'flag' => 1));?>')"><em class="glyphicon glyphicon-plus-sign"></em> 新建模板[列表/单页]</button>
                <button class="btn btn-default" type="button" onclick="goUrl('<?php echo U('add', array('ftype'=>$ftype, 'flag' => 2));?>')"><em class="glyphicon glyphicon-plus-sign"></em> 新建模板[内容页]</button>
                <button class="btn btn-default" type="button" onclick="goUrl('<?php echo U('add', array('ftype'=>$ftype, 'flag' => 0));?>')"><em class="glyphicon glyphicon-plus-sign"></em> 新建模板[首页]</button>
            </div>
        </div>
        <div class="col-sm-6 text-right">
        <span class="label label-default"><?php echo (count($vlist)); ?>个模板</span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" id="form_do" name="form_do">
                <div class="table-responsive">
                    <table class="table table-hover xyh-table-bordered-out">
                        <thead>
                            <tr class="active">
                                <th>名称</th>
                                <th>可写</th>
                                <th>发布时间</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><?php echo ($v["name"]); ?></td>
                            <td><?php if(!empty($v['write'])): ?>是<?php else: ?>否<?php endif; ?></td>
                            <td><?php echo (date('Y-m-d H:i:s', $v["mtime"])); ?></td>
                            <td class="text-right">
                            <a href="<?php echo U('edit',array('ftype' => $ftype,'fname' => $v['bname']), '');?>" class="label label-success">编辑</a>                            
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