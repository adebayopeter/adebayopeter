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
    <style type="text/css">
      textarea {
        text-align:left !important;
      }
    </style>
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
      $sql4 = "SELECT title FROM blog_category_tbl WHERE title = '$title'";
      $selectnewcategory = $db->query($sql4);
      $rw4 = $selectnewcategory->fetch();

      // if it does not exit insert else throw error msg
      if(empty($rw4['title'])) {
        $sql3 = "INSERT INTO blog_category_tbl (title,description) VALUES ('$title','$description')";
        $insertrecord = $db->query($sql3);
        $msg .= "Record Inserted";
      }
      else {
        $msg .= "Category already exit !!!";
      }
    }
  }
?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
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
                      <label for="inputTitle">Title</label>
                      <input type="text" name="txtTitle" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputTitle" placeholder="Enter Title Here..." />
                    </div>
                    <div class="form-group">
                      <label for="inputTextarea">Description</label>
                      <textarea name="txtDescription" class="form-control" rows="3" id="inputTextarea" placeholder="Description ...">
                        <?php if(!empty($description)) echo $description; ?>
                      </textarea>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="submit" value="Add New Category" class="btn btn-primary" />
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-8">
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">View All Categories</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" />
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Count</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    <?php
                      // Retrieve the blog category
                      $sql2 = "SELECT * FROM blog_category_tbl ORDER BY title ASC";
                      $selectcategory = $db->query($sql2);
                      while ($rw2 = $selectcategory->fetch()) { 
                        $category_title = $rw2['title'];
                      $sqlcount = "SELECT count(id) AS 'category_count' FROM blog_tbl WHERE category = '$category_title'";
                      $selectcount = $db->query($sqlcount);
                      $rwcount = $selectcount->fetch();
                    ?>
                    <tr>
                      <td><?php echo $rw2['title']; ?></td>
                      <td><?php echo $rw2['description']; ?></td>
                      <td>
                        <?php
                          if (empty($rwcount['category_count'])) {
                            echo 0;
                          } else {
                            echo $rwcount['category_count']; 
                          }
                        ?>
                      </td>
                      <?php if ($rw2['title'] == 'Uncategorized') { ?>
                      <td></td>
                      <td></td>
                      <?php } else { ?>
                      <td><a href="<?php echo BASE_URL; ?>Admin/pages/blog/editcategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>">
                        <span class="glyphicon glyphicon-edit"></span></a></td>
                      <td><a href="<?php echo BASE_URL; ?>Admin/pages/blog/deletecategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>">
                        <span class="glyphicon glyphicon-trash"></span></a></td>
                      <?php } ?>
                    </tr>
                    <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->            

            </div><!--/.col (right) -->
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