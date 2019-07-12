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
	    var URL = '/xyhai.php?s=/Attachment';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Attachment/index';
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

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning" role="alert">
              
              <span class="sr-only">Note:</span>
              <!--span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span-->1、引用数：只统计图片类型的文件，被引用的文件建议不删除。<br/>
              2、缩略图:只针对图片类型文件。
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
                                <th>编号</th>
                                <th>原文件名称</th>
                                <th>文件地址</th>
                                <th>文件大小</th>
                                <th>缩略图</th>
                                <th>上传时间</th>
                                <th>引用数</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><?php echo ($v["id"]); ?></td>
                            <td class="aleft"><?php echo ($v["title"]); ?></td>
                            <td class="aleft"><?php echo ($v["file_path"]); ?></td>
                            <td><?php echo ($v["file_size"]); ?></td>
                            <td><?php if($v['has_litpic'] == 1): ?>有<?php else: ?>无<?php endif; ?></td>
                            <td><?php echo ($v["upload_time"]); ?></td>
                            <td><?php if($v['file_type'] == 1): ?><span class="red"><?php echo ($v["num"]); ?></span><?php else: ?><span>--</span><?php endif; ?></td>
                            <td class="text-right">

                                <?php if($v['file_type'] == 1): ?><a href="<?php echo ($upload); echo ($v["file_path"]); ?>" class="label label-success" target="_blank">预览</a>                                
                                <?php else: ?>
                                <a class="label label-default">预览</a><?php endif; ?>
                                <?php if($v['has_litpic'] == 1): ?><a href="<?php echo U('reThum', array('id' => $v['id']));?>" class="label label-success" title="重新生成缩略图"><i class="glyphicon icon-edit"> </i>重生</a><?php endif; ?>                                
                                <a href="javascript:;" onclick="toConfirm('<?php echo U('del',array('id' => $v['id']), '');?>', '确实要删除吗？')" class="label label-danger">删除</a>
                    
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