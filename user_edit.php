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

$edit = $GLOBALS['db']->get_row("select * from $table where id = '" . $_GET['id'] . "' ");

$edit->password = decrypt($edit->user_salt, $edit->user_iv, $edit->unique_key, $edit->password);
//decrypt($salt, $iv, $password, $text)

if($_POST['add'] == "Update")
{
  $condtion = array('id' => $_GET['id']);

  $password = $_POST['password'];
  
  $_POST['unique_key'] = generatePasswordKey($password);
  $_POST['user_salt'] = generateKey16Bit();
  $_POST['user_iv'] = generateKey16Bit();
  $_POST['password'] = encyrpt($_POST['user_salt'], $_POST['user_iv'], $_POST['unique_key'], $_POST['password']);

  $_POST['edit_date']=date("Y-m-d H:i:s");
  $_POST['edit_by'] = $_SESSION['Uadmin_Id']; 
  $GLOBALS['db']->update_record($table, $_POST, $condtion);

  redirect($usable."_list.php?msg=update");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | <?php echo $title; ?> Edit</title>

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
              <h1 class="m-0"><?php echo $title; ?> Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?> Edit</li>
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
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo $edit->name; ?>"
                            placeholder="Enter name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $edit->email; ?>"
                            placeholder="Enter email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $edit->username; ?>"
                            placeholder="Enter username">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="text" class="form-control" name="password" id="password" value="<?php echo $edit->password; ?>"
                            placeholder="Enter password">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="designation" class="form-label">Designation</label>
                          <select class="form-control" name="designation" id="designation">
                            <option>-Select designation-</option>
                            <option value="s" <?php if($edit->designation=='s'){echo 'selected';} ?>>Super Admin</option>
                            <option value="a" <?php if($edit->designation=='a'){echo 'selected';} ?>>Admin</option>
                            <option value="u" <?php if($edit->designation=='u'){echo 'selected';} ?>>Users</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">  
                        <div class="mb-3 text-right">
                          <a href="<?php echo $usable ?>_list.php" class="btn btn-light ml-2">Cancel</a>
                          <input name="add" type="hidden" value="Update" />
                          <button type="submit" class="btn btn-primary">Update</button>
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
