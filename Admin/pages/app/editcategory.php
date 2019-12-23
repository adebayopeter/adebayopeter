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

  $section_head = 'blog';
  $section = 'categories';
  $page_title = 'Add New Categories';       
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
    <link href="<?php echo BASE_URL; ?>Admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>css/bstyle.css" rel="stylesheet" type="text/css" />

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

<?php
  if (isset($_GET['ikd']) && isset($_GET['tk'])) {
    $title_id = $_GET['ikd'];
    $title_name = $_GET['tk'];

    if (isset($_POST['submit'])) {
      $title = trim($_POST['txtTitle']);
      $description = trim($_POST['txtDescription']);

      if ($title=="" && $description==""){
        $msg .= "Fields are empty!";
      } 
      elseif ($title=="" || $description==""){
        $msg .= "A Field is empty!";
      } 
      else { 
        // check if the checkbox category already existed
        $sql4 = "SELECT count(id) AS 'num_of_title' FROM blog_category_tbl WHERE title = '$title' AND id != '$title_id'";
        $selectnewcategory = $db->query($sql4);
        $rw4 = $selectnewcategory->fetch();

        // if it does not exit insert else throw error msg
        if($rw4['num_of_title'] == 1) {
         $msg .= "Category already exit !!!";
        }
        else {
          $sql3 = "UPDATE blog_category_tbl SET title = '$title', description = '$description' WHERE id = '$title_id' AND title = '$title_name'";
          $updatecategory = $db->query($sql3);
          $msg .= "Record Updated!";           
        }
      }
      // Get / Output current category after updating....
      $sql5 = "SELECT * FROM blog_category_tbl WHERE id = '$title_id' AND title = '$title_name'";
      $selectcategory = $db->query($sql5);
      $rw5 = $selectcategory->fetch();

      $title2 = $rw5['title'];
      $description2 = $rw5['description'];

    } // end of $_POST['submit']
    else {
      $sql5 = "SELECT * FROM blog_category_tbl WHERE id = '$title_id' AND title = '$title_name'";
      $selectcategory = $db->query($sql5);
      $rw5 = $selectcategory->fetch();

      $title2 = $rw5['title'];
      $description2 = $rw5['description'];
    }
  } // End isset($_GET['ikd']) && isset($_GET['tk'])
  else {
    $msg .= 'Please Log to view page!!!';
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
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?ikd=<?php echo $title_id; ?>&tk=<?php echo $title_name; ?>">
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
                      <input type="text" name="txtTitle" value="<?php if(!empty($title2)) echo $title2; ?>" class="form-control" id="inputTitle" placeholder="Enter Title Here..." />
                    </div>
                    <div class="form-group">
                      <label for="inputTextarea">Description</label>
                      <textarea name="txtDescription" class="form-control" rows="3" id="inputTextarea" placeholder="Description ...">
                        <?php if(!empty($description2)) echo $description2; ?>
                      </textarea>                      
                    </div>
                    <!--
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                    -->
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="submit" value="Add New Category" class="btn btn-primary" />
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col end -->

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
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>    
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>