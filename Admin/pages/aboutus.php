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

  $section_head = 'about us';
  $section = 'about us';
  $page_title = 'About Us';
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

    <!-- link to upload image resources start -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>Admin/file_upload/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>Admin/file_upload/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/file_upload/js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/file_upload/js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- link to upload image resources end -->  

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
  // Submit code
  if (isset($_POST['bSubmit'])) {
    $title2 = trim($_POST['txtTitle']);
    $title = mysql_real_escape_string($title2);
    $description2 = trim($_POST['txtDescription']);
    $description = mysql_real_escape_string($description2);

    if ($description==""){
      $msg .= "Fields are empty!";
    } 
    elseif ($description==""){
      $msg .= "A Field is empty!";
    }
    if (!empty($_FILES['imagefile']['name'])) {

      $orignalfile = $_FILES['imagefile']['name'];   
      $imagefile = time() . str_replace(" ","_",$orignalfile);
      $imagefile_type = $_FILES['imagefile']['type'];
      $imagefile_size = $_FILES['imagefile']['size'];

      if ((($imagefile_type == 'image/gif') || ($imagefile_type == 'image/jpeg') || ($imagefile_type == 'image/pjpeg') || 
        ($imagefile_type == 'image/png')) && ($imagefile_size > 0) && ($imagefile_size <= DOC_MAXFILESIZE)) {
        if ($_FILES['imagefile']['error'] == 0) {
          // Move the file to the target upload folder
          $target = ROOT_PATH . DOC_UPLOADPATH_ABOUT_US_480_320 . $imagefile;
          $target_thumb = ROOT_PATH . DOC_UPLOADPATH_ABOUT_US_480_320 . '480_320_' . $imagefile;
          $width_480 = '480';
          $height_320 = '320';
          $img = '480_320_' . $imagefile;

          if (move_uploaded_file($_FILES['imagefile']['tmp_name'], $target)){
            
            // create image dimension for 480 x 320
            create_image_dimenion($target, $width_480, $height_320, $target_thumb);

            // write data to database
            $sql5 = "UPDATE site_profile_tbl SET description = '$description',image = '$img' WHERE id = '1'";
            $updaterecord = $db->query($sql5);
            $msg .= "Record Updated";             
          }
        }
        else{
          $msg .= "Sorry, there was a problem uploading your image.<br>";
        }
      }           
    }
    else {
      // update data to database when no image was updated
      $sql5 = "UPDATE site_profile_tbl SET description = '$description' WHERE id = '1'";
      $updaterecord = $db->query($sql5);
      $msg .= "Record Updated";       
    }
  // Try to delete the temporary document file
  @unlink($_FILES['imagefile']['tmp_name']);

    if ($_FILES['imagefile']['size'] < 0) {
      $msg .= 'No image uploaded';
    }
  }

  // Get data from table
  $sql7 = "SELECT * FROM site_profile_tbl WHERE id = '1'";
  $selectdata = $db->query($sql7);
  $rw7 = $selectdata->fetch();
  $title = $rw7['title'];
  $description = $rw7['description'];
  $img = $rw7['image'];
?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-9">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->               
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> <!-- first form begins here -->
                  <div class="box-body">
                    <?php if ($msg) { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>                     
                    <div class="form-group">
                      <label for="inputTitle">Title</label>
                      <input type="text" name="txtTitle" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputTitle" disabled />
                    </div>
                    <div class="form-group">
                      <img src="<?php echo BASE_URL; ?>images/<?php echo $img; ?>" width="150px" style="border:1px solid #3c8dbc" />
                    </div>                    
                    <div class="form-group">
                      <label for="inputTextarea">Description</label>
                      <textarea class="form-control" name="txtDescription" rows="3" id="inputTextarea" placeholder="Description ..."><?php if(!empty($description)) echo $description; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="file-0">Image Upload</label>
                      <input id="file-0" class="file" name="imagefile" type="file" multiple>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="bSubmit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;">
                  </div>
                <!-- </form> -->
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

    <!-- Upload Images Script starts-->
    <script type="text/javascript">
      $("#file-0").fileinput({
        showUpload: false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
      });
    </script>
    <!-- Upload Images Script end -->

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
