<?php 
include('config.php');
include 'common.php';
$_SESSION['userid'];
if($_SESSION['userid'] == ''){
   echo "<script>window.location.href = 'index.php';</script>";
}
$_session['menu']="user";

$title="User";
$table="user_master";
$usable="user";

if($_POST['add'] == "Submit")
{
  $password = $_POST['password'];

  $_POST['unique_key'] = generatePasswordKey($password);
  $_POST['user_salt'] = generateKey16Bit();
  $_POST['user_iv'] = generateKey16Bit();
  $_POST['password'] = encyrpt($_POST['user_salt'], $_POST['user_iv'], $_POST['unique_key'], $_POST['password']);

  //$_POST['password'] = md5($password);
  $_POST['add_date']=date("Y-m-d H:i:s");
  $_POST['add_by']=$_SESSION['Uadmin_Id'];
  $GLOBALS['db']->insert_record($table, $_POST);
     
  redirect($usable."_list.php?msg=success");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | <?php echo $title; ?> Add</title>

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
              <h1 class="m-0"><?php echo $title; ?> Add</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?> Add</li>
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
            <div class="col-lg-12">
              <form role="form" action="" method="post">
                <!-- small box -->
                <div class="card bg-white shadow-none">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter username">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="text" class="form-control" name="password" id="password"
                            placeholder="Enter password">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="designation" class="form-label">Designation</label>
                          <select class="form-control" name="designation" id="designation">
                            <option>-Select designation-</option>
                            <option value="s">Super Admin</option>
                            <option value="a">Admin</option>
                            <option value="u">Users</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">  
                        <div class="mb-3 text-right">
                          <a href="<?php echo $usable ?>_list.php" class="btn btn-light ml-2">Cancel</a>
                          <input name="add" type="hidden" value="Submit" />
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
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
