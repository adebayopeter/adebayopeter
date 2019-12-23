<?php
require_once('../../../inc/common.inc2.php');
checkLogin();

// Call in the functions.php file -->
include(ROOT_PATH . 'Admin/inc/model/functions.php');

$section_head = 'app';
$section = 'apps';
$page_title = 'Add New App';
displayPageHeader("Add New App", true);

if (isset($_POST["cSubmit"]) && $_POST["cSubmit"] == "Add New Category") {
  // processCategoryForm(); 
  $requiredFields = array("title");
  $missingFields = array();
  $errorCatMessages = array();

  $category = new SiteCategory(array(
    "title" => isset($_POST["txtNewCategory"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtNewCategory"]) : ""
    // "description" => isset($_POST["description"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["description"]) : ""
  ));

  foreach ($requiredFields as $requiredField) {
    if (!$category->getValue($requiredField)) {
      $missingFields[] = $requiredField;
    }
  }

  if ($missingFields) {
    $errorCatMessages[] = 'Please fill all required field!';
  }

  if (SiteCategory::getCategoryName($category->getValue("title"))) {
    $errorCatMessages[] = 'Category name already exist!';
  }

  if (!$errorCatMessages) {
    $category->insert();
  }  
}

// Submit App Form
if (isset($_POST["bSubmit"]) || isset($_POST["bSave"])) {
  // processSubmitForm(); 
  $requiredFields = array("sitename"); //"description", "categoryid", "phonenumber1", "client", "datedelivered");
  $missingFields = array();
  $errorSubmitMessages = array();

  // Get file names
  if (!empty($_FILES['imagefile1']['name'])) {
    // Get image name, type, and size
    $orignalfile1 = $_FILES['imagefile1']['name'];
    $imagefile1 = time() . '_img1_' . str_replace(" ","_",$orignalfile1);
  }
  if (!empty($_FILES['imagefile2']['name'])) {
    // Get image name, type, and size
    $orignalfile2 = $_FILES['imagefile2']['name'];
    $imagefile2 = time() . '_img2_' . str_replace(" ","_",$orignalfile2);
  }
  if (!empty($_FILES['imagefile3']['name'])) {
    // Get image name, type, and size
    $orignalfile3 = $_FILES['imagefile3']['name'];
    $imagefile3 = time() . '_img3_' . str_replace(" ","_",$orignalfile3);
  }  

  // check if which submit button was set
  if (isset($_POST["bSubmit"])) {

    $siteprofile = new SitesProfile(array(
      "sitename" => isset($_POST["txtTitle"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtTitle"]) : "",
      "description" => trim($_POST['txtDescription']),
      "image1" => $imagefile1,
      "image2" => $imagefile2,
      "image3" => $imagefile3,
      "categoryid" => isset($_POST["txtCategory"]) ? preg_replace("/[^ 0-9]/", "", $_POST["txtCategory"]) : "",
      "emailaddress" => isset($_POST["txtEmail"]) ? preg_replace("/[^ \@\.\-\_a-zA-Z0-9]/", "", strtolower($_POST["txtEmail"])) : "",
      "phonenumber1" => isset($_POST["txtPhoneNumber1"]) ? preg_replace("/[^ \+0-9]/", "", $_POST["txtPhoneNumber1"]) : "",
      "phonenumber2" => isset($_POST["txtPhoneNumber2"]) ? preg_replace("/[^ \+0-9]/", "", $_POST["txtPhoneNumber2"]) : "",
      "webaddress" => isset($_POST["txtWebAddress"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", strtolower($_POST["txtWebAddress"])) : "",
      "client" => isset($_POST["txtClient"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtClient"]) : "",
      "clientaddress" => isset($_POST["txtClientAddress"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtClientAddress"]) : "",
      "datedelivered" => date("Y-m-d", strtotime(trim($_POST['txtDate']))),
      "datecreated" => date("Y-m-d"),
      "status" => "1"
    ));
  }
  else if (isset($_POST["bSave"])) {

    $siteprofile = new SitesProfile(array(
      "sitename" => isset($_POST["txtTitle"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtTitle"]) : "",
      "description" => trim($_POST['txtDescription']),
      "image1" => $imagefile1,
      "image2" => $imagefile2,
      "image3" => $imagefile3,
      "categoryid" => isset($_POST["txtCategory"]) ? preg_replace("/[^ 0-9]/", "", $_POST["txtCategory"]) : "",
      "emailaddress" => isset($_POST["txtEmail"]) ? preg_replace("/[^ \@\.\-\_a-zA-Z0-9]/", "", strtolower($_POST["txtEmail"])) : "",
      "phonenumber1" => isset($_POST["txtPhoneNumber1"]) ? preg_replace("/[^ \+0-9]/", "", $_POST["txtPhoneNumber1"]) : "",
      "phonenumber2" => isset($_POST["txtPhoneNumber2"]) ? preg_replace("/[^ \+0-9]/", "", $_POST["txtPhoneNumber2"]) : "",
      "webaddress" => isset($_POST["txtWebAddress"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", strtolower($_POST["txtWebAddress"])) : "",
      "client" => isset($_POST["txtClient"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtClient"]) : "",
      "clientaddress" => isset($_POST["txtClientAddress"]) ? preg_replace("/[^ \#\.\-\/\_a-zA-Z0-9]/", "", $_POST["txtClientAddress"]) : "",
      "datedelivered" => date("Y-m-d", strtotime(trim($_POST['txtDate']))),
      "datecreated" => date("Y-m-d"),
      "status" => "0"
    ));
  }

  foreach ($requiredFields as $requiredField) {
    if (!$siteprofile->getValue($requiredField)) {
      $missingFields[] = $requiredField;
    }
  }

  if ($missingFields) {
    $errorSubmitMessages[] = 'Please fill all required field!';
  }

  if (SitesProfile::getSiteName($siteprofile->getValue("sitename"))) {
    $errorSubmitMessages[] = 'Site name : ' . '<span style="color:red">"' . $siteprofile->getValue("sitename") . '"</span>' . ' already exist!';
  }

  // Check if image file image1 was uploaded and process it
  if (!empty($_FILES['imagefile1']['name'])) {

    // Check if image file image2 was uploaded and process it
    if (!empty($_FILES['imagefile2']['name'])) {
      // Get image name, size, and type
      // $orignalfile = $_FILES['imagefile2']['name'];              --- uncomment this for another programs
      // $imagefile2 = time() . str_replace(" ","_",$orignalfile);  --- uncomment this for another programs
      $imagefile_type2 = $_FILES['imagefile2']['type'];
      $imagefile_size2 = $_FILES['imagefile2']['size'];

      if ((($imagefile_type2 == 'image/gif') || ($imagefile_type2 == 'image/jpeg') || ($imagefile_type2 == 'image/pjpeg') || 
        ($imagefile_type2 == 'image/png')) && ($imagefile_size2 > 0) && ($imagefile_size2 <= DOC_MAXFILESIZE)) {
        if ($_FILES['imagefile2']['error'] == 0) {

          // Move the file to the target upload folder
          $target_x2 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_ORIGINAL . $imagefile2;

          $target_thumb_380_x2 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $imagefile2;
          $width_380_x2 = '380';
          $height_250_x2 = '250';

          $target_thumb_1200_x2 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_1200_900 . $imagefile2;
          $width_1200_x2 = '1200';
          $height_900_x2 = '900';

          if (move_uploaded_file($_FILES['imagefile2']['tmp_name'], $target_x2)){

            // create image dimension for 380 x 250
            create_image_dimenion($target_x2, $width_380_x2, $height_250_x2, $target_thumb_380_x2);

            // create image dimension for 1200 x 900
            create_image_dimenion($target_x2, $width_1200_x2, $height_900_x2, $target_thumb_1200_x2);
          }
          else{
            $msg22 = "Make sure the image is less than 32KB and image type is png,jpg, jpeg and gif - (Image2)!!!";
          }
        }
        else{
          $errorSubmitMessages[] .= "Sorry, there was a problem uploading your image - (Image2).<br>";
        }
      }
      else{
        $msg22 = "Na here wahala dey!!!";
      }
    }
    // Try to delete the temporary document file
    @unlink($_FILES['imagefile2']['tmp_name']);
    // end of check for image2

    // Check if image file image3 was uploaded and process it
    if (!empty($_FILES['imagefile3']['name'])) {
      // Get image name, size, and type
      // $orignalfile = $_FILES['imagefile3']['name'];              --- uncomment this for another programs
      // $imagefile3 = time() . str_replace(" ","_",$orignalfile);  --- uncomment this for another programs
      $imagefile_type3 = $_FILES['imagefile3']['type'];
      $imagefile_size3 = $_FILES['imagefile3']['size'];

      if ((($imagefile_type3 == 'image/gif') || ($imagefile_type3 == 'image/jpeg') || ($imagefile_type3 == 'image/pjpeg') || 
        ($imagefile_type3 == 'image/png')) && ($imagefile_size3 > 0) && ($imagefile_size3 <= DOC_MAXFILESIZE)) {
        if ($_FILES['imagefile3']['error'] == 0) {

          // Move the file to the target upload folder
          $target_x3 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_ORIGINAL . $imagefile3;

          $target_thumb_380_x3 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $imagefile3;
          $width_380_x3 = '380';
          $height_250_x3 = '250';

          $target_thumb_1200_x3 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_1200_900 . $imagefile3;
          $width_1200_x3 = '1200';
          $height_900_x3 = '900';

          if (move_uploaded_file($_FILES['imagefile3']['tmp_name'], $target_x3)){

            // create image dimension for 380 x 250
            create_image_dimenion($target_x3, $width_380_x3, $height_250_x3, $target_thumb_380_x3);

            // create image dimension for 1200 x 900
            create_image_dimenion($target_x3, $width_1200_x3, $height_900_x3, $target_thumb_1200_x3);
          }
          else{
            $msg22 = "Make sure the image is less than 32KB and image type is png,jpg, jpeg and gif - (Image3)!!!";
          }
        }
        else{
          $errorSubmitMessages[] .= "Sorry, there was a problem uploading your image - (Image3).<br>";
        }
      }
      else{
        $msg22 = "Na here wahala dey!!!";
      }
    }
    // Try to delete the temporary document file
    @unlink($_FILES['imagefile3']['tmp_name']);
    // end of check for image3


    // Get image name, size, and type
    // $orignalfile = $_FILES['imagefile1']['name'];              --- uncomment this for another programs
    // $imagefile1 = time() . str_replace(" ","_",$orignalfile);  --- uncomment this for another programs
    $imagefile_type = $_FILES['imagefile1']['type'];
    $imagefile_size = $_FILES['imagefile1']['size'];

    if ((($imagefile_type == 'image/gif') || ($imagefile_type == 'image/jpeg') || ($imagefile_type == 'image/pjpeg') || 
      ($imagefile_type == 'image/png')) && ($imagefile_size > 0) && ($imagefile_size <= DOC_MAXFILESIZE)) {
      if ($_FILES['imagefile1']['error'] == 0) {

        // Move the file to the target upload folder
        $target = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_ORIGINAL . $imagefile1;

        $target_thumb_380 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $imagefile1;
        $width_380 = '380';
        $height_250 = '250';

        $target_thumb_1200 = ROOT_PATH . DOC_UPLOADPATH_SITE_PROFILE_1200_900 . $imagefile1;
        $width_1200 = '1200';
        $height_900 = '900';

        if (move_uploaded_file($_FILES['imagefile1']['tmp_name'], $target)){

          // create image dimension for 380 x 250
          create_image_dimenion($target, $width_380, $height_250, $target_thumb_380);

          // create image dimension for 1200 x 900
          create_image_dimenion($target, $width_1200, $height_900, $target_thumb_1200);

          // write data to database
          if (!$errorSubmitMessages) {
            $siteprofile->insert();
            $msg22 = "I don enter am";
          }
        }
        else{
          $msg22 = "Make sure the image is less than 32KB and image type is png,jpg, jpeg and gif!!!";
        }
      }
      else{
        $errorSubmitMessages[] .= "Sorry, there was a problem uploading your image.<br>";
      }
    }
    else{
      $msg22 = "Na here wahala dey!!!";
    }
  }
  // Try to delete the temporary document file
  @unlink($_FILES['imagefile1']['tmp_name']);

}
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
                <!-- form start -->               
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> <!-- first form begins here -->
                  <div class="box-body">
                    <!-- check for any error and display it -->
                    <?php if (isset($_POST["bSubmit"])) { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                          <?php
                            if ($errorSubmitMessages) {
                              foreach ($errorSubmitMessages as $errorSubmitMessage) {
                                echo $errorSubmitMessage;
                              }
                            } else {
                              echo 'Record has being Inserted!!!<br>';
                              echo $msg22;
                            }
                          ?>
                    </div>
                    <?php } else if (isset($_POST["bSave"]) && $_POST["bSave"] == "Save as Draft") { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                          <?php
                            if ($errorSaveMessages) {
                              foreach ($errorSaveMessages as $errorSaveMessage) {
                                echo $errorSaveMessage;
                              }
                            } else {
                              echo 'Record has being Saved!!!';
                            }
                          ?>
                    </div>
                    <?php } ?>
                    <!-- finish error checking -->                    
                    <div class="form-group">
                      <label for="inputTitle">Site Name</label>
                      <input type="text" name="txtTitle" value="" class="form-control" id="inputTitle" placeholder="Enter Title Here..." />
                    </div>
                    <div class="form-group">
                      <label for="editor1">Description</label>
                      <textarea class="form-control" name="txtDescription" rows="3" id="editor1" placeholder="Description ..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="file-1">Image Upload 1.</label>
                      <input id="file-1" class="file" name="imagefile1" type="file" multiple data-min-file-count="1">
                      <p class="help-block">Image must be at least <strong><i>1200x900</i></strong>.</p>
                    </div>
                    <div class="form-group">
                      <label for="file-2">Image Upload 2.</label>
                      <input id="file-2" class="file" name="imagefile2" type="file" multiple data-min-file-count="1">
                      <p class="help-block">Image must be at least <strong><i>1200x900</i></strong>.</p>
                    </div>
                    <div class="form-group">
                      <label for="file-3">Image Upload 3.</label>
                      <input id="file-3" class="file" name="imagefile3" type="file">
                      <p class="help-block">Image must be at least <strong><i>1200x900</i></strong>.</p>
                    </div>
                    <div class="form-group">
                      <label for="datepicker" style="display:block">Project Date</label>
                      <input type="text" id="datepicker" name="txtDate" style="width:45%;display:inline-block;" class="form-control" placeholder="click here to select date" />
                      <input type="text" id="alternate" style="width:45%; display:inline;" class="form-control" disabled />
                    </div>
                    <div class="form-group">
                      <label for="inputEmail">Email Address</label>
                      <input type="text" name="txtEmail" value="" class="form-control" id="inputEmail" placeholder="Email" />
                    </div>
                    <div class="form-group">
                      <label for="inputPhoneNumber1">Phone #1</label>
                      <input type="text" name="txtPhoneNumber1" value="" class="form-control" id="inputPhoneNumber1" placeholder="Phone #1" />
                    </div>
                    <div class="form-group">
                      <label for="inputPhoneNumber2">Phone #2</label>
                      <input type="text" name="txtPhoneNumber2" value="" class="form-control" id="inputPhoneNumber2" placeholder="Phone #2" />
                    </div>
                    <div class="form-group">
                      <label for="inputWebAddress">Web Address</label>
                      <input type="text" name="txtWebAddress" value="" class="form-control" id="inputWebAddress" placeholder="http://" />
                    </div>
                    <div class="form-group">
                      <label for="inputClient">Client</label>
                      <input type="text" name="txtClient" value="" class="form-control" id="inputClient" placeholder="Client" />
                    </div>
                    <div class="form-group">
                      <label for="inputClientAddress">Client Address</label>
                      <input type="text" name="txtClientAddress" value="" class="form-control" id="inputClientAddress" placeholder="Client Address" />
                    </div>                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="bSubmit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;">
                    <input type="submit" name="bSave" class="btn btn-info pull-right" value="Save as Draft">
                  </div>
                <!-- </form> -->
              </div><!-- /.box -->

            </div><!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-3">
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">                 
                  <!-- radio -->
                  <div class="form-group">
                    <?php 
                      // Display all category
                      $all_category = SiteCategory::getCategories();

                      foreach ($all_category as $my_category) {
                        if ($my_category->getValueEncoded("title") == "php") {
                    ?>
                    <div class="radio">
                      <label>
                        <input type="radio" name="txtCategory" value="<?php echo $my_category->getValueEncoded("id"); ?>" checked /> 
                        <?php echo $my_category->getValueEncoded("title"); ?>
                      </label>
                    </div>
                    <?php
                        } else {
                    ?>                                
                    <div class="radio">
                      <label>
                        <input type="radio" name="txtCategory" value="<?php echo $my_category->getValueEncoded("id"); ?>" /> 
                        <?php echo $my_category->getValueEncoded("title"); ?>
                      </label>
                    </div>
                    <?php 
                        }
                      } // end of foreach loop
                    ?>                 
                    </form> <!-- first form ends here -->
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Category</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>                  
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <input type="text" name="txtNewCategory" class="form-control" placeholder="Add New Category">
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" name="cSubmit" value="Add New Category" class="btn btn-default">

                    <!-- check for any error and display it -->
                    <?php if (isset($_POST["cSubmit"]) && $_POST["cSubmit"] == "Add New Category") { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                          <?php
                            if ($errorCatMessages) {
                              foreach ($errorCatMessages as $errorCatMessage) {
                                echo $errorCatMessage;
                              }
                            } else {
                              echo $msg2;
                              echo 'Record Inserted2';
                            }
                          ?>
                    </div>
                    <?php } ?>
                    <!-- finish error checking -->

                  </div>
                </form>
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

    <!-- Upload Images Script starts-->
    <script type="text/javascript">
      $("#file-1").fileinput({
        showUpload: false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
      });
      $("#file-2").fileinput({
        showUpload: false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
      });
      $("#file-3").fileinput({
        showUpload: false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
      });
    </script>
    <!-- Upload Images Script end -->

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
<?php
  function processCategoryForm() {
    $requiredFields = array("title");
    $missingFields = array();
    $errorCatMessages = array();

    $category = new SiteCategory(array(
      "title" => isset($_POST["txtNewCategory"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["txtNewCategory"]) : ""
      // "description" => isset($_POST["description"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["description"]) : ""
    ));

    foreach ($requiredFields as $requiredField) {
      if (!$category->getValue($requiredField)) {
        $missingFields[] = $requiredField;
      }
    }

    if ($missingFields) {
      $errorCatMessages[] = 'Please fill all required field!';
    }

    if (SiteCategory::getCategoryName($category->getValue("title"))) {
      $errorCatMessages[] = 'Category name already exist!';
    }

    if (!$errorCatMessages) {
      $category->insert();
      $msg2 .= 'I don enter!!!';
    }
  }
?>
