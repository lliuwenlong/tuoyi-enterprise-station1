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
	    var URL = '/xyhai.php?s=/Category';
	    var APP	 = '/xyhai.php?s=';
	    var SELF='/xyhai.php?s=/Category/add';
	    var PUBLIC='/App/Manage/View/Public';
	    var data_path = "/Data";
		var tpl_public = "/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
<script type="text/javascript" src="/App/Manage/View/Public/js/XYHUploader/XYHUploader.js"></script>
<script type="text/javascript">
	$(function(){

		setStyleSelect('1');//默认样式选择

		$("#form_do").submit(function(){
			var name = $("input[name='name']");
			if($.trim(name.val())==''){
				layer.tips('名称不能为空', "input[name='name']", {
				  tips: [3, '#78BA32']
				});
				return false;			
			}else {
			}

		});


		$("input[name='type']").click(function(){    
            
            var checked = $(this).prop('checked'); 
            var nextEname = $(this).parents('.form-group').next();//ename; 

            if(checked) {
                nextEname.find('label').html('链接地址：');
                nextEname.find('span').hide();
            }else {
            	nextEname.find('label').html('别名(拼音)：');
            	nextEname.find('span').show();
            }
            
        });



        $("select[name='model_id']").change(function(){
        	var styleId = $(this).val();
			setStyleSelect(styleId);
		});
		
		function setStyleSelect(id){
			var template_list = $("select[name='template_list']");
        	var template_show = $("select[name='template_show']");        	
			switch (id){
				<?php if(is_array($mlist)): foreach($mlist as $key=>$v): ?>case '<?php echo ($v["id"]); ?>':
					//template_list.val("<?php echo ($v["template_list"]); ?>");
					template_list.find("option[value='<?php echo ($v["template_list"]); ?>']").prop("selected","selected");
					template_show.find("option[value='<?php echo ($v["template_show"]); ?>']").prop("selected","selected");
				 	break;<?php endforeach; endif; ?>
			}

		}

    });
</script>

<script type="text/javascript">
$(function () {
	//缩略图上传
	$('#cat_pic').XYHUploader({
		sfile:"img1", 
		furl:"<?php echo U('Public/upload',array('img_flag' => 1));?>", 
		burl:"<?php echo U('Public/browseFile', array('stype' => 'picture'));?>",
		thide: false,
		thumflag: false
	});

	
});



