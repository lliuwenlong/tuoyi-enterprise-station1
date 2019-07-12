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
	    var SELF='/xyhai.php?s=/Article/add/pid/1';
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

<script type="text/javascript" src="/App/Manage/View/Public/js/calendar.config.js"></script>
<script type="text/javascript" src="/Data/static/jq_plugins/iColorPicker/iColorPicker.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/XYHUploader/XYHUploader.js"></script>

<script type="text/javascript">
$(function () {
	//缩略图上传
	$('#litpic').XYHUploader({
		sfile:"img1", 
		furl:"<?php echo U('Public/upload',array('img_flag' => 1));?>", 
		burl:"<?php echo U('Public/browseFile', array('stype' => 'picture'));?>",
		thide: false,
		thumflag: true
	});

	$('#CK_JumpUrl').click(function(){
            if($(this).prop('checked')) {
                $('#JumpUrlDiv').show();

            }else {
                $('#JumpUrlDiv').hide();
            }
            
     });
	
});




</script>
	

</head>
<body>
	<div class="xyh-content">
		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><em class="glyphicon glyphicon-cloud-upload"></em> 
			添加文章  
		    </h3>
		</div>
		
	</div>


	<div class="row">
		<div class="col-lg-12">

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('add');?>">											

					<div class="form-group">
						<label for="inputTtitle" class="col-sm-2 control-label">标题</label>
						<div class="col-sm-9">
							<input type="text" name="title" id="inputTtitle" class="form-control" placeholder="标题" required="required" />									
						</div>
					</div>
					<div class="form-group">
						<label for="inputShorttitle" class="col-sm-2 control-label">副标题</label>
						<div class="col-sm-9">
							<input type="text" name="short_title" id="inputShorttitle" class="form-control" placeholder="副标题" />									
						</div>
					</div>

					<div class="form-group">
						<label for="inputColor" class="col-sm-2 control-label">标题颜色</label>
						<div class="col-sm-5">
							<input type="text" name="color" id="inputColor" class="form-control  iColorPicker" placeholder="标题颜色" />									
						</div>
					</div>

					<div class="form-group">
						<label for="inputColor" class="col-sm-2 control-label">自定义属性</label>
						<div class="col-sm-9">
							<?php if(is_array($flagtypelist)): foreach($flagtypelist as $key=>$v): ?><label class="checkbox-inline"><input type='checkbox' name='flags[]' value='<?php echo ($key); ?>' <?php if($key == B_JUMP): ?>id="CK_JumpUrl"<?php endif; ?> /> <?php echo ($v); ?></label><?php endforeach; endif; ?>								
						</div>
					</div>

					<div class="form-group" id="JumpUrlDiv" style="display:none;">
						<label for="inputJumpurl" class="col-sm-2 control-label">跳转网址</label>
						<div class="col-sm-9">
							<input type="text" name="jump_url" id="inputJumpurl" class="form-control" placeholder="跳转网址" />									
						</div>
					</div>

					<div class="form-group">
						<label for="inputProName" class="col-sm-2 control-label">所属栏目</label>
						<div class="col-sm-9">
							<select name="cid" class="form-control">
								<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($pid == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["delimiter"]); echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>									
						</div>
					</div>

					<div class="form-group">
						<label for="litpic" class="col-sm-2 control-label">缩略图</label>
						<div class="col-sm-9">
							    <input type="text" class="form-control" name="litpic" id="litpic"  value="" placeholder="缩略图地址" />	
						</div>
					</div>



					<div class="form-group">
						<label for="inputKeywords" class="col-sm-2 control-label">关键词</label>
						<div class="col-sm-9">
							<input type="text" name="keywords" id="inputKeywords" class="form-control" value="" placeholder="多关键词之间用“,”隔开" />						
						</div>
					</div>

					<div class="form-group">
						<label for="inputDescription" class="col-sm-2 control-label">摘要</label>
						<div class="col-sm-9">
							<textarea name="description" id="inputDescription" class="form-control"></textarea>								
						</div>
					</div>
					<div class="form-group">
						<label for="inputAuthor" class="col-sm-2 control-label">作者</label>
						<div class="col-sm-9">
							<input type="text" name="author" id="inputAuthor" class="form-control" value="" placeholder="作者" />							
						</div>
					</div>
					<div class="form-group">
						<label for="inputCopyfrom" class="col-sm-2 control-label">来源</label>
						<div class="col-sm-9">
							<input type="text" name="copyfrom" id="inputCopyfrom" class="form-control" value="" placeholder="来源" />							
						</div>
					</div>

					<div class="form-group">
						<label for="inputContent" class="col-sm-2 control-label">内容</label>
						<div class="col-sm-9">
							<textarea name="content" id="inputContent" style="height: 370px;"></textarea>						
						</div>
					</div>					

					<div class="form-group">
						<label for="inputPublishtime" class="col-sm-2 control-label">发布时间</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="publish_time" id="inputPublishtime" value="<?php echo date('Y-m-d H:i:s',time());?>">
			                <script type="text/javascript">
			                    Calendar.setup({
			                        weekNumbers: true,
			                        inputField : "inputPublishtime",
			                        trigger    : "inputPublishtime",
			                        dateFormat: "%Y-%m-%d %H:%M:%S",
			                        showTime: true,
			                        minuteStep: 1,
			                        onSelect   : function() {this.hide();}
			                    });
			                </script>						
						</div>
					</div>

					<div class="form-group">
						<label for="inputShorttitle" class="col-sm-2 control-label">权重</label>
						<div class="col-sm-2">
							<input type="text" name="point" id="inputPoint" value="100" class="form-control" placeholder="权重" />	
						</div>
						<div class="col-sm-7">
							<label class="checkbox-inline">权重用于排序，从大到小，排序优先</label>	
						</div>
					</div>

					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">点击数</label>
						<div class="col-sm-2">
							<input type="text" name="click" id="click" class="form-control" value="0" placeholder="点击数" />			
						</div>
						<div class="col-sm-7">	
							<label class="checkbox-inline"><input type="checkbox" name="clickFlag" value="1" <?php if(C('CFG_CLICK_NUM_INIT') == 0): ?>checked="checked"<?php endif; ?> /> 随机生成</label>	
						</div>
					</div>


					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">评论</label>
						<div class="col-sm-9">
							<label class="radio-inline">
							 	<input type="radio" name="comment_flag" value="1" checked="checked" />允许				
							 </label>
							<label class="radio-inline">
							 	<input type="radio" name="comment_flag" value="0" />禁止		
							 </label>	
						</div>
					</div>		
					
					<div class="row margin-botton-large">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="hidden" name="pid" value="<?php echo ($pid); ?>" />
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