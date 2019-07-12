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
	    var URL = '/xyhai.php?s=/Page';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Page/index/pid/1';
	    var PUBLIC='/App/Manage/View/Public';
	    var data_path = "/Data";
		var tpl_public = "/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
	<script type="text/javascript" src="/Data/editor/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Data/editor/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
	$(function(){
	    var ue = UE.getEditor('inputContent',{
	        serverUrl :"<?php echo U('Public/editorMethod');?>"
	    });
	})
	</script>

</head>
<body>
	<div class="xyh-content">
		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
			<?php echo ($vo["name"]); ?>	
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


	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="body">
					<form class="form-horizontal" id="formValidate" role="form" method="post" action="<?php echo U('index');?>">
						<div class="form-group">
							<label for="inputProName" class="col-sm-2 control-label">摘要</label>
							<div class="col-sm-9">
								<textarea name="description" id="inputDescription" class="form-control" rows="3" placeholder="请填写摘要"><?php echo ($vo["description"]); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputContent" class="col-sm-2 control-label">内容</label>
							<div class="col-sm-9">
								<textarea name="content" id="inputContent" style="height: 370px;"><?php echo ($vo["content"]); ?></textarea>	
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-9">
								<input type="hidden" name="id" value="<?php echo ($pid); ?>" />
								<input type="hidden" name="pid" value="<?php echo ($pid); ?>" />
								<div class="btn-group">
									<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-saved"></i>
										保存
									</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

		



			
	</div>	
</body>
</html>