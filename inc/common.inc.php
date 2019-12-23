<?php
	require_once("config.php");
	require_once("User.class.php");
	require_once("SitesProfile.class.php");
    require_once("Category.class.php");

	// check if Admin is logged in, call func on every page in aAdmin section's area
	function checkLogin() {
		session_start();
		if (!$_SESSION["user"] || !$_SESSION["user"] = User::getUser($_SESSION["user"]->getValue("id"))) {
			$_SESSION["user"] = "";
			header("Location: ". BASE_URL . "Admin/login.php");
			exit;
		}
	}

	function displayPageHeader($pageTitle, $sitesArea = false) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Adebayo Peter | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo BASE_URL; ?>Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo BASE_URL; ?>Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo BASE_URL; ?>Admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo BASE_URL; ?>Admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo BASE_URL; ?>Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- Favicon Begins -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>img/ico/32.png" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo BASE_URL; ?>img/ico/60.png" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo BASE_URL; ?>img/ico/72.png" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo BASE_URL; ?>img/ico/120.png" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo BASE_URL; ?>img/ico/152.png" type="image/png"/> 
    <!-- Favicon Ends -->     

    <!-- <script src="<?php echo BASE_URL; ?>Admin/plugins/ckeditor/ckeditor.js"></script> -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/ckeditor_standard/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<?php
}

function validateField ($fieldName, $missingFields) {
	if (in_array($fieldName, $missingFields)) {
		echo ' class="error"';
	}
}

function setChecked(DataObject $obj, $fieldName, $fieldValue) {
	if ($obj->getValue($fieldName) == $fieldValue) {
		echo ' checked="checked"';
	}
}

function displayPageFooter() {
?>
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
	  	<b>Version</b> 2.2.0
		</div>
		<strong>Copyright &copy; 2014-2015 <a href="http://adebayopeter.com">Adebayo Peter Olaonipekun</a>.</strong> All rights reserved.
	</footer>
	</div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo BASE_URL; ?>Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo BASE_URL; ?>Admin/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/pages/dashboard.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
<?php
	}
?>