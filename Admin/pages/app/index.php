<?php
require_once('../../../inc/common.inc.php');
checkLogin();

$section_head = 'app';
$section = 'all app';
$page_title = 'All App';
displayPageHeader("All App", true); 
?>
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
              <h3 class="box-title">Posts</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-hover">
                <thead>
                  <tr>
                    <th>Site Name</th>
                    <th>Web Address</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  // $x = 1; while ($x <= 100) { ?>
                  <?php
                    // Display all site app
                    $all_site_app = SitesProfile::getSitesProfilesAll2();

                    foreach($all_site_app as $my_app) {
                      $myPostId = $my_app->getValueEncoded("id");
                      $mySiteName = $my_app->getValueEncoded("sitename");
                      $myWebAddress = $my_app->getValueEncoded2("webaddress");

                      $test = SiteCategory::getCategory($my_app->getValueEncoded("categoryid"));
                      $myCategoryTitle = $test->getValueEncoded("title");
                      $dwwj = $my_app->getValueEncoded("datecreated");
                      $dwj = strtotime($dwwj);
                      $myDate = date("jS F, Y", $dwj);
                      // $myDate = date( "\T\h\e jS \o\\f F, Y, \a\\t g:i A", $dwj );

                  ?>
                  <tr>
                    <td><?php echo $mySiteName; ?></td>
                    <td><?php echo myWebAddress; ?></td>
                    <td><?php echo $myCategoryTitle; ?></td>
                    <td><?php echo $myDate; ?></td>
                    <td><a href="<?php echo BASE_URL; ?>Admin/pages/app/editpost.php?sid=<?php echo $myPostId; ?>&tk=<?php echo $mySiteName; ?>">
                      <span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="<?php echo BASE_URL; ?>Admin/pages/app/previewpost.php?sid=<?php echo $myPostId; ?>&tk=<?php echo $mySiteName; ?>">
                      <span class="glyphicon glyphicon-user"></span></a></td>
                  </tr>
                  <?php } ?>
                  <?php // $x++; } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Site Name</th>
                    <th>Web Address</th>
                    <th>Category</th>
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
