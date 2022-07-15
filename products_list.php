<?php 
include('config.php');
include 'common.php';
$_SESSION['userid'];
if($_SESSION['userid'] == ''){
   echo "<script>window.location.href = 'index.php';</script>";
}

$_session['menu']="products";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | Products</title>

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
              <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
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

              <?php if(isset($_GET["msg"])) { ?>      
                                
                <?php if($_GET["msg"]=="success") { ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $title; ?> has been <b>added</b>.
                    </div>
                <?php } if($_GET["msg"]=="update") { ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $title; ?> has been <b>updated</b>.
                    </div>
                <?php } if($_GET["msg"]=="delete") { ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $title; ?> has been <b>deleted</b>.
                    </div>
            <?php }} ?>

              <!-- small box -->
              <div class="card bg-white shadow-none">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col-md-2 col-6">
                      <div class="mb-3">
                        <select class="form-control" aria-label="Default select example">
                          <option selected>Year</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 col-6">
                      <div class="mb-3">
                        <select class="form-control" aria-label="Default select example">
                          <option selected>Series</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 col-6">
                    </div>
                    <div class="col-md-2 col-6">
                    </div>
                    <div class="col-md-2 col-6">
                    </div>
                    <div class="col-md-2 col-6">
                      <div class="mb-3">
                        <a href="product_add.php" class="btn btn-primary float-right">Add</a>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <table class="table table-bordered border-primary">
                        <thead class="bg-light">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Designation</th>
                            <th scope="col" width="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $where = 'where is_delete="n"';
                            $result = $GLOBALS['db']->ExeQuersys("select id,name,email,designation from user_master " . $where . " order by id desc");
                            while ($row = mysqli_fetch_array($result)) {

                              switch ($row['designation']) {
                                case 's':
                                  $designation = 'Super Admin';
                                  break;
                                
                                default:
                                  $designation = 'Admin';
                                  break;
                              }

                          ?>
                          <tr>
                            <td scope="row">
                              <b><?php echo $row['name']; ?></b>
                            </td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $designation; ?></td>
                            <td>
                              <a href="user_edit.php?id=<?php echo $row['id']; ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                              <a onclick="checkDelete(<?php echo $row['id']; ?>)" class="btn-delete"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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
