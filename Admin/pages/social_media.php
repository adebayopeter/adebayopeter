<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once('../../inc/config.php');

// Include MySQL class
require_once(ROOT_PATH . "inc/mysql.class.php");
// Include database connection
require_once(ROOT_PATH . "inc/database_convar.php");

session_start();

if (!isset($_SESSION['usercode'])) {
    $loginpage = BASE_URL . 'Admin/login.php';
    header('Location: ' . $loginpage);
}
else {
  $now = time(); // Checking the time now when home page starts.

  if ($now > $_SESSION['expire']) {
      session_destroy();
      $loginpage = BASE_URL . 'Admin/login.php';
      header('Location: ' . $loginpage);
  }
  else {

  $section_head = 'social media';
  $section = 'social media';
  $page_title = 'Social Media';      
  }
}  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Fashion Admin | <?php echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo BASE_URL; ?>Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo BASE_URL; ?>Admin/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Header section -->
      <?php include(ROOT_PATH . 'Admin/inc/view/header.php'); ?>

      <!-- Left side column. contains the logo and sidebar -->
      <?php include(ROOT_PATH . 'Admin/inc/view/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include(ROOT_PATH . 'Admin/inc/view/page_header.php'); ?>

        <!-- Call in the functions.php file -->
        <?php include(ROOT_PATH . 'Admin/inc/model/functions.php'); ?>        

<?php
  // Get Social Media URL
  $facebook = getFacebookURL();
  $twitter = getTwitterURL();
  $youtube = getYouTubeURL();
  $instagram = getInstagramURL();

  // Update Social Media URL
  if (isset($_POST['bSubmit'])) {
    $fb = trim($_POST['txtFacebook']);
    $facebook2 = mysql_real_escape_string($fb);
    $tw = trim($_POST['txtTwitter']);
    $twitter2 = mysql_real_escape_string($tw);
    $yt = trim($_POST['txtYouTube']);
    $youtube2 = mysql_real_escape_string($yt);
    $in = trim($_POST['txtInstagram']);
    $instagram2 = mysql_real_escape_string($in);

    $title = mysql_real_escape_string($title2);
    $description2 = trim($_POST['txtDescription']);
    $description = mysql_real_escape_string($description2);
    
    // UPDATE social media
    $sql3 = "UPDATE social_media_tbl SET url = '$facebook2' WHERE social_media = 'Facebook' AND id = '1'";
    $inserturl = $db->query($sql3);

    $sql4 = "UPDATE social_media_tbl SET url = '$twitter2' WHERE social_media = 'Twitter' AND id = '2'";
    $inserturl = $db->query($sql4);

    $sql5 = "UPDATE social_media_tbl SET url = '$youtube2' WHERE social_media = 'YouTube' AND id = '3'";
    $inserturl = $db->query($sql5);

    $sql6 = "UPDATE social_media_tbl SET url = '$instagram2' WHERE social_media = 'Instagram' AND id = '4'";
    $inserturl = $db->query($sql6);    

    $msg .= "Social Media URL has been Updated!<br>";

    // Get Social Media URL
    $facebook = getFacebookURL();
    $twitter = getTwitterURL();
    $youtube = getYouTubeURL();
    $instagram = getInstagramURL();    
  } 
?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="box-body">
                    <?php if ($msg) { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>                    
                    <div class="form-group">
                      <label for="facebook" class="col-sm-2">Facebook</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtFacebook" value="<?php echo $facebook; ?>" class="form-control" id="facebook" />
                        <p class="help-block"><i class="fa fa-fw fa-facebook-official"></i> Facebook URL</p>
                      </div>
                    </div>                    
                    <div class="form-group">
                      <label for="twitter" class="col-sm-2">Tiwtter</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtTwitter" value="<?php echo $twitter; ?>" class="form-control" id="twitter" />
                        <p class="help-block"><i class="fa fa-fw fa-twitter"></i> Twitter URL</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="youtube" class="col-sm-2">Youtube</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtYouTube" value="<?php echo $youtube; ?>" class="form-control" id="youtube" />
                        <p class="help-block"><i class="fa fa-fw fa-youtube-square"></i> Youtube URL</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="instagram" class="col-sm-2">Instagram</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtInstagram" value="<?php echo $instagram; ?>" class="form-control" id="instagram" />
                        <p class="help-block"><i class="fa fa-fw fa-instagram"></i> Instagram URL</p>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="bSubmit" class="btn btn-primary" value="Submit">
                  </div>
              </div><!-- /.box -->


            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->     

      <?php include(ROOT_PATH . 'Admin/inc/view/footer.php'); ?>

      <!-- Control Sidebar -->
      <?php include(ROOT_PATH . 'Admin/inc/view/control_sidebar.php'); ?>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo BASE_URL; ?>Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
