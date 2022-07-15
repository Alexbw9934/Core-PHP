<?php
include('config.php');
if($_SESSION['userid']){
   header("Location: https://pistolapps.com/sports/index.php");
}
session_start();
include 'password_gen.php';
include("system/loader.php"); 
if(isset($_POST['commit']) == "Sign In") {
$result = $GLOBALS['db']->ExeQuersys("select * from user_master where username='".$_POST['username']."' ");
$row = mysqli_fetch_array($result);

$username = html_escape($_POST['username']);
$password   = html_escape($_POST['password']);
$decrypted_password = decrypt($row['user_salt'], $row['user_iv'], $row['unique_key'], $row['password']);

if($decrypted_password == $password)
{
    $GLOBALS['sesions']->check_browser = true;
    $GLOBALS['sesions']->check_ip_blocks = 2; 
    $GLOBALS['sesions']->secure_word = GetConfig('AdminSecureWord'); 
    $GLOBALS['sesions']->regenerate_id = true;
    $GLOBALS['sesions']->Open(); 
    $_SESSION['Uadmin_Id'] = $row['id'];
    $_SESSION['userid'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    redirect("dashboard.php"); 
}
else
{
    redirect("index.php?msg=failed"); 
}

/*if($username != "" and $password != "" ) {
$nofr = $GLOBALS['db']->NumRows("select * from user_master where username = '".$username."' and password = '".$password."' LIMIT 1 ");    

if($nofr != 0) {
$user = $GLOBALS['db']->get_row("select * from user_master where username = '".$username."' and password = '".$password."' LIMIT 1");


$GLOBALS['sesions']->check_browser = true;
$GLOBALS['sesions']->check_ip_blocks = 2; 
$GLOBALS['sesions']->secure_word = GetConfig('AdminSecureWord'); 
$GLOBALS['sesions']->regenerate_id = true;
$GLOBALS['sesions']->Open(); 
$_SESSION['Uadmin_Id'] = $user->id;
$_SESSION['name'] = $user->name;
redirect("dashboard.php"); 
die(); 
}else { 
    redirect("index.php?msg=failed"); 
die(); 
} 
}else { 
    redirect("index.php?msg=failed"); 
die(); 
} */
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | Login</title>

  <?php include 'header_link.php'; ?>
</head>

<body class="bg-light">
  <div class="container pt-5">

    <div class="d-flex row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body login-card-body">

            <?php if(isset($_GET["msg"]) && $_GET["msg"]=="failed") { ?>         
              <div class="alert alert-danger alert-dismissable">
                  <i class="fa fa-ban"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Incorrect Details. Login Failed.
              </div>
            <?php } ?>

            <p class="login-box-msg h3">LogIn</p>

            <form action="index.php" role="form" method="post">
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <input name="commit" type="submit" class="btn btn-primary btn-block" id="commit" value="Sign In" />
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <!-- <div class="social-auth-links text-center mb-3">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div> -->
            <!-- /.social-auth-links -->
            <br>
            <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>
            <!-- <p class="mb-0">
              <a href="register.html" class="text-center">Register a new membership</a>
            </p> -->
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- ./wrapper -->

<?php include 'footer_link.php'; ?>
</body>

</html>
