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
  $section = 'add product';
  $page_title = 'Add New Product';     
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

    <!-- link to upload image resources start -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>Admin/file_upload/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>Admin/file_upload/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/file_upload/js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>Admin/file_upload/js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

    <script>
    function addmore(num)
    {
      if(num==1)
      {
        document.getElementById('field2').style.display='block';
        document.getElementById('field1').style.display='block';
        return false;
      }
      else if(num==2)
      {
        document.getElementById('field3').style.display='block';
        return false;
      }
      else if(num==3)
      {
        document.getElementById('field4').style.display='block';
        return false;       
      }

    }
    </script>    
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
  // Create Unique Product ID
  $product_id = getProductID();

  // Submiting the New Product
  if (isset($_POST['bSubmit'])) {
    $sku = $product_id;
    $title2 = trim($_POST['txtTitle']);
    $title = mysql_real_escape_string($title2);
    $description2 = trim($_POST['txtDescription']);
    $description = mysql_real_escape_string($description2);
    $section_name = trim($_POST['drpSection']);
    $category_name = trim($_POST['drpCategory']);
    $brand_name = trim($_POST['drpBrand']);
    $entry_date = date("Y-m-d H:i:s");
    $status = '1'; // post
    $category = trim($_POST['txtCategory']);
    $posted_by = $fullname;
    $size_sum = array_sum($_FILES["imagefile"]["size"]);

    if ($title=="" && $description=="" && $section_name=="" && $category_name=="" && $brand_name==""){
      $msg .= "Fields are empty!<br>";
    } 
    elseif ($title=="" || $description=="" || $section_name=="" || $category_name=="" || $brand_name==""){
      $msg .= "A Field is empty!<br>";
    }    
    // checking if any image was uploaded at all
    elseif ($size_sum > 0) {

      $imagefile = array();
      $i=1;

      foreach ($_FILES['imagefile']['error'] as $key => $error) {
        $imagefile[$i] == "";
        if ($error == UPLOAD_ERR_OK) {

          $tmp_name = $_FILES['imagefile']['tmp_name'][$key];
          $orignalfile = strtolower($_FILES['imagefile']['name'][$key]);
          $imagefile[$i] = time() . str_replace(" ","_",$orignalfile);

          // Move the file to the target upload folder
          $target = ROOT_PATH . DOC_UPLOADPATH_PROD . $imagefile[$i];
          $target_thumb_150 = ROOT_PATH . DOC_UPLOADPATH_PROD_150_150 . $imagefile[$i];
          $width_150 = '150';
          $height_150 = '150';
          $target_thumb_380 = ROOT_PATH . DOC_UPLOADPATH_PROD_276_380 . $imagefile[$i];
          $width_276 = '276';
          $height_380 = '380';

          if (move_uploaded_file($tmp_name, $target)){
            
            // create image dimension for 150 x 150
            create_image_dimenion($target, $width_150, $height_150, $target_thumb_150);

            // create image dimension for 276 x 380
            create_image_dimenion($target, $width_276, $height_380, $target_thumb_380);            
          }
        }
        else{
          $msg .= "Image $i was not uploaded!<br>";
        }
        $i++;
      }
      // write data to database
      $sql5 = "INSERT INTO product_tbl (sku,name,section,category,brand,description,img_1,img_2,img_3,img_4,entry_date,status,posted_by) VALUES " . 
      "('$sku','$title','$section_name','$category_name','$brand_name','$description','$imagefile[1]','$imagefile[2]','$imagefile[3]'," . 
        "'$imagefile[4]','$entry_date','$status','$posted_by')";
      // '$name[1]','$name[2]','$name[3]','$name[4]'
      $insertrecord = $db->query($sql5);
      $msg .= "Product has being added!<br>";

      // clear the variables for new product entry
      $title = '';
      $description = '';
      $section_name = '';
      $category_name = '';
      $brand_name = '';      

      $product_id = getProductID();
    } else{
      $msg .= "No image has been selected for upload!";
    }
  // Try to delete the temporary document file
  @unlink($_FILES['imagefile']['tmp_name']);        
  } 
?>         

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <?php if ($msg) { ?>
                    <div class="alert alert-info alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>                    
                    <div class="form-group">
                      <label for="productID">Product ID</label>
                      <input type="text" name="txtProductID" value="<?php echo $product_id; ?>" class="form-control" id="productID" disabled />
                    </div>                    
                    <div class="form-group">
                      <label for="inputTitle">Title</label>
                      <input type="text" name="txtTitle" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputTitle" placeholder="Enter Title Here..." />
                    </div>
                    <div class="form-group">
                      <label for="inputTextarea">Description</label>
                      <textarea class="form-control" name="txtDescription" rows="3" id="inputTextarea" placeholder="Description ..."><?php if(!empty($description)) echo $description; ?></textarea>
                    </div>
                    <div class="form-group" id="field1">
                      <label for="file-0">Image Upload</label>
                      <input id="file-0" class="file" name="imagefile[]" type="file" multiple data-min-file-count="1">
                      <p class="help-block"><a href="#" onclick="addmore(1)">add more images...</a></p>
                    </div>                    
                    <div class="form-group" id="field2" style="display:none;">
                      <label for="file-1">File input</label>
                      <input id="file-1" class="file" name="imagefile[]" type="file" multiple data-min-file-count="1">
                      <p class="help-block"><a href="#" onclick="addmore(2)">add more images...</a></p>
                    </div>
                    <div class="form-group" id="field3" style="display:none;">
                      <label for="file-2">File input</label>
                      <input id="file-2" class="file" name="imagefile[]" type="file" multiple data-min-file-count="0">
                      <p class="help-block"><a href="#" onclick="addmore(3)">add more images...</a></p>
                    </div>
                    <div class="form-group" id="field4" style="display:none;">
                      <label for="file-3">File input</label>
                      <input id="file-3" class="file" name="imagefile[]" type="file" multiple data-min-file-count="0">
                      <p class="help-block"><a href="#" onclick="addmore(4)">add more images...</a></p>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" name="bSubmit" class="btn btn-primary" value="Add New Product">
                  </div>
              </div><!-- /.box -->

            </div><!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-4">
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Section</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- select -->
                  <div class="form-group">
                    <select name="drpSection" class="form-control">
                      <option value="">Select</option>
                      <?php
                        // Retrieve the section
                        $sqlsection = "SELECT title FROM section_tbl ORDER BY title ASC";
                        $selectsection = $db->query($sqlsection);
                        while ($rw2 = $selectsection->fetch()) { 
                          $section_name2 = ucwords($rw2['title']);                     
                      ?>                    
                      <option value="<?php echo $section_name2; ?>" <?php if ($section_name2 == $section_name) echo 'Selected'; ?>>
                        <?php echo $section_name2; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- select -->
                  <select name="drpCategory" class="form-control">
                    <option value="">Select</option>
                    <?php
                      // Retrieve the Category
                      $sqlcategory = "SELECT title FROM category_tbl ORDER BY title ASC";
                      $selectcategory = $db->query($sqlcategory);
                      while ($rw3 = $selectcategory->fetch()) { 
                        $category_name2 = ucwords($rw3['title']);                
                    ?>                    
                    <option value="<?php echo $category_name2; ?>" <?php if ($category_name2 == $category_name) echo 'Selected'; ?>>
                      <?php echo $category_name2; ?></option>
                    <?php } ?>
                  </select>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Brand</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- select -->
                  <select name="drpBrand" class="form-control">
                    <option value="">Select</option>
                    <?php
                      // Retrieve the Brand
                      $sqlbrand = "SELECT title FROM brand_tbl ORDER BY title ASC";
                      $selectbrand = $db->query($sqlbrand);
                      while ($rw4 = $selectbrand->fetch()) {  
                        $brand_name2 = ucwords($rw4['title']);                
                    ?>                    
                    <option value="<?php echo $brand_name2; ?>" <?php if ($brand_name2 == $brand_name) echo 'Selected'; ?>>
                      <?php echo $brand_name2; ?></option>
                    <?php } ?>
                  </select>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </form>
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
      $("#file-0").fileinput({
        showUpload: false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
      });    
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
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
