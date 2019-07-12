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
</head>
<body>
	<?php require 'tpl/header.php';?>
	<div class="xyh-main">
		<div class="step">
			<ul>
				<li class="ok"><em>1</em><?php echo $lang['detection_environment']; ?></li>
				<li class="current"><em>2</em><?php echo $lang['data_create']; ?></li>
				<li><em>3</em><?php echo $lang['complete_installation']; ?></li>
			</ul>
		</div>
		<form action="index.php?step=3" method="post">
		<table class="xyh-table-base xyh-table2">
			<tr class="tr-bg">
				<th colspan="3"><?php echo $lang['database_information']; ?></th>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['install_mysql_host']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="127.0.0.1" name="DB_HOST" placeholder="<?php echo $lang['install_mysql_host_intro']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['install_mysql_port']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="3306" name="DB_PORT" placeholder="<?php echo $lang['install_mysql_port_intro']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['install_mysql_username']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="root" name="DB_USER" placeholder="<?php echo $lang['install_mysql_username']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['install_mysql_password']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="" name="DB_PWD" placeholder="<?php echo $lang['install_mysql_password']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['install_mysql_name']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="xyhcms" name="DB_NAME" placeholder="<?php echo $lang['install_mysql_name_intro']; ?>" /></td>

			</tr>
			<tr>
				<td class="th"><?php echo $lang['install_mysql_prefix']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="xyh_" name="DB_PREFIX" placeholder="<?php echo $lang['install_mysql_prefix_intro']; ?>" /></td>
			</tr>
			<tr class="tr-bg">
				<th colspan="3"><?php echo $lang['site_configuration']; ?></th>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['site_name']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="<?php echo $lang['site_name_default']; ?>" name="WEB_NAME" placeholder="<?php echo $lang['site_name']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['site_url']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="<?php echo $weburl;?>" name="WEB_URL" placeholder="<?php echo $lang['site_url_intro']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['site_style']; ?>：</td>
				<td colspan="2">
					<label class="radio-inline"><input type="radio" name="WEB_STYLE" value="default" checked="checked"><?php echo $lang['site_style_c']; ?></label>
					<label class="radio-inline"><input type="radio" name="WEB_STYLE" value="blog"><?php echo $lang['site_style_b']; ?></label></td>
			</tr>
			<tr class="tr-bg">
				<th colspan="3"><?php echo $lang['website_administrator']; ?></th>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['username']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="xyhcms" name="username" placeholder="<?php echo $lang['username']; ?>" /></td>
			</tr>
			<tr>
				<td class="th"><?php echo $lang['password']; ?>：</td>
				<td colspan="2"><input type="text" class="text" value="" name="password" placeholder="<?php echo $lang['password_intro']; ?>" /></td>
			</tr>
			<tr>
				<td class="th">E-mail：</td>
				<td colspan="2"><input type="text" class="text" value="" name="email" placeholder="email" /></td>
			</tr>			
			<tr>
				<td><?php echo $lang['test_data']; ?>：</td>
				<td colspan="2"><label class="checkbox-inline"><input type="checkbox" value="1" name="add_test" /><?php echo $lang['test_data_intro']; ?></label></td>
			</tr>			
		</table>
		<div class="action"><a href="javascript:history.go(-1);" class="btn_blue"><?php echo $lang['previous'];?></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="btn_blue" onclick="postData()"><?php echo $lang['next'];?></a></div>
		</form>
	</div>
	<?php require 'tpl/footer.php';?>
<script type="text/javascript">
function postData() {
	var _postForm = $('form').serialize();
	$.ajax({
		url: 'index.php?step=3',
		type: 'POST',
		dataType: 'json',
		data: _postForm,
	})
	.done(function(data) {
		if(data.status == 'error') {
			layer.alert(data.info, {icon: 2});
			return false;
		} else {
			window.location.href = 'index.php?step=4';
		}
	})
	.fail(function() {
		console.log("error");
		layer.alert('发生错误，请重试', {icon: 2});
	});
	

}
</script>
</body>
</html>