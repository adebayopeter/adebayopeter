<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once('../../../inc/config.php');

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

  $section_head = 'edit user';
  $section = 'edit user';
  $page_title = 'Edit User';      
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
  // Update Social Media URL
if (isset($_GET['sdk']) && isset($_GET['usd'])) {
  $user_id = $_GET['sdk'];
  $user_usercode = $_GET['usd'];

  if (isset($_POST['bUpdate'])) {
    $username1 = trim($_POST['txtUsername']);
    $firstname1 = trim($_POST['txtFirstName']);
    $lastname1 = trim($_POST['txtLastName']);
    $occupation1 = trim($_POST['txtOccupation']);
    $password1 = trim($_POST['txtPassword1']);
    $password2 = trim($_POST['txtPassword2']);

    if ($username1=="" && $firstname1=="" && $lastname1=="" && $occupation1==""){
      $msg .= "Fields are empty!<br>";
    } 
    elseif ($username1=="" || $firstname1=="" || $lastname1=="" || $occupation1==""){
      $msg .= "A Field is empty!<br>";
    } 
    elseif (!empty($password1)) {
      if ($password1 == $password2) {
        $sqlUpdate = "UPDATE users_tbl SET username='$username1',password='" . hash("sha256", $password1) . "'," . 
        "firstname='$firstname1',lastname='$lastname1',occupation='$occupation1' WHERE id='$user_id' AND usercode='$user_usercode'";
        $updateUser = $db->query($sqlUpdate);
        $msg .= "Password and Users Profile has been Updated!!!";
      }
      else {
        $msg .= "Password must be same!!!<br>Users Profile was NOT updated!!!";
      }      
    }
    elseif (!empty($_FILES['imagefile']['name'])) { // Updating images

      $orignalfile = $_FILES['imagefile']['name'];   
      $imagefile = time() . str_replace(" ","_",$orignalfile);
      $imagefile_type = $_FILES['imagefile']['type'];
      $imagefile_size = $_FILES['imagefile']['size'];

      if ((($imagefile_type == 'image/gif') || ($imagefile_type == 'image/jpeg') || ($imagefile_type == 'image/pjpeg') || 
        ($imagefile_type == 'image/png')) && ($imagefile_size > 0) && ($imagefile_size <= DOC_MAXFILESIZE)) {
        if ($_FILES['imagefile']['error'] == 0) {
          // Move the file to the target upload folder
          $target = ROOT_PATH . DOC_UPLOADPATH_USER . $imagefile;
          $target_thumb_160 = ROOT_PATH . DOC_UPLOADPATH_USER_160_160 . $imagefile;
          $width_160 = '160';
          $height_160 = '160';

          if (move_uploaded_file($_FILES['imagefile']['tmp_name'], $target)){
            
            // create image dimension for 160 x 160
            create_image_dimenion($target, $width_160, $height_160, $target_thumb_160);

            // update record
            $sqlUpdate = "UPDATE users_tbl SET username='$username1',firstname='$firstname1',lastname='$lastname1',image='$imagefile', " . 
            "occupation='$occupation1' WHERE id='$user_id' AND usercode='$user_usercode'";
            $updateUser = $db->query($sqlUpdate);
            $msg .= "Users Profile has been Updated!!!";            
          }
        }
        else{
          $msg .= "Sorry, there was a problem uploading your image.<br>";
        }
      }
      // Try to delete the temporary document file
      @unlink($_FILES['imagefile']['tmp_name']);
    }
    else {
      $sqlUpdate = "UPDATE users_tbl SET username='$username1',firstname='$firstname1',lastname='$lastname1',occupation='$occupation1' " . 
      "WHERE id='$user_id' AND usercode='$user_usercode'";
      $updateUser = $db->query($sqlUpdate);
      $msg .= "Users Profile has been Updated!!!";
    } 
  }

  // Get Users Details
  $user_profile = getUsersDetails($user_id, $user_usercode);
  $username_p = $user_profile['username'];
  $firstname_p = $user_profile['firstname'];
  $lastname_p = $user_profile['lastname'];
  $occupation_p = $user_profile['occupation'];
  $rolecategory_p = $user_profile['rolecategory']; 
  $image_p = $user_profile['image'];

} else {
  $msg .= "Please log to view this page!!!";
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
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?sdk=<?php echo $user_id . '&usd=' . $user_usercode; ?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <?php if ($msg) { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                      <label for="file-0" class="col-sm-2">Image Upload</label>
                      <div class="col-sm-10">
                        <?php if (!empty($image_p)) { ?>
                          <p><img src="<?php echo BASE_URL; ?>Admin/dist/img/user/<?php echo $image_p; ?>" width="100" style="border:2px solid #3C8DBC;" /></p>
                        <?php } ?>
                        <input id="file-0" class="file" name="imagefile" type="file" multiple data-max-file-count="1">
                        <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-2">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtUsername" value="<?php echo $username_p; ?>" class="form-control" id="username" placeholder="Username" />
                        <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password1" class="col-sm-2">New Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="txtPassword1" class="form-control" id="password1" placeholder="New Password" />
                        <p class="help-block"><i class="fa fa-lock"></i> 
                          Password : If you would like to change the password type a new one. Otherwise leave this blank.</p>                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password2" class="col-sm-2">Re-Type Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="txtPassword2" class="form-control" id="password2" placeholder="Re-Type New Password" />
                        <p class="help-block"><i class="fa fa-lock"></i> 
                          Password : If you would like to change the password re-type the new one. Otherwise leave this blank.</p> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fname" class="col-sm-2">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtFirstName" value="<?php echo $firstname_p; ?>" class="form-control" id="fname" />
                        <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lastname" class="col-sm-2">Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtLastName" value="<?php echo $lastname_p; ?>" class="form-control" id="lastname" />
                        <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="job" class="col-sm-2">Occupation</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtOccupation" value="<?php echo $occupation_p; ?>" class="form-control" id="job" />
                        <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="role" class="col-sm-2">Role Category</label>
                      <div class="col-sm-10">
                        <input type="text" name="txtRoleCategory" value="<?php echo $rolecategory_p; ?>" class="form-control" id="role" disabled />
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="bUpdate" class="btn btn-primary" value="Update">
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
