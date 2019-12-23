<?php
require_once('../../../inc/common.inc2.php');
checkLogin();

$section_head = 'app';
$section = 'all app';
$page_title = 'Preview App';
displayPageHeader("Add New App", true);

if (isset($_GET["tk"]) && isset($_GET["sid"])) {
  $sitename = $_GET["tk"];
  $siteid = $_GET["sid"];
}

if (!$sitenameProfile = SitesProfile::getSiteDetails($sitename, $siteid)) {
  echo '<div style="color:red">This Page does not exit!!!</div>';
  // exit();
}

$myPostId = $sitenameProfile->getValueEncoded("id");
$mySiteName = $sitenameProfile->getValueEncoded("sitename");
$myDescription = $sitenameProfile->getValueEncoded2("description");
$categoryid = $sitenameProfile->getValueEncoded("categoryid");
// Category Class
$categorytitle2 = SiteCategory::getCategoryTitle($categoryid);
$myCategory = $categorytitle2->getValueEncoded("title");

$myImage1 = $sitenameProfile->getValueEncoded("image1");
$myImage2 = $sitenameProfile->getValueEncoded("image2");
$myImage3 = $sitenameProfile->getValueEncoded("image3");

$dwwj = $sitenameProfile->getValueEncoded("datedelivered");
$dwj = strtotime($dwwj);
$myDate = date("jS F, Y", $dwj);

$myEmail = $sitenameProfile->getValueEncoded("emailaddress");
$myPhone1 = $sitenameProfile->getValueEncoded("phonenumber1");
$myPhone2 = $sitenameProfile->getValueEncoded("phonenumber2");

$myWebaddress = $sitenameProfile->getValueEncoded2("webaddress");
$myClient = $sitenameProfile->getValueEncoded("client");
$myClientAddress = $sitenameProfile->getValueEncoded2("clientaddress");
$datedelivered = $sitenameProfile->getValueEncoded("datedelivered");
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-9">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div><!-- /.box-header -->
                  <div class="box-body form-horizontal">                   
                    <div class="form-group">
                      <label for="inputTitle" class="col-sm-3 control-label bold">Site Name</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo ucwords($mySiteName); ?>" class="form-control blue" id="inputTitle" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="editor1" class="col-sm-3 control-label bold">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" rows="3" id="editor1" disabled><?php echo ucwords($myDescription); ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputCategory" class="col-sm-3 control-label bold">Site Category</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo ucwords($myCategory); ?>" class="form-control blue" id="inputCategory" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="file-1" class="col-sm-3 control-label bold">Image Upload 1.</label>
                      <div class="col-sm-9">
                        <img src="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $myImage1; ?>" class="imgg" />
                      </div>
                    </div>
                    <?php if ($myImage2 != "") { ?>
                    <div class="form-group">
                      <label for="file-1" class="col-sm-3 control-label bold">Image Upload 2.</label>
                      <div class="col-sm-9">
                        <img src="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $myImage2; ?>" class="imgg" />
                      </div>
                    </div>
                    <?php } ?>
                    <?php if ($myImage3 != "") { ?>
                    <div class="form-group">
                      <label for="file-1" class="col-sm-3 control-label bold">Image Upload 3.</label>
                      <div class="col-sm-9">
                        <img src="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $myImage3; ?>" class="imgg" />
                      </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                      <label for="datepicker" class="col-sm-3 control-label bold">Project Date</label>
                      <div class="col-sm-9">
                        <input type="text" id="datepicker" value=<?php echo $myDate; ?> class="form-control blue" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-3 control-label bold">Email Address</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $myEmail; ?>" class="form-control blue" id="inputEmail" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPhoneNumber1" class="col-sm-3 control-label bold">Phone #1</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $myPhone1; ?>" class="form-control blue" id="inputPhoneNumber1" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPhoneNumber2" class="col-sm-3 control-label bold">Phone #2</label>
                      <div class="col-sm-9">
                      <input type="text" value="<?php echo $myPhone2; ?>" class="form-control blue" id="inputPhoneNumber2" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputWebAddress" class="col-sm-3 control-label bold">Web Address</label>
                      <div class="col-sm-9">
                      <input type="text" value="<?php echo $myWebaddress; ?>" class="form-control blue" id="inputWebAddress" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputClient" class="col-sm-3 control-label bold">Client</label>
                      <div class="col-sm-9">
                      <input type="text" value="<?php echo $myClient; ?>" class="form-control blue" id="inputClient" placeholder="Client" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputClientAddress" class="col-sm-3 control-label bold">Client Address</label>
                      <div class="col-sm-9">
                      <input type="text" value="<?php echo $myClientAddress; ?>" class="form-control blue" id="inputClientAddress" />
                      </div>
                    </div>                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="<?php echo BASE_URL;?>Admin/pages/app/" class="btn btn-primary">All Apps</a>
                    <a href="<?php echo BASE_URL; ?>Admin/pages/app/editpost.php?sid=<?php echo $myPostId; ?>&tk=<?php echo $mySiteName; ?>" 
                    class="btn btn-primary pull-right">Edit App</a>
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

    <!-- jQuery 2.1.4 -->
    <!--<script src="<?php echo BASE_URL; ?>Admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>-->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo BASE_URL; ?>Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE_URL; ?>Admin/dist/js/demo.js" type="text/javascript"></script>
    <!-- Ckeditor Begins -->
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
    <!-- Ckeditor Ends -->
  </body>

</html>