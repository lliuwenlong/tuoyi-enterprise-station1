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
	    var URL = '/xyhai.php?s=/Abc';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Abc/editDetail/id/1';
	    var PUBLIC='/App/Manage/View/Public';
	    var data_path = "/Data";
		var tpl_public = "/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
<script type="text/javascript" src="/App/Manage/View/Public/js/calendar.config.js"></script>
<script type="text/javascript" src="/Data/static/jq_plugins/iColorPicker/iColorPicker.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/XYHUploader/XYHUploader.js"></script>

<script type="text/javascript">
$(function () {
	//缩略图上传
	
	var ad_type = <?php echo ($cate['type']); ?>;
	if ($('#litpic').length > 0) {

		$('#litpic').XYHUploader({
			sfile:"abc1", 
			furl:"<?php echo U('Public/upload');?>", 
			burl:"<?php echo U('Public/browseFile', array('stype' => 'ad'));?>",
			show: (ad_type == 2 ? true : false),
			thide: false,
			thumflag: false
		});

	}

	

});




</script>
	

</head>
<body>
	<div class="xyh-content">
		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
			添加广告  
		    </h3>
		</div>
		
	</div>


	<div class="row">
		<div class="col-lg-12">

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('editDetail');?>">											

					<div class="form-group">
						<label for="inputTtitle" class="col-sm-2 control-label">广告名称</label>
						<div class="col-sm-9">
							<input type="text" name="title" id="inputTtitle" value="<?php echo ($vo["title"]); ?>" class="form-control" placeholder="广告名称" required="required" />									
						</div>
					</div>
					<div class="form-group">
						<label for="start_time" class="col-sm-2 control-label">开始时间</label>
						<div class="col-sm-9">
							<input type="text" name="start_time" id="start_time" class="form-control" value="<?php echo ($vo["start_time"]); ?>">
			                <script type="text/javascript">
			                    Calendar.setup({
			                        weekNumbers: true,
			                        inputField : "start_time",
			                        trigger    : "start_time",
			                        dateFormat: "%Y-%m-%d %H:%M:%S",
			                        showTime: true,
			                        minuteStep: 1,
			                        onSelect   : function() {this.hide();}
			                    });
			                </script>									
						</div>
					</div>

					<div class="form-group">
						<label for="inputColor" class="col-sm-2 control-label">结束时间</label>
						<div class="col-sm-5">
							<input type="text" name="end_time" id="end_time" class="form-control" value="<?php echo ($vo["end_time"]); ?>">
			                <script type="text/javascript">
			                    Calendar.setup({
			                        weekNumbers: true,
			                        inputField : "end_time",
			                        trigger    : "end_time",
			                        dateFormat: "%Y-%m-%d %H:%M:%S",
			                        showTime: true,
			                        minuteStep: 1,
			                        onSelect   : function() {this.hide();}
			                    });
			                </script>									
						</div>
					</div>

					<?php switch($cate['type']): case "1": ?><div class="form-group">
						<label for="inputContent" class="col-sm-2 control-label">文字内容</label>
						<div class="col-sm-9">
							<textarea name="content" id="inputContent" rows="5" class="form-control"><?php echo ($vo["content"]); ?></textarea>								
						</div>
					</div><?php break;?>
	    			<?php case "2": ?><div class="form-group">
						<label for="litpic" class="col-sm-2 control-label">图片</label>
						<div class="col-sm-9">
							    <input type="text" class="form-control" name="content" value="<?php echo ($vo["content"]); ?>" id="litpic" placeholder="图片地址" />	
						</div>
					</div><?php break;?>
	    			<?php case "3": ?><div class="form-group">
						<label for="litpic" class="col-sm-2 control-label">flash</label>
						<div class="col-sm-9">
							    <input type="text" class="form-control" name="content" id="litpic" value="<?php echo ($vo["content"]); ?>" placeholder="flash地址" />	
						</div>
					</div><?php break; endswitch;?>

					<div class="form-group">
						<label for="inputUrl" class="col-sm-2 control-label">链接地址</label>
						<div class="col-sm-9">
							<input type="text" name="url" id="inputUrl" class="form-control" value="<?php echo ($vo["url"]); ?>"placeholder="链接地址" />						
						</div>
					</div>

					
					<div class="form-group">
						<label for="inputSort" class="col-sm-2 control-label">排列</label>
						<div class="col-sm-9">
							<input type="text" name="sort" id="inputSort" value="<?php echo ($vo["sort"]); ?>" class="form-control" placeholder="排列" />							
						</div>
					</div>

					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">状态</label>
						<div class="col-sm-9">
							<label class="radio-inline">
							 	<input type="radio" name="status" value="1" <?php if($vo['status'] == 1): ?>checked="checked"<?php endif; ?> />启用				
							 </label>
							<label class="radio-inline">
							 	<input type="radio" name="status" value="0" <?php if($vo['status'] == 0): ?>checked="checked"<?php endif; ?> />停用		
							 </label>	
						</div>
					</div>		
					
					<div class="row margin-botton-large">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
							<input type="hidden" name="aid" value="<?php echo ($cate["id"]); ?>" />
							<input type="hidden" name="type" value="<?php echo ($cate["type"]); ?>" />		
							<div class="btn-group">
								<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-saved"></i>
									保存
								</button>
								<button type="button" onclick="goUrl('<?php echo U('detail', array('aid' => $cate['id']));?>')" class="btn btn-default"> <i class="glyphicon glyphicon-chevron-left"></i>
									返回
								</button>
							</div>
						</div>
					</div>
				</form>
	
		</div>
	</div>

		



			
	</div>	
</body>
</html>