</script>
	

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
		<div class="col-lg-12">
			<div>
			
				<!-- Nav tabs -->			
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">基本选项</a>
					</li>
					<li role="presentation">
						<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">高级设置</a>
					</li>
					<li role="presentation">
						<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">权限设置</a>
					</li>
				</ul>

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('add');?>">
					<!-- Tab panes -->			
					<div class="tab-content" style="margin-top:20px;">
						<div role="tabpanel" class="tab-pane active" id="home">
							<div class="form-group">
								<label for="inputProName" class="col-sm-2 control-label">所属栏目</label>
								<div class="col-sm-9">
									<select name="pid" class="form-control">
										<option value="0">顶级栏目</option>
										<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($pid == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["delimiter"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
									</select>									
								</div>
							</div>

							<div class="form-group">
								<label for="inputModelId" class="col-sm-2 control-label">内容模型</label>
								<div class="col-sm-9">
									<select name="model_id" class="form-control">
										<?php if(is_array($mlist)): foreach($mlist as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
									</select>									
								</div>
							</div>							

							<div class="form-group">
								<label for="inputName" class="col-sm-2 control-label">栏目名称</label>
								<div class="col-sm-9">
									<input type="text" name="name" id="inputName" class="form-control" placeholder="栏目名称" />									
								</div>
							</div>
							<div class="form-group">
								<label for="inputType" class="col-sm-2 control-label">外部链接</label>
								<div class="col-sm-9">
									<label class="checkbox-inline">
										<input type="checkbox" name="type" id="inputType" value="1" />外部链接				
									 </label>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEname" class="col-sm-2 control-label">别名(拼音)</label>
								<div class="col-sm-9">
									<input type="text" name="ename" id="inputEname" class="form-control" />	
									<span>只能包含字母，数字</span>								
								</div>
							</div>
							<div class="form-group">
								<label for="inputEname" class="col-sm-2 control-label">栏目图片</label>
								<div class="col-sm-9">
									    <input type="text" class="form-control" name="cat_pic" id="cat_pic"  value="" placeholder="栏目图片地址" />	
								</div>
							</div>


							<div class="form-group">
								<label for="inputStyle" class="col-sm-2 control-label">css样式</label>
								<div class="col-sm-9">
									<input type="text" name="style" id="inputStyle" class="form-control" placeholder="css样式" />								
								</div>
							</div>

							<div class="form-group">
								<label for="inputName" class="col-sm-2 control-label">排序</label>
								<div class="col-sm-9">
									<input type="text" name="sort" id="inputSort" class="form-control" value="1" />									
								</div>
							</div>

							<div class="form-group">
								<label for="inputName" class="col-sm-2 control-label">显示</label>
								<div class="col-sm-9">
									<label class="radio-inline">
									 	<input type="radio" name="status" value="1" checked="checked"/>显示				
									 </label>
									<label class="radio-inline">
									 	<input type="radio" name="status" value="0"/>隐藏		
									 </label>
									<label class="radio-inline">
									 	<input type="radio" name="status" value="4" />禁止访问		
									 </label>	
								</div>
							</div>

						</div>
						<div role="tabpanel" class="tab-pane" id="profile">
							<div class="form-group">
								<label for="inputProName" class="col-sm-2 control-label">栏目模板</label>
								<div class="col-sm-9">
									<select name="template_list" class="form-control">
										<?php if(is_array($styleListList)): foreach($styleListList as $key=>$v): ?><option value="<?php echo ($v); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
									</select>									
								</div>
							</div>

							<div class="form-group">
								<label for="inputTemplateShow" class="col-sm-2 control-label">内容页模板</label>
								<div class="col-sm-9">
									<select name="template_show" id="inputTemplateShow" class="form-control">
										<?php if(is_array($styleShowList)): foreach($styleShowList as $key=>$v): ?><option value="<?php echo ($v); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
									</select>									
								</div>
							</div>							

							<div class="form-group">
								<label for="inputSeotitle" class="col-sm-2 control-label">Seo标题</label>
								<div class="col-sm-9">
									<input type="text" name="seo_title" id="inputSeotitle" class="form-control" placeholder="Seo标题" />
								</div>
							</div>
							<div class="form-group">
								<label for="inputKeywords" class="col-sm-2 control-label">关键词</label>
								<div class="col-sm-9">
									<input type="text" name="keywords" id="inputKeywords" class="form-control" placeholder="关键词" />						
								</div>
							</div>
							<div class="form-group">
								<label for="inputDescription" class="col-sm-2 control-label">栏目描述</label>
								<div class="col-sm-9">
									<textarea name="description" id="inputDescription" class="form-control" placeholder="栏目描述"></textarea>							
								</div>
							</div>	

						</div>
						<div role="tabpanel" class="tab-pane" id="messages">
							<div class="form-group">
								<label for="inputProName" class="col-sm-2 control-label">管理员组权限</label>
								<div class="col-sm-9">
									<table class="table table-hover xyh-table-bordered-out-small">
										<thead>
											  <tr class="active">
											    <th>管理员组名称</th>
											    <th>查看</th>				    
											    <th>添加</th>				    
											    <th>修改</th>				    
											    <th>删除</th>
											    <th>移动</th>		    
											    <th>回收站</th>	    
											    <th>还原</th>	    
											    <th>清除</th>
											  </tr>
										  </thead>
										  <tbody>
										  <?php if(is_array($roleList)): foreach($roleList as $key=>$v): ?><tr>
										    <td><?php echo ($v["title"]); ?></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="index,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="add,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="edit,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="del,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="move,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="trach,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="restore,<?php echo ($v["id"]); ?>" /></td>
										    <td align="center"><input type="checkbox" name="acc_role_id[]" value="clear,<?php echo ($v["id"]); ?>" /></td>
										  </tr><?php endforeach; endif; ?>
										  </tbody>
									</table>							
								</div>
							</div>

							<div class="form-group">
								<label for="inputTemplateShow" class="col-sm-2 control-label">会员组权限</label>
								<div class="col-sm-9">
									<table class="table table-hover xyh-table-bordered-out-small">
									  <thead>
										  <tr class="active">
										    <th>会员组名称</th>
										    <th>允许访问</th>
										  </tr>
									  </thead>
									  <tbody>
										  <?php if(is_array($groupList)): foreach($groupList as $key=>$v): ?><tr>
										    <td><?php echo ($v["name"]); ?></td>
										    <td align="center"><input type="checkbox" name="acc_group_id[]" value="visit,<?php echo ($v["id"]); ?>" /></td>
										  </tr><?php endforeach; endif; ?>
									  </tbody>
									</table>								
								</div>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-offset-2 col-sm-9">
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

		



			
	</div>	
</body>
</html>