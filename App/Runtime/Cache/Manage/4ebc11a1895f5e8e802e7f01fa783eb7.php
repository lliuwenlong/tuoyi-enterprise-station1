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
	    var SELF='/xyhai.php?s=/Abc/index';
	    var PUBLIC='/App/Manage/View/Public';
	    var data_path = "/Data";
		var tpl_public = "/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
    <script type="text/javascript">
        $(function(){
            $('.btn-click-show').click(function(event) {
                /* Act on the event */
                var iUrl = $(this).attr('data-href');
                if (iUrl.length > 0) {

                    layer.open({
                      type: 2,
                      title: 'XYHCMS',
                      shadeClose: true,
                      shade: false,
                      maxmin: true, //开启最大化最小化按钮
                      area: ['700px', '500px'],
                      content: iUrl
                    });

                }
            });

        })
        
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

    <div class="row margin-botton">
        <div class="col-sm-6 column">
            <div class="btn-group btn-group-md">
                <button class="btn btn-primary" type="button" onclick="goUrl('<?php echo U('add');?>')"><em class="glyphicon glyphicon-plus-sign"></em> 添加广告位</button>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <?php if(ACTION_NAME == "index"): ?><form class="form-inline" method="post" action="<?php echo U('index');?>">
                  <div class="form-group">
                    <label class="sr-only" for="inputKeyword">关键字</label>
                    <input type="text" class="form-control" name="keyword" id="inputKeyword" placeholder="关键字" value="<?php echo ($keyword); ?>">
                  </div>
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
                                <th>编号</th>
                                <th>广告位</th>
                                <th>类型</th>
                                <th>尺寸</th>
                                <th>广告数</th>
                                <th class="text-right">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                            <td><?php echo ($v["id"]); ?></td>
                            <td><a href="<?php echo U('detail',array('aid' => $v['id']), '');?>"><?php echo ($v["name"]); ?>  [<?php echo (str2sub($v["remark"],16)); ?>]</a></td>
                            <td>
                                <?php switch($v['type']): case "1": ?>文本<?php break;?>
                                    <?php case "2": ?>图片<?php break;?>
                                    <?php case "3": ?>flash<?php break;?>
                                    <?php default: ?>其他<?php endswitch;?>
                            </td>                
                            <td><?php echo ($v["width"]); ?>x<?php echo ($v["height"]); ?></td>
                            <td><?php echo ($v["items"]); ?></td>
                            <td class="text-right">
                                <a href="javascript:;" data-href="<?php echo U('getcode',array('id' => $v['id']), '');?>" class="label label-info btn-click-show">获取代码</a>
                                <a href="<?php echo U('detail',array('aid' => $v['id']), '');?>" class="label label-primary">广告列表</a>
                                <a href="<?php echo U('edit',array('id' => $v['id']), '');?>" class="label label-success">编辑</a>
                                <a href="javascript:;" onclick="toConfirm('<?php echo U('del',array('id' => $v['id']), '');?>', '确实要删除吗？')" class="label label-danger">删除</a>            
                                <a href="<?php echo U('addDetail',array('aid' => $v['id']), '');?>" class="label label-info">添加广告</a>
                    
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