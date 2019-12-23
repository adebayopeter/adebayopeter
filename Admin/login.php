<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once("../inc/config.php");
require_once(ROOT_PATH . "inc/User.class.php");

//start the session
session_start();

$page_title = 'Login Page';

  if (isset($_POST[btnSignIn])) {
    // process the form
    processForm();
  } else {
?>

<?php
    // display the form
    displayForm(array(), array(), new User(array()));
  }
?>


<?php
  function displayForm($errorMessages, $missingFields, $user) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Adebayo Peter Admin | <?php echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo BASE_URL; ?>Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL; ?>Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo BASE_URL; ?>Admin/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
      .errors { border: 1px solid #FF0000; }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo BASE_URL; ?>Admin/"><b>Admin</b> Page</a>
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" placeholder="Username" class='form-control<?php validateField("username", $missingFields) ?>' 
               value="<?php echo $user->getValueEncoded("username") ?>" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" placeholder="Password" class='form-control<?php if ($missingFields) echo " errors" ?>' />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" name="btnSignIn" value="Sign In" class="btn btn-primary btn-block btn-flat" />
            </div><!-- /.col -->
          </div>
        </form>
        <p style="color:red">
        <?php
          if ($errorMessages) {
            foreach ($errorMessages as $errorMessage) {
              echo $errorMessage;
            }
          }
        ?>
        </p>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo BASE_URL; ?>Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo BASE_URL; ?>Admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>   
<?php 
  } // end of displayForm 

  function processForm() {
    $requiredFields = array("username", "password");
    $missingFields = array();
    $errorMessages = array();

    $user = new User (array(
      "username" => isset($_POST["username"]) ? preg_replace("/[^ \-\_a-zA-Z0-9]/", "", $_POST["username"]) : "",
      "password" => isset($_POST["password"]) ? preg_replace("/[^ \-\_a-zA-Z0-9]/", "", $_POST["password"]) : "",
    ));

    foreach ($requiredFields as $requiredField) {
      if (!$user->getValue($requiredField)) {
        $missingFields[] = $requiredField;
      }
    }

    if ($missingFields) {
      $errorMessages[] = "Please fill all fields";
    } else if (!$loggedUser = $user->authenticate()) {
      $errorMessages[] = "Invalid login details";
    }

    if ($errorMessages) {
      displayForm($errorMessages, $missingFields, $user);
    } else {
      $_SESSION["user"] = $loggedUser;
      header('Location: index.php');
    }
  }

  function validateField ($fieldName, $missingFields) {
    if (in_array($fieldName, $missingFields)) {
      echo " errors";
    }
  }
?>



