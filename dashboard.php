<?php 
include('config.php');
include 'common.php';
$_SESSION['userid'];
if($_SESSION['userid'] == ''){
   echo "<script>window.location.href = 'index.php';</script>";
}

$_session['menu']="dashboard";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | Dashboard</title>

  <?php include 'header_link.php'; ?>
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
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="row">
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-white shadow-none">
                <div class="inner text-center">

                  <p>My Total Event</p>
                  <h3>150</h3>

                </div>


              </div>
            </div>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-white shadow-none">
                <div class="inner text-center">

                  <p>My Quickest 1/4 Time</p>
                  <h3>150</h3>

                </div>


              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white shadow-none">
                <div class="inner text-center">

                  <p>My Quickest 1/4 Speed</p>
                  <h3>150</h3>

                </div>


              </div>
            </div>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-white shadow-none">
                <div class="inner text-center">

                  <p>My Quickest 1/8 Time</p>
                  <h3>150</h3>

                </div>


              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white shadow-none">
                <div class="inner text-center">

                  <p>My Quickest 1/8 Speed</p>
                  <h3>150</h3>

                </div>


              </div>
            </div>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php include 'footer_link.php'; ?>
</body>

</html>
