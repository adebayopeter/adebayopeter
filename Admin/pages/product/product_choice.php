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
    $section = 'product choice';
    $page_title = 'Product Choice';       
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
  
  // Updating Bestseller
  if (isset($_POST['bBestseller'])) {
    $drpBestseller1 = trim($_POST['drpBestseller1']);
    $drpBestseller2 = trim($_POST['drpBestseller2']);
    $drpBestseller3 = trim($_POST['drpBestseller3']);
    $drpBestseller4 = trim($_POST['drpBestseller4']);
    $drpBestseller5 = trim($_POST['drpBestseller5']);
    $drpBestseller6 = trim($_POST['drpBestseller6']);
    $drpBestseller7 = trim($_POST['drpBestseller7']);
    $drpBestseller8 = trim($_POST['drpBestseller8']);

    if ($drpBestseller1=="" && $drpBestseller2=="" && $drpBestseller3=="" && $drpBestseller4=="" && 
      $drpBestseller5=="" && $drpBestseller6=="" && $drpBestseller7=="" && $drpBestseller8==""){
      $msg .= "Fields are empty!";
    } 
    elseif ($drpBestseller1=="" || $drpBestseller2=="" || $drpBestseller3=="" || $drpBestseller4=="" || 
      $drpBestseller5=="" || $drpBestseller6=="" || $drpBestseller7=="" || $drpBestseller8==""){
      $msg .= "A Field is empty!";
    } 
    else { 
        // Update Record
        $sql11 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller1' WHERE id = '1'";
        $update11 = $db->query($sql11);

        $sql12 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller2' WHERE id = '2'";
        $update12 = $db->query($sql12);

        $sql13 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller3' WHERE id = '3'";
        $update13 = $db->query($sql13);

        $sql14 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller4' WHERE id = '4'";
        $update14 = $db->query($sql14);

        $sql15 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller5' WHERE id = '5'";
        $update15 = $db->query($sql15);

        $sql16 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller6' WHERE id = '6'";
        $update16 = $db->query($sql16);

        $sql17 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller7' WHERE id = '7'";
        $update17 = $db->query($sql17);

        $sql18 = "UPDATE product_choice_tbl SET bestseller = '$drpBestseller8' WHERE id = '8'";
        $update18 = $db->query($sql18);

        $msg .= "Record Updated Inserted";
    }
  } // End of Updating Bestseller

  // Updating Popular
  if (isset($_POST['bPopular'])) {
    $drpPopular1 = trim($_POST['drpPopular1']);
    $drpPopular2 = trim($_POST['drpPopular2']);
    $drpPopular3 = trim($_POST['drpPopular3']);
    $drpPopular4 = trim($_POST['drpPopular4']);
    $drpPopular5 = trim($_POST['drpPopular5']);
    $drpPopular6 = trim($_POST['drpPopular6']);
    $drpPopular7 = trim($_POST['drpPopular7']);
    $drpPopular8 = trim($_POST['drpPopular8']);

    if ($drpPopular1=="" && $drpPopular2=="" && $drpPopular3=="" && $drpPopular4=="" && 
      $drpPopular5=="" && $drpPopular6=="" && $drpPopular7=="" && $drpPopular8==""){
      $msg2 .= "Fields are empty!";
    } 
    elseif ($drpPopular1=="" || $drpPopular2=="" || $drpPopular3=="" || $drpPopular4=="" || 
      $drpPopular5=="" || $drpPopular6=="" || $drpPopular7=="" || $drpPopular8==""){
      $msg2 .= "A Field is empty!";
    } 
    else { 
        // Update Record
        $sql11 = "UPDATE product_choice_tbl SET popular = '$drpPopular1' WHERE id = '1'";
        $update11 = $db->query($sql11);

        $sql12 = "UPDATE product_choice_tbl SET popular = '$drpPopular2' WHERE id = '2'";
        $update12 = $db->query($sql12);

        $sql13 = "UPDATE product_choice_tbl SET popular = '$drpPopular3' WHERE id = '3'";
        $update13 = $db->query($sql13);

        $sql14 = "UPDATE product_choice_tbl SET popular = '$drpPopular4' WHERE id = '4'";
        $update14 = $db->query($sql14);

        $sql15 = "UPDATE product_choice_tbl SET popular = '$drpPopular5' WHERE id = '5'";
        $update15 = $db->query($sql15);

        $sql16 = "UPDATE product_choice_tbl SET popular = '$drpPopular6' WHERE id = '6'";
        $update16 = $db->query($sql16);

        $sql17 = "UPDATE product_choice_tbl SET popular = '$drpPopular7' WHERE id = '7'";
        $update17 = $db->query($sql17);

        $sql18 = "UPDATE product_choice_tbl SET popular = '$drpPopular8' WHERE id = '8'";
        $update18 = $db->query($sql18);

        $msg2 .= "Record Updated Inserted";
    }
  } // End of Updating Popular

  // Updating New Arrival
  if (isset($_POST['bNewarrival'])) {
    $drpNewarrival1 = trim($_POST['drpNewarrival1']);
    $drpNewarrival2 = trim($_POST['drpNewarrival2']);
    $drpNewarrival3 = trim($_POST['drpNewarrival3']);
    $drpNewarrival4 = trim($_POST['drpNewarrival4']);
    $drpNewarrival5 = trim($_POST['drpNewarrival5']);
    $drpNewarrival6 = trim($_POST['drpNewarrival6']);
    $drpNewarrival7 = trim($_POST['drpNewarrival7']);
    $drpNewarrival8 = trim($_POST['drpNewarrival8']);

    if ($drpNewarrival1=="" && $drpNewarrival2=="" && $drpNewarrival3=="" && $drpNewarrival4=="" && 
      $drpNewarrival5=="" && $drpNewarrival6=="" && $drpNewarrival7=="" && $drpNewarrival8==""){
      $msg3 .= "Fields are empty!";
    } 
    elseif ($drpNewarrival1=="" || $drpNewarrival2=="" || $drpNewarrival3=="" || $drpNewarrival4=="" || 
      $drpNewarrival5=="" || $drpNewarrival6=="" || $drpNewarrival7=="" || $drpNewarrival8==""){
      $msg3 .= "A Field is empty!";
    } 
    else { 
        // Update Record
        $sql11 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival1' WHERE id = '1'";
        $update11 = $db->query($sql11);

        $sql12 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival2' WHERE id = '2'";
        $update12 = $db->query($sql12);

        $sql13 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival3' WHERE id = '3'";
        $update13 = $db->query($sql13);

        $sql14 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival4' WHERE id = '4'";
        $update14 = $db->query($sql14);

        $sql15 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival5' WHERE id = '5'";
        $update15 = $db->query($sql15);

        $sql16 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival6' WHERE id = '6'";
        $update16 = $db->query($sql16);

        $sql17 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival7' WHERE id = '7'";
        $update17 = $db->query($sql17);

        $sql18 = "UPDATE product_choice_tbl SET newarrival = '$drpNewarrival8' WHERE id = '8'";
        $update18 = $db->query($sql18);

        $msg3 .= "Record Updated Inserted";
    }
  } // End of Updating New Arrival 
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
                      <li class="<?php if(!isset($_POST['bPopular']) && !isset($_POST['bNewarrival'])) { echo 'active'; } ?>">
                        <a href="#firstpanel" data-toggle="tab"><i class="fa fa-desktop"></i> Best Seller View</a></li>
                      <li class="<?php if(isset($_POST['bPopular'])) { echo 'active'; } ?>">
                        <a href="#secondpanel" data-toggle="tab"><i class="fa fa-desktop"></i> Popular View</a></li>
                      <li class="<?php if(isset($_POST['bNewarrival'])) { echo 'active'; } ?>">
                        <a href="#thirdpanel" data-toggle="tab"><i class="fa fa-desktop"></i> New Arrival View</a></li>
                    </ul>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="tab-content">
                    <!-- #1 first panel begins -->
                    <div class="tab-pane <?php if(!isset($_POST['bPopular']) && !isset($_POST['bNewarrival'])) { echo 'active'; } ?>" id="firstpanel">
                      <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
                          <!-- general form elements disabled -->
                          <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">Best Seller View</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <?php if ($msg) { ?>
                                <div class="alert alert-info alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-info"></i> Alert!</h4>
                                    <?php echo $msg; ?>
                                </div>
                                <?php } ?>                                
                              <table class="table table-hover">
                                <tr>
                                  <th>Image</th>
                                  <th>Sku</th>
                                  <th>Name</th>
                                  <th></th>
                                </tr>
                                <?php
                                  // Retrieve the bestseller view
                                  $sql2 = "SELECT bestseller FROM product_choice_tbl ORDER BY id ASC";
                                  $selectbest = $db->query($sql2);
                                  $i = 1;
                                  while ($rw2 = $selectbest->fetch()) { 
                                    $product_sku = $rw2['bestseller'];
                                    $sql5 = "SELECT sku,name,img_1 FROM product_tbl WHERE sku = '$product_sku'";
                                    $selectproductImg = $db->query($sql5);
                                    $rw5 = $selectproductImg->fetch();
                                ?>
                                <tr>
                                  <td><img src="<?php echo BASE_URL; ?>images/product_img/img_150_150/<?php echo $rw5['img_1']; ?>" width="50px"></td>
                                  <td><?php echo $rw5['sku']; ?></td>
                                  <td>
                                    <?php echo $rw5['name']; ?>
                                  </td>
                                  <td>
                                    <select name="drpBestseller<?php echo $i; ?>" class="form-control">
                                      <option value="">Select</option>
                                      <?php
                                        // Retrieve the views(sku,name)
                                        $sqldrp = "SELECT sku,name FROM product_tbl ORDER BY sku ASC";
                                        $selectdrp = $db->query($sqldrp);
                                        while ($rwdrp = $selectdrp->fetch()) { 
                                          $sku_id = $rwdrp['sku'];
                                          $prod_name2 = ucwords($rwdrp['name']);                     
                                      ?>                    
                                      <option value="<?php echo $sku_id; ?>" <?php if ($sku_id == $rw5['sku']) echo 'Selected'; ?>>
                                        <?php echo $prod_name2; ?></option>
                                      <?php } ?>
                                    </select>                                    
                                  </td>
                                </tr>
                                <?php $i++; } ?>
                                <tr>
                                  <td colspan="4"><input type="submit" name="bBestseller" value="Update Bestseller View" class="btn btn-primary" /></td>
                                </tr>
                              </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->            

                        </div><!--/.col (right) -->
                      </div>   <!-- /.row -->
                    </div>
                    <!-- first panel ends -->

                    <!-- #2 second panel begins -->
                    <div class="tab-pane <?php if(isset($_POST['bPopular'])) { echo 'active'; } ?>" id="secondpanel">                    
                      <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
                          <!-- general form elements disabled -->
                          <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">Popular View</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <?php if ($msg2) { ?>
                                <div class="alert alert-info alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-info"></i> Alert!</h4>
                                    <?php echo $msg2; ?>
                                </div>
                                <?php } ?>                                
                              <table class="table table-hover">
                                <tr>
                                  <th>Image</th>
                                  <th>Sku</th>
                                  <th>Name</th>
                                  <th></th>
                                </tr>
                                <?php
                                  // Retrieve the popular view
                                  $sql22 = "SELECT popular FROM product_choice_tbl ORDER BY id ASC";
                                  $selectpop = $db->query($sql22);
                                  $i = 1;
                                  while ($rw22 = $selectpop->fetch()) { 
                                    $product_sku2 = $rw22['popular'];
                                    $sql25 = "SELECT sku,name,img_1 FROM product_tbl WHERE sku = '$product_sku2'";
                                    $selectproductImg2 = $db->query($sql25);
                                    $rw25 = $selectproductImg2->fetch();
                                ?>
                                <tr>
                                  <td><img src="<?php echo BASE_URL; ?>images/product_img/img_150_150/<?php echo $rw25['img_1']; ?>" width="50px"></td>
                                  <td><?php echo $rw25['sku']; ?></td>
                                  <td>
                                    <?php echo $rw25['name']; ?>
                                  </td>
                                  <td>
                                    <select name="drpPopular<?php echo $i; ?>" class="form-control">
                                      <option value="">Select</option>
                                      <?php
                                        // Retrieve the views(sku,name)
                                        $sqldrp = "SELECT sku,name FROM product_tbl ORDER BY sku ASC";
                                        $selectdrp = $db->query($sqldrp);
                                        while ($rwdrp = $selectdrp->fetch()) { 
                                          $sku_id = $rwdrp['sku'];
                                          $prod_name2 = ucwords($rwdrp['name']);                     
                                      ?>                    
                                      <option value="<?php echo $sku_id; ?>" <?php if ($sku_id == $rw25['sku']) echo 'Selected'; ?>>
                                        <?php echo $prod_name2; ?></option>
                                      <?php } ?>
                                    </select>                                    
                                  </td>
                                </tr>
                                <?php $i++; } ?>
                                <tr>
                                  <td colspan="4"><input type="submit" name="bPopular" value="Update Popular View" class="btn btn-primary" /></td>
                                </tr>
                              </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->           

                        </div><!--/.col (right) -->
                      </div>   <!-- /.row -->
                    </div>
                    <!-- second panel ends -->

                    <!-- #3 third panel begins -->
                    <div class="tab-pane <?php if(isset($_POST['bNewarrival'])) { echo 'active'; } ?>" id="thirdpanel">                    
                      <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
                          <!-- general form elements disabled -->
                          <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">New Arrival View</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <?php if ($msg3) { ?>
                                <div class="alert alert-info alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-info"></i> Alert!</h4>
                                    <?php echo $msg3; ?>
                                </div>
                                <?php } ?>                                
                              <table class="table table-hover">
                                <tr>
                                  <th>Image</th>
                                  <th>Sku</th>
                                  <th>Name</th>
                                  <th></th>
                                </tr>
                                <?php
                                  // Retrieve the new arrival view
                                  $sql2 = "SELECT newarrival FROM product_choice_tbl ORDER BY id ASC";
                                  $selectarr = $db->query($sql2);
                                  $i = 1;
                                  while ($rw33 = $selectarr->fetch()) { 
                                    $product_sku3 = $rw33['newarrival'];
                                    $sql35 = "SELECT sku,name,img_1 FROM product_tbl WHERE sku = '$product_sku3'";
                                    $selectproductImg3 = $db->query($sql35);
                                    $rw35 = $selectproductImg3->fetch();
                                ?>
                                <tr>
                                  <td><img src="<?php echo BASE_URL; ?>images/product_img/img_150_150/<?php echo $rw35['img_1']; ?>" width="50px"></td>
                                  <td><?php echo $rw35['sku']; ?></td>
                                  <td>
                                    <?php echo $rw35['name']; ?>
                                  </td>
                                  <td>
                                    <select name="drpNewarrival<?php echo $i; ?>" class="form-control">
                                      <option value="">Select</option>
                                      <?php
                                        // Retrieve the views(sku,name)
                                        $sqldrp = "SELECT sku,name FROM product_tbl ORDER BY sku ASC";
                                        $selectdrp = $db->query($sqldrp);
                                        while ($rwdrp = $selectdrp->fetch()) { 
                                          $sku_id = $rwdrp['sku'];
                                          $prod_name2 = ucwords($rwdrp['name']);                     
                                      ?>                    
                                      <option value="<?php echo $sku_id; ?>" <?php if ($sku_id == $rw35['sku']) echo 'Selected'; ?>>
                                        <?php echo $prod_name2; ?></option>
                                      <?php } ?>
                                    </select>                                    
                                  </td>
                                </tr>
                                <?php $i++; } ?>
                                <tr>
                                  <td colspan="4"><input type="submit" name="bNewarrival" value="Update New Arrival View" class="btn btn-primary" /></td>
                                </tr>
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