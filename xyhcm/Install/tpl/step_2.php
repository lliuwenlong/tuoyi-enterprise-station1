<?php if (!defined('XYHCMS_INSTALL')) exit('Access Denied!')?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $lang['install_title'];?></title>

<link rel="stylesheet" href="css/global.css" type="text/css" />
<script type="text/javascript" src="../Data/static/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../Data/static/jq_plugins/layer/layer.js"></script>
<script type="text/javascript">
	$(function(){
		if (!$.support.leadingWhitespace) {
            layer.alert('XYHCMS安装程序和后台不再保障IE8及以下浏览器的正常访问。建议您尽快升级浏览器IE9+，或者使用Chrome、Firefox。', {icon: 2});
        }

		$('#BtnStopNext').click(function(event) {
			/* Act on the event */
			layer.alert('检测环境未通过，不能继续安装', {icon: 2});
		});
	});
</script>

</head>
<body>
	<?php require 'tpl/header.php';?>
	<div class="xyh-main">
		<div class="step">
			<ul>
				<li class="current"><em>1</em><?php echo $lang['detection_environment']; ?></li>
				<li><em>2</em><?php echo $lang['data_create']; ?></li>
				<li><em>3</em><?php echo $lang['complete_installation']; ?></li>
			</ul>
		</div>
		<table class="xyh-table-base">
			<tr>
				<th><?php echo $lang['environmental_testing']; ?></th>
				<th><?php echo $lang['recommended_configuration']; ?></th>
				<th><?php echo $lang['current_status']; ?></th>
			</tr>
			<tr>
				<td><?php echo $lang['operating_system']; ?></td>
				<td>Linux&nbsp;/&nbsp;WNT</td>
				<td><?php echo $os_software;?></td>
			</tr>
			<tr>
				<td>PHP <?php echo $lang['version']; ?></td>
				<td>&gt;<?php echo $lowest;?></td>
				<td><?php echo $environment_phpversion;?></td>
			</tr>							
			<tr>
				<td>pdo_mysql <?php echo $lang['extension'];?></td>
                <td><?php echo $lang['mustopen'];?></td>
				<td><?php echo $environment_pdo;?></td>
			</tr>
			<tr>
				<td><?php echo $lang['attachment_upload']; ?></td>
				<td>&gt;2M</td>
				<td><?php echo $environment_upload;?></td>
			</tr>
			<tr>
				<td>SESSION</td>
				<td><?php echo $lang['mustopen'];?></td>
				<td><?php echo $environment_session;?></td>
			</tr>
			<tr>
				<td>ICONV</td>
                <td><?php echo $lang['mustopen'];?></td>
				<td><?php echo $environment_iconv;?></td>
			</tr>
			<tr>
				<td>GD <?php echo $lang['extension'];?></td>
                <td><?php echo $lang['mustopen'];?></td>
				<td><?php echo $environment_gd;?></td>
			</tr>			
			<tr>
				<td>mbstring <?php echo $lang['extension'];?></td>
                <td><?php echo $lang['mustopen'];?></td>
				<td><?php echo $environment_mb;?></td>
			</tr>	
		</table>
		<table class="xyh-table-base">
			<tr>
				<th><?php echo $lang['directory_permissions'];?></th>
				<th><?php echo $lang['write'];?></th>
				<th><?php echo $lang['read'];?></th>
			</tr>
			<?php foreach ($file as $dirvalue) {?>
			<tr>
				<td><?php echo $dirvalue['path']?></td>
				<td>
				<?php 				
					echo $dirvalue['write'] ? '<span class="ok">&nbsp;</span>' : '<span class="no">&nbsp;</span>';
				?>
				</td>
				<td><?php echo $dirvalue['read'] ? '<span class="ok">&nbsp;</span>' : '<span class="no">&nbsp;</span>';?></td>
			</tr>
			<?php }?>
		</table>
		<div class="action"><a href="javascript:history.go(-1);" class="btn_blue"><?php echo $lang['previous'];?></a>&nbsp;&nbsp;&nbsp;
		<?php if($environment_all) {?>
		<a href="index.php?step=3" class="btn_blue"><?php echo $lang['next'];?></a>
		<?php } else {?>
		<a href="javascript:;" class="btn_disable" id="BtnStopNext"><?php echo $lang['next'];?></a>
		<?php }?>

		</div>
	</div>
	<?php require 'tpl/footer.php';?>
</body>
</html>