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
	    var SELF='/xyhai.php?s=/Abc/edit/id/1';
	    var PUBLIC='/App/Manage/View/Public';
	    var data_path = "/Data";
		var tpl_public = "/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
<script type="text/javascript" src="/App/Manage/View/Public/js/calendar.config.js"></script>
<script type="text/javascript">
	
	function select_type(id) {
		if (id == 1) {
			$(".xyh-input-size").hide();
			$("#inputSetting").html('&lt;loop&gt;&lt;a href=&quot;{'+'$url}&quot;&gt;{'+'$content}&lt;/a&gt;&lt;/loop&gt;');
		}else if(id == 2) {
			$(".xyh-input-size").show();
			$("#inputSetting").html('&lt;loop&gt;&lt;a href=&quot;{'+'$url}&quot;&gt;&lt;img src=&quot;{'+'$content}&quot; /&gt;&lt;/a&gt;&lt;/loop&gt;');
		}else {
			$(".xyh-input-size").show();
			$("#inputSetting").html('&lt;loop&gt;&lt;embed src=&quot;{'+'$content}&quot; quality=&quot;high&quot; width=&quot;{'+'$width}&quot; height=&quot;{'+'$height}&quot; wmode=&quot;opaque&quot; type=&quot;application/x-shockwave-flash&quot;&gt;&lt;/embed&gt;&lt;/loop&gt;');
		}
		
	}

	$(function(){
		$('#inputType').change(function(event) {
			var type = $(this).val();
			select_type(type);
		});
	});
</script>	

</head>
<body>
	<div class="xyh-content">
		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
			添加广告位  
		    </h3>
		</div>
		
	</div>


	<div class="row">
		<div class="col-lg-12">

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('edit');?>">	
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">广告位名</label>
						<div class="col-sm-9">
							<input type="text" name="name" id="inputName" value="<?php echo ($vo["name"]); ?>" class="form-control" placeholder="广告位名" required="required" />									
						</div>
					</div>
					<div class="form-group">
						<label for="inputType" class="col-sm-2 control-label">广告类型</label>
						<div class="col-sm-9">
							<select name="type" id="inputType" class="form-control">
								<option value="1" <?php if($vo['type'] == 1): ?>selected="selected"<?php endif; ?>>文字广告</option>
								<option value="2" <?php if($vo['type'] == 2): ?>selected="selected"<?php endif; ?>>图片广告</option>
								<option value="3" <?php if($vo['type'] == 3): ?>selected="selected"<?php endif; ?>>flash广告</option>
							</select>									
						</div>
					</div>

					<div class="form-group xyh-input-size" <?php if($vo['type'] == 1): ?>style="display:none;"<?php endif; ?>>
						<label for="inputWidth" class="col-sm-2 control-label">尺寸</label>
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">宽</span>
								<input type="text" name="width" id="inputWidth" value="<?php echo ($vo["width"]); ?>" value="0" class="form-control" />
								<span class="input-group-addon">px</span>
							</div>
						</div>
					</div>
					<div class="form-group xyh-input-size" <?php if($vo['type'] == 1): ?>style="display:none;"<?php endif; ?>>
						<label for="inputHeight" class="col-sm-2 control-label"></label>						
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">高</span>
								<input type="text" name="height" id="inputHeight" value="<?php echo ($vo["height"]); ?>" value="<?php echo ($vo["height"]); ?>" class="form-control" />	
								<span class="input-group-addon">px</span>
							</div>							
						</div>
					</div>

					<div class="form-group">
						<label for="inputNum" class="col-sm-2 control-label">显示广告数</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="num" id="inputNum" value="<?php echo ($vo["num"]); ?>" class="form-control" class="form-control" />		
								<span class="input-group-addon">条</span>
							</div>												
						</div>
					</div>
					<div class="form-group">
						<label for="inputRemark" class="col-sm-2 control-label">描述</label>
						<div class="col-sm-9">
							<textarea name="remark" id="inputRemark" class="form-control"><?php echo ($vo["remark"]); ?></textarea>								
						</div>
					</div>

					<div class="form-group">
						<label for="setting" class="col-sm-2 control-label">模板</label>
						<div class="col-sm-9">
							<textarea name="setting" id="inputSetting" rows="5" class="form-control"><?php echo ($vo["setting"]); ?></textarea>
							<div class="alert alert-success" role="alert">
							<p>支持html代码,对应字段放到&lt;loop&gt;&lt;/loop&gt;之间。loop为循环列表。</p>
							<p>可用字段:$title为标题，$content为图片地址或文本内容或动画地址</p>
							<p>$url为链接地址，$width为广告宽度,$height为广告高度</p>
							<p>$sort排序数值，$autoindex为自增变量(从0开始递增)，$autoindex+1为自增变量(从1开始递增)</p>
							</div>
												
						</div>
					</div>
					
					<div class="row margin-botton-large">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />	
							<div class="btn-group">
								<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-saved"></i>
									保存
								</button>
								<button type="button" onclick="goUrl('<?php echo U('index');?>')" class="btn btn-default"> <i class="glyphicon glyphicon-chevron-left"></i>
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