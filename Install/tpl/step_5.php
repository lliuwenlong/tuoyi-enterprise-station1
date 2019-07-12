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
</head>
<body>
	<?php require 'tpl/header.php';?>
	<div class="xyh-main">
		<div class="complete">
				<p style="font-size:20px; font-weight:bold; color:#FF3300"><?php echo $lang['congratulations_installation_success'];?></p>
				<p><a href="../" target="_blank"  class="btn_blue"><?php echo $lang['visit_home'];?></a><a href="../xyhai.php" target="_blank" class="btn_blue"><?php echo $lang['enter_admin'];?></a></p>
				<p><?php echo $lang['safe_notes'];?></p>
		
		</div>
	</div>
	<?php require 'tpl/footer.php';?>
</body>
</html>