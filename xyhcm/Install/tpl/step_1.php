<?php if (!defined('XYHCMS_INSTALL')) exit('Access Denied!')?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $lang['install_license'];?>-<?php echo $lang['install_title'];?></title>
<script type="text/javascript" src="../Data/static/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../Data/static/jq_plugins/layer/layer.js"></script>
<script type="text/javascript">
	$(function(){
		if (!$.support.leadingWhitespace) {
            layer.alert('XYHCMS安装程序和后台不再保障IE8及以下浏览器的正常访问。建议您尽快升级浏览器IE9+，或者使用Chrome、Firefox。', {icon: 2});
        }
	});
</script>
<link rel="stylesheet" href="css/global.css" type="text/css" />
</head>
<body>	
	<?php require 'tpl/header.php';?>
	<div class="xyh-main">
		<div class="license">
		<?php echo format_textarea($license)?>			
		</div>
		<div class="action"><a href="index.php?step=2" class="btn_blue"><?php echo $lang['agree_and_accept'];?></a></div>
	</div>
	<?php require 'tpl/footer.php';?>
</body>
</html>