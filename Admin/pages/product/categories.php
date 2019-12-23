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

  $section_head = 'product';
  $section = 'category products';
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
  
  // Adding Section
  if (isset($_POST['bSection'])) {
    $title = trim($_POST['txtTitle']);
    $description2 = trim($_POST['txtDescription']);
    $description = mysql_real_escape_string($description2);

    if ($title=="" && $description==""){
      $msg .= "Fields are empty!";
    } 
    elseif ($title=="" || $description==""){
      $msg .= "A Field is empty!";
    } 
    else { 
      // check if the checkbox category already existed
      $sql4 = "SELECT title FROM section_tbl WHERE title = '$title'";
      $selectnewcategory = $db->query($sql4);
      $rw4 = $selectnewcategory->fetch();

      // if it does not exit insert else throw error msg
      if(empty($rw4['title'])) {
        $sql3 = "INSERT INTO section_tbl (title,description) VALUES ('$title','$description')";
        $insertrecord = $db->query($sql3);
        $msg .= "Section Inserted";
      }
      else {
        $msg .= "Section already exit !!!";
      }
    }
  } // End of Inserting Section

  // Adding Category
  if (isset($_POST['bCategory'])) {
    $title = trim($_POST['txtTitle']);
    $description2 = trim($_POST['txtDescription']);
    $description = mysql_real_escape_string($description2);

    if ($title=="" && $description==""){
      $msg2 .= "Fields are empty!";
    } 
    elseif ($title=="" || $description==""){
      $msg2 .= "A Field is empty!";
    } 
    else { 
      // check if the checkbox category already existed
      $sql4 = "SELECT title FROM category_tbl WHERE title = '$title'";
      $selectnewcategory = $db->query($sql4);
      $rw4 = $selectnewcategory->fetch();

      // if it does not exit insert else throw error msg
      if(empty($rw4['title'])) {
        $sql3 = "INSERT INTO category_tbl (title,description) VALUES ('$title','$description')";
        $insertrecord = $db->query($sql3);
        $msg2 .= "Category Inserted";
      }
      else {
        $msg2 .= "Category already exit !!!";
      }
    }
  } // End of Inserting Category

  // Adding Brand
  if (isset($_POST['bBrand'])) {
    $title = trim($_POST['txtTitle']);
    $description2 = trim($_POST['txtDescription']);
    $description = mysql_real_escape_string($description2);

    if ($title=="" && $description==""){
      $msg3 .= "Fields are empty!";
    } 
    elseif ($title=="" || $description==""){
      $msg3 .= "A Field is empty!";
    } 
    else { 
      // check if the checkbox brand already existed
      $sql4 = "SELECT title FROM brand_tbl WHERE title = '$title'";
      $selectnewcategory = $db->query($sql4);
      $rw4 = $selectnewcategory->fetch();

      // if it does not exit insert else throw error msg
      if(empty($rw4['title'])) {
        $sql3 = "INSERT INTO brand_tbl (title,description) VALUES ('$title','$description')";
        $insertrecord = $db->query($sql3);
        $msg3 .= "Brand Inserted";
      }
      else {
        $msg3 .= "Brand already exit !!!";
      }
    }
  } // End of Inserting Category   
?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <div class="panel-heading">
                  <!-- <h4>Panels</h4> -->
                  <div class="options">
                    <ul class="nav nav-tabs">
                      <li class="<?php if(!isset($_POST['bCategory']) && !isset($_POST['bBrand'])) { echo 'active'; } ?>"><a href="#firstpanel" data-toggle="tab"><i class="fa fa-desktop"></i> Section</a></li>
                      <li class="<?php if(isset($_POST['bCategory'])) { echo 'active'; } ?>"><a href="#secondpanel" data-toggle="tab"><i class="fa fa-desktop"></i> Category</a></li>
                      <li class="<?php if(isset($_POST['bBrand'])) { echo 'active'; } ?>"><a href="#thirdpanel" data-toggle="tab"><i class="fa fa-desktop"></i> Brand</a></li>
                    </ul>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="tab-content">
                    <!-- #1 first panel begins -->
                    <div class="tab-pane <?php if(!isset($_POST['bCategory']) && !isset($_POST['bBrand'])) { echo 'active'; } ?>" id="firstpanel">                    
                      <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                          <!-- general form elements -->
                          <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><?php echo 'Add New Section'; ?></h3>
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
                                  <label for="inputSection">Title</label>
                                  <input type="text" name="txtTitle" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputSection" placeholder="Enter Title Here..." />
                                </div>
                                <div class="form-group">
                                  <label for="inputSectionTextarea">Description</label>
                                  <textarea name="txtDescription" class="form-control" rows="3" id="inputSectionTextarea" placeholder="Description ..."><?php if(!empty($description)) echo $description; ?></textarea>
                                </div>
                              </div><!-- /.box-body -->
                              <div class="box-footer">
                                <input type="submit" name="bSection" value="Add New Section" class="btn btn-primary" />
                              </div>
                            </form>
                          </div><!-- /.box -->

                        </div><!--/.col (left) -->

                        <!-- right column -->
                        <div class="col-md-8">
                          <!-- general form elements disabled -->
                          <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">View All Section</h3>
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
                                  // Retrieve the product category
                                  $sql2 = "SELECT * FROM section_tbl ORDER BY title ASC";
                                  $selectsection = $db->query($sql2);
                                  while ($rw2 = $selectsection->fetch()) { 
                                    $section_title = $rw2['title'];
                                  $sqlcount = "SELECT count(id) AS 'section_count' FROM product_tbl WHERE section = '$section_title'";
                                  $selectcount = $db->query($sqlcount);
                                  $rwcount = $selectcount->fetch();
                                ?>
                                <tr>
                                  <td><?php echo $rw2['title']; ?></td>
                                  <td><?php echo $rw2['description']; ?></td>
                                  <td>
                                    <?php
                                      if (empty($rwcount['section_count'])) {
                                        echo 0;
                                      } else {
                                        echo $rwcount['section_count']; 
                                      }
                                    ?>
                                  </td>
                                  <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/editcategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>&skt=<?php echo 'section'; ?>">
                                    <span class="glyphicon glyphicon-edit"></span></a></td>
                                  <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/deletecategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>&skt=<?php echo 'section'; ?>">
                                    <span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                                <?php } ?>
                              </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->            

                        </div><!--/.col (right) -->
                      </div>   <!-- /.row -->
                    </div>
                    <!-- first panel ends -->

                    <!-- #2 second panel begins -->
                    <div class="tab-pane <?php if(isset($_POST['bCategory'])) { echo 'active'; } ?>" id="secondpanel">                    
                      <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                          <!-- general form elements -->
                          <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><?php echo 'Add New Categories'; ?></h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <div class="box-body">
                                <?php if ($msg2) { ?>
                                <div class="alert alert-info alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-info"></i> Alert!</h4>
                                    <?php echo $msg2; ?>
                                </div>
                                <?php } ?>                                 
                                <div class="form-group">
                                  <label for="inputCategory">Title</label>
                                  <input type="text" name="txtTitle" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputCategory" placeholder="Enter Title Here..." />
                                </div>
                                <div class="form-group">
                                  <label for="inputCategoryTextarea">Description</label>
                                  <textarea name="txtDescription" class="form-control" rows="3" id="inputCategoryTextarea" placeholder="Description ..."><?php if(!empty($description)) echo $description; ?></textarea>
                                </div>
                              </div><!-- /.box-body -->

                              <div class="box-footer">
                                <input type="submit" name="bCategory" value="Add New Category" class="btn btn-primary" />
                              </div>
                            </form>
                          </div><!-- /.box -->

                        </div><!--/.col (left) -->

                        <!-- right column -->
                        <div class="col-md-8">
                          <!-- general form elements disabled -->
                          <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">View All Categories Product</h3>
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
                                  // Retrieve the product category
                                  $sql2 = "SELECT * FROM category_tbl ORDER BY title ASC";
                                  $selectcategory = $db->query($sql2);
                                  while ($rw2 = $selectcategory->fetch()) { 
                                    $category_title = $rw2['title'];
                                  $sqlcount = "SELECT count(id) AS 'category_count' FROM product_tbl WHERE category = '$category_title'";
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
                                  <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/editcategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>&skt=<?php echo 'category'; ?>">
                                    <span class="glyphicon glyphicon-edit"></span></a></td>
                                  <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/deletecategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>&skt=<?php echo 'category'; ?>">
                                    <span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                                <?php } ?>
                              </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->            

                        </div><!--/.col (right) -->
                      </div>   <!-- /.row -->
                    </div>
                    <!-- second panel ends -->

                    <!-- #2 third panel begins -->
                    <div class="tab-pane <?php if(isset($_POST['bBrand'])) { echo 'active'; } ?>" id="thirdpanel">                    
                      <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                          <!-- general form elements -->
                          <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><?php echo 'Add New Brand'; ?></h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <div class="box-body">
                                <div class="form-group">
                                  <label for="inputBrand">Title</label>
                                  <input type="text" name="txtTitle" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputBrand" placeholder="Enter Title Here..." />
                                </div>
                                <div class="form-group">
                                  <label for="inputBrandTextarea">Description</label>
                                  <textarea name="txtDescription" class="form-control" rows="3" id="inputBrandTextarea" placeholder="Description ..."><?php if(!empty($description)) echo $description; ?></textarea>
                                </div>
                              </div><!-- /.box-body -->

                              <div class="box-footer">
                                <input type="submit" name="bBrand" value="Add New Brand" class="btn btn-primary" />
                              </div>
                            </form>
                          </div><!-- /.box -->

                        </div><!--/.col (left) -->

                        <!-- right column -->
                        <div class="col-md-8">
                          <!-- general form elements disabled -->
                          <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">View All Product Brand</h3>
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
                                  // Retrieve the product brand
                                  $sql2 = "SELECT * FROM brand_tbl ORDER BY title ASC";
                                  $selectbrand = $db->query($sql2);
                                  while ($rw2 = $selectbrand->fetch()) { 
                                    $brand_title = $rw2['title'];
                                  $sqlcount = "SELECT count(id) AS 'brand_count' FROM product_tbl WHERE brand = '$brand_title'";
                                  $selectcount = $db->query($sqlcount);
                                  $rwcount = $selectcount->fetch();
                                ?>
                                <tr>
                                  <td><?php echo $rw2['title']; ?></td>
                                  <td><?php echo $rw2['description']; ?></td>
                                  <td>
                                    <?php
                                      if (empty($rwcount['brand_count'])) {
                                        echo 0;
                                      } else {
                                        echo $rwcount['brand_count']; 
                                      }
                                    ?>
                                  </td>
                                  <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/editcategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>&skt=<?php echo 'brand'; ?>">
                                    <span class="glyphicon glyphicon-edit"></span></a></td>
                                  <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/deletecategory.php?ikd=<?php echo $rw2['id']; ?>&tk=<?php echo $rw2['title']; ?>&skt=<?php echo 'brand'; ?>">
                                    <span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                                <?php } ?>
                              </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->            

                        </div><!--/.col (right) -->
                      </div>   <!-- /.row -->
                    </div>
                    <!-- third panel ends -->                                    
                  </div><!-- end tab-content -->
              </div><!-- end panel -->
            </div><!-- end column -->
          </div><!-- end row -->
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