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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | <?php echo $title; ?> List</title>

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
              <h1 class="m-0"><?php echo $title; ?> List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
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
                        <a href="user_add.php" class="btn btn-primary float-right">Add</a>
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
 <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--Popup Delete-->
<div class="modal fade" id="Delete_Confirmation" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <input type="hidden" id="delete_id" name="delete_id" value=""/>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="Delete_confirm();">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!--End Popup delete-->

<?php include 'footer_link.php'; ?>

<script type="text/javascript">
  /*Popup Delete*/
  function checkDelete(id) {
      $("#delete_id").val(id);
      $("#Delete_Confirmation").modal('show');
  }
  function Delete_confirm() {
      var page = '<?php echo $usable; ?>';
      var table = '<?php echo $table; ?>';
      var Delete_id = $("#delete_id").val();
      location.href = "delete_record.php?id=" + Delete_id +'&page='+ page +'&table='+ table;
  }
  /************/
</script>

</body>

</html>
