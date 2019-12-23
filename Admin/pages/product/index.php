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
  $section = 'all products';
  $page_title = 'All Products';        
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
    <!-- DATA TABLES -->
    <link href="<?php echo BASE_URL; ?>Admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />    
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

        <!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Products</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Sku</th>
                        <th>Section</th>
                        <th>Categories</th>
                        <th>Brand</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        // Retrieve all products
                        $sql4 = "SELECT * FROM product_tbl ORDER BY entry_date DESC";
                        $selectproduct = $db->query($sql4);
                        while ($rw4 = $selectproduct->fetch()) {                        
                      ?>
                      <tr>
                        <td><?php echo $rw4['name']; ?></td>
                        <td><?php echo $rw4['sku']; ?></td>
                        <td><?php echo $rw4['section']; ?></td>
                        <td><?php echo $rw4['category']; ?></td>
                        <td><?php echo $rw4['brand']; ?></td>
                        <td><?php echo $rw4['entry_date']; ?></td>
                        <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/editproduct.php?id=<?php echo $rw4['id']; ?>&tk=<?php echo $rw4['name']; ?>&sdk=<?php echo $rw4['sku']; ?>">
                          <span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="<?php echo BASE_URL; ?>Admin/pages/product/viewproduct.php?id=<?php echo $rw4['id']; ?>&tk=<?php echo $rw4['name']; ?>&sdk=<?php echo $rw4['sku']; ?>">
                          View</a></td>
                      </tr>
                      <?php } // End of While Loop ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Product Name</th>
                        <th>Sku</th>
                        <th>Section</th>
                        <th>Categories</th>
                        <th>Brand</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>View</th>                     
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
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
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>    
    <!-- FastClick -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>    
  </body>
</html>