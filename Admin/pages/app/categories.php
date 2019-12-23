<?php
  require_once('../../../inc/common.inc.php');
  checkLogin();

  $section_head = 'app';
  $section = 'categories';
  $page_title = 'Add New Categories';
  displayPageHeader("Add New Categories", true);

  if (isset($_POST["submit"]) && $_POST["submit"] == "Add New Category") {
    // processForm();
    $requiredFields = array("title", "alias", "description");
    $missingFields = array();
    $errorMessages = array();

    $category = new SiteCategory(array(
      "title" => isset($_POST["title"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["title"]) : "",
      "alias" => isset($_POST["alias"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["alias"]) : "",
      "description" => isset($_POST["description"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["description"]) : ""
    ));

    foreach ($requiredFields as $requiredField) {
      if (!$category->getValue($requiredField)) {
        $missingFields[] = $requiredField;
      }
    }

    if ($missingFields) {
      $errorMessages[] = 'Please fill all required field!';
    }

    if (SiteCategory::getCategoryName($category->getValue("title"))) {
      $errorMessages[] = 'Category name already exist!';
    }

    if (!$errorMessages) {
      $category->insert();
      $msg2 .= 'I don enter!!!';
    }    
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
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="box-body">
                    <!-- check for any error and display it -->
                    <?php if (isset($_POST["submit"]) && $_POST["submit"] == "Add New Category") { ?>
                      <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Alert!</h4>
                          <?php
                            if ($errorMessages) {
                              foreach ($errorMessages as $errorMessage) {
                                echo $errorMessage;
                              }
                            } else {
                              echo $msg2;
                              echo 'Record Inserted';
                            }
                          ?>
                      </div>
                    <?php } ?>
                    <!-- finish error checking -->
                    <div class="form-group">
                      <label for="inputTitle">Title</label>
                      <input type="text" name="title" value="<?php if(!empty($title)) echo $title; ?>" class="form-control" id="inputTitle" placeholder="Enter Title Here..." />
                    </div>
                    <div class="form-group">
                      <label for="inputAlias">Alias</label>
                      <input type="text" name="alias" value="<?php if(!empty($alias)) echo $alias; ?>" class="form-control" id="inputAlias" placeholder="Enter Alias Here..." />
                    </div>
                    <div class="form-group">
                      <label for="inputTextarea">Description</label>
                      <textarea name="description" class="form-control" rows="3" id="inputTextarea" placeholder="Description ..."><?php if(!empty($description)) echo $description; ?></textarea>
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
                      <th>Alias</th>
                      <th>Description</th>
                      <th>Count</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    <?php 
                      // Display all category
                      $all_category = SiteCategory::getCategories();

                      foreach ($all_category as $my_category) {
                    ?>
                    <tr>
                      <td><?php echo $my_category->getValueEncoded("title"); ?></td>
                      <td><?php echo $my_category->getValueEncoded("alias"); ?></td>
                      <td><?php echo $my_category->getValueEncoded("description"); ?></td>
                      <td></td>
                      <td><a href="">
                        <span class="glyphicon glyphicon-edit"></span></a></td>
                      <td><a href="">
                        <span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    <?php } // end for loop ?>
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
<?php
  function processForm() {
    $requiredFields = array("title", "alias", "description");
    $missingFields = array();
    $errorMessages = array();

    $category = new SiteCategory(array(
      "title" => isset($_POST["title"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["title"]) : "",
      "alias" => isset($_POST["alias"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["alias"]) : "",
      "description" => isset($_POST["description"]) ? preg_replace("/[^ \#\.\-\_a-zA-Z0-9]/", "", $_POST["description"]) : ""
    ));

    foreach ($requiredFields as $requiredField) {
      if (!$category->getValue($requiredField)) {
        $missingFields[] = $requiredField;
      }
    }

    if ($missingFields) {
      $errorMessages[] = 'Please fill all required field!';
    }

    if (SiteCategory::getCategoryName($category->getValue("title"))) {
      $errorMessages[] = 'Category name already exist!';
    }

    if (!$errorMessages) {
      $category->insert();
      $msg2 .= 'I don enter!!!';
    }
  }
?>