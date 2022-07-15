<?
include('config.php');
include 'common.php';
$_SESSION['userid'];
if($_SESSION['userid'] == ''){
   echo "<script>window.location.href = 'index.php';</script>";
}
$id = $_GET['updateprofile'];
$usersql = "SELECT * FROM `user_master` WHERE `id` = $id";
$userquery = mysqli_query($conn,$usersql);
$usershow = mysqli_fetch_array($userquery);
if(isset($_POST['updatebtn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $car_no = $_POST['car_no'];
    $class = $_POST['class'];
    $location = $_POST['location'];
    
    $image = $_FILES['image'];
    $imagepath = $image['name'];
    $tmp_img = $image['tmp_name'];
    
    move_uploaded_file ($tmp_img,'assets/img/profile/'.$imagepath);
    
    $sqlupdate = "UPDATE `user_master` SET `username`='$username',`email`='$email',`image`='$imagepath',`phone`='$phone',`car_no`='$car_no',`class`='$class',
    `location`='$location' WHERE `id` = '$id'";
    $updatequery = mysqli_query($conn,$sqlupdate);
    if($updatequery){
        echo "<script>alert('Profile Update Successfully...');</script>";
        echo "<script>window.location.href='ProfileEdit.php';</script>";
    }else{
        echo "<script>alert('Something Went Wrong Try Again...');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include 'top_menu.php'; ?>
    <?php include 'side_menu.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Profile Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile Edit</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
      <form action="" method="post" enctype='multipart/form-data'>
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <div class="card bg-white shadow-none">
                <div class="card-body p-4">
                  <div class="row">
                        <div class="col-md-2">
                          <p>Profile Photo</p>
                          <img src="<?if($usershow['image']){echo 'assets/img/profile/'.$usershow['image'];}else{echo "assets/img/profile/usericon.png";}?>" class="img-thumbnail">
                        </div>
                        <div class="col-md-10">
                          <p class="m-0 mt-5">Upload Your Photo</p>
                          <div class="mb-3">
                            <p for="formFile" class="small">Your photo should be in PNG or JPG format</p>
                            <div class="row">
                              <div class="col-md-5">
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                 
                                </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full name</label>
                            <input type="text" class="form-control" name="username" value="<?=$usershow['username'];?>" id="exampleFormControlInput1"
                              placeholder="Your full name">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?=$usershow['email'];?>" id="exampleFormControlInput1" placeholder="Your email">
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Phone number</label>
                                <input type="number" class="form-control" name="phone" value="<?=$usershow['phone'];?>" id="exampleFormControlInput1"
                                  placeholder="Your phone number">
                              </div>
                              <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Car number</label>
                                <input type="text" class="form-control" name="car_no" value="<?=$usershow['car_no'];?>" id="exampleFormControlInput1"
                                  placeholder="Your car number">
                              </div>
    
                              <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Class</label>
                                <select class="form-control" name="class" aria-label="Default select example">
                                  <option value="One">One</option>
                                  <option value="Two">Two</option>
                                  <option value="Three">Three</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Location</label>
                            <select class="form-control" name="location" aria-label="Default select example">
                              <option value="Delhi">Delhi</option>
                              <option value="Rajasthan">Rajasthan</option>
                              <option value="Mumbai">Mumbai</option>
                            </select>
                          </div>
                          <div class="mb-3 text-right">
                            <button  class="btn btn-light ml-2">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="updatebtn">Update Profile</button>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
 <!-- /.content-wrapper -->
 <footer class="main-footer">
  <strong>Copyright &copy; 2022

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script href="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script  src="admin/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="admin/dist/js/pages/dashboard.js"></script> -->
</body>

</html>
