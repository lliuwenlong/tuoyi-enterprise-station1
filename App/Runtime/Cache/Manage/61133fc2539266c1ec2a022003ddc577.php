<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>后台</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="/cms222/Data/static/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">	
	<link rel='stylesheet' type="text/css" href="/cms222/App/Manage/View/Public/css/main.css" />
	<!-- 头部css文件|自定义  -->
	

	<script type="text/javascript" src="/cms222/Data/static/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/cms222/Data/static/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="/cms222/Data/static/js/html5shiv.min.js"></script>
		<script src="/cms222/Data/static/js/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="/cms222/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="/cms222/Data/static/jq_plugins/layer/layer.js"></script>
	<script language="JavaScript">
	    <!--
	    var URL = '/cms222/xyhai.php?s=/System';
	    var APP	 = '/cms222/xyhai.php?s=';
	    var SELF='/cms222/xyhai.php?s=/System/clearCache';
	    var PUBLIC='/cms222/App/Manage/View/Public';
	    var data_path = "/cms222/Data";
		var tpl_public = "/cms222/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/cms222/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
    <script type="text/javascript">  
      $(function(){

        $('.btn-clear-cache').click(function(event) {
            /* Act on the event */
            var url = "<?php echo U('clearCache');?>";
            var id = $(this).attr('data-id');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id:id},
              })
              .done(function(data) {
                if (data.status) {
                    layer.alert(data.info);
                } else{
                    layer.alert(data.info);

                }
              }).fail(function(jqXHR,textStatus) {    
                layer.alert(textStatus+'，请重试！'); 
            });

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
        <div class="col-sm-12">
            <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Note:</span>
              <span>说明：</span>清除系统各种数据缓存。
            </div>
        </div>
    </div>

    <div class="row margin-botton">
        <div class="col-md-12 column" style="margin-bottom:10px;">
            <button class="btn btn-info btn-clear-cache" type="button" data-id="10"><em class="icon-remove-circle"> </em>清除全部应用缓存</button>    
        </div>
        <div class="col-md-12 column">
            <div class="btn-group btn-group-md">
                <button class="btn btn-info btn-clear-cache" type="button" data-id="11"><em class="icon-remove-circle"> </em>清除应用日志目录</button>
                <button class="btn btn-default btn-clear-cache" type="button" data-id="12"><em class="icon-remove-circle"> </em>清除项目模板缓存目录</button>
                <button class="btn btn-info btn-clear-cache" type="button" data-id="13"><em class="icon-remove-circle"> </em>清除应用缓存目录</button>
                <button class="btn btn-default btn-clear-cache" type="button" data-id="14"><em class="icon-remove-circle"> </em>清除应用数据目录</button>
            </div>
        </div>
    </div>




			
	</div>	
</body>
</html>