<?php 
include('config.php');
include 'common.php';
$_SESSION['userid'];
if($_SESSION['userid'] == ''){
   echo "<script>window.location.href = 'index.php';</script>";
}
$_session['menu']="profile";

$title="Profile";
$table="drivers";
$usable="profile";

$edit = $GLOBALS['db']->get_row("select * from $table where id = '" . $_GET['id'] . "' ");

if($_POST['add'] == "Update")
{
    $condtion = array('id' => $_GET['id']);
    /*$_POST['edit_date']=date("Y-m-d H:i:s");
    $_POST['edit_by'] = $_SESSION['Uadmin_Shop']; */
    
    if(!empty($file_name=$_FILES['photo']['name']))
    {
        $file_name=$_FILES['photo']['name'];
        $file_size=$_FILES['photo']['size'];
        $file_type=$_FILES['photo']['type'];
        $file_tmp=$_FILES['photo']['tmp_name'];

        $min_rand=rand(0,1000);
        $max_rand=rand(100000000000,10000000000000000);
        $nam=rand($min_rand,$max_rand);
        $ext=end(explode(".",$file_name));

        move_uploaded_file($file_tmp,"admin/docs/assets/img/profile_photo/".$nam.".".$ext);

        $mate_doc_file = $nam.".".$ext;
        $file=$mate_doc_file;  
        $_POST['photo'] = $file;

        $GLOBALS['db']->update_record($table, $_POST, $condtion);
    }    
    else
    {
        $_POST['photo'] = $_POST['photo'];
        $GLOBALS['db']->update_record($table, $_POST, $condtion);
    }
    
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
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <!-- small box -->
                <div class="card bg-white shadow-none">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-md-2">
                        <p>Profile Photo</p>
                        <div id="img-remove">
                          <?php 
                            if($edit->photo=='')
                            {
                              $photo = "dummy_profile.png";
                            }
                            else
                            {
                              $photo = "profile_photo/$edit->photo";
                            }
                          ?>
                          <img src="admin/docs/assets/img/<?php echo $photo; ?>" id="img" class="img-thumbnail">
                        </div>
                      </div>
                      <div class="col-md-10">
                        <p class="m-0 mt-5">Upload Your Photo</p>
                        <div class="mb-3">
                          <p for="formFile" class="small">Your photo should be in PNG or JPG format</p>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo" id="photo" accept="image/*" onchange="readURL(this)">
                                  <label class="custom-file-label" for="photo">Choose file</label>
                                </div>
                               
                              </div>
                            </div>
                            <div class="col-md-5">
                              <a class="btn btn-light ml-2" id="remove">Remove</a>
                            </div>
                          </div>
                        
                         
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Full name</label>
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo $edit->name; ?>"
                            placeholder="Your full name">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $edit->email; ?>" placeholder="Your email">
                        </div>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col">
                              <label for="phone_no" class="form-label">Phone number</label>
                              <input type="text" class="form-control" name="phone_no" id="phone_no" value="<?php echo $edit->phone_no; ?>" placeholder="Your phone number">
                            </div>
                            <div class="col">
                              <label for="car_no" class="form-label">Car number</label>
                              <input type="text" class="form-control" name="car_no" id="car_no" value="<?php echo $edit->car_no; ?>"
                                placeholder="Your car number">
                            </div>

                            <div class="col">
                              <label for="class" class="form-label">Class</label>
                              <select class="form-control" name="class" id="class" aria-label="Default select example">
                                <option selected>-Select your class-</option>
                                <?php 
                                  $result_class = $GLOBALS['db']->ExeQuersys("select id,class from drivers group by class order by id desc");
                                  while ($row_class = mysqli_fetch_array($result_class)) {
                                ?>
                                <option value="<?php echo $row_class['class']; ?>" <?php if($edit->class==$row_class['class']){echo "selected";} ?>><?php echo $row_class['class']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="country" class="form-label">Location</label>
                          <select class="form-control" name="country" id="country" aria-label="Default select example">
                            <option selected>-Select your country-</option>
                            <?php 
                              $result_loc = $GLOBALS['db']->ExeQuersys("select id,country_name from country");
                              while ($row_loc = mysqli_fetch_array($result_loc)) {
                            ?>
                            <option value="<?php echo $row_loc['id']; ?>" <?php if($edit->country==$row_loc['id']){echo "selected";} ?>><?php echo $row_loc['country_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
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

<script>
  /*Selected Image Display*/
  function readURL(input) {
    if (input.files && input.files[0]) {
    
      var reader = new FileReader();
      reader.onload = function (e) { 
        document.querySelector("#img").setAttribute("src",e.target.result);
      };

      reader.readAsDataURL(input.files[0]); 
    }
  }
  /***********************/

  /*Selected Image Remove*/
  $(function(){
    var $img = $("#remove")
      , $container = $("#img-remove");
    $img.on("click", function() {
      $img.remove();
      $container.html("<img src='admin/docs/assets/img/dummy_profile.png' id='img' class='img-thumbnail'>");
      $container.removeClass().removeAttr("id");
    });
  });
  /**********************/
  </script>

</body>

</html>
