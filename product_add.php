<?php 
include('config.php');
include 'common.php';
$_SESSION['userid'];
if($_SESSION['userid'] == ''){
   echo "<script>window.location.href = 'index.php';</script>";
}

$_session['menu']="products";

if($_POST['add'] == "Submit")
{
  print_r($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hilibi Sports | Products | Add</title>

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
                <li class="breadcrumb-item"><a href="products_list.php">Products</a></li>
                <li class="breadcrumb-item active">Add</li>
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
                            placeholder="Enter name" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="sku" class="form-label">Sku</label>
                          <input type="text" class="form-control" name="sku" id="sku"
                            placeholder="Enter Sku">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="cate" class="form-label">Category</label>
                          <select class="form-control" name="cte" id="cte" required>
                            <option value="">-Select Category-</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="scate" class="form-label">Sub Category</label>
                          <select class="form-control" name="scate" id="scate">
                            <option value="">-Select Sub Category-</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="wprice" class="form-label">Wholesale Price</label>
                          <input type="number" class="form-control" name="wprice" id="wprice"
                            placeholder="Enter Wholesale Price" step=any required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                          <label for="rprice" class="form-label">Retail Price</label>
                          <input type="number" class="form-control" name="rprice" id="rprice"
                            placeholder="Enter Retail Price" step=any required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="tax" class="form-label">Tax</label>
                          <input type="number" class="form-control" step=any name="tax" id="tax"
                            placeholder="Enter Tax">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="shipping" class="form-label">Shipping</label>
                          <input type="number" class="form-control" name="shipping" id="shipping"
                            placeholder="Enter Shipping" step=any>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                     <div class="col-md-6">
                        <div class="mb-3">
                          <label for="quantity" class="form-label">Quantity</label>
                          <input type="number" class="form-control" name="quantity" id="quantity"
                            placeholder="Enter Retail Price" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="weight" class="form-label">Weight</label>
                          <input type="number" class="form-control" name="weight" id="weight"
                            placeholder="Enter Tax" step=any required>
                        </div>
                      </div>
                    </div> 
                    
                    <label for="attributes" class="form-label">Attributes</label>
                    <div id="education_fields">
                    </div>

                    <div class="row">
                      <div class="col-md-5 nopadding">
                        <div class="form-group">
                          <input type="text" class="form-control" id="aname" name="aname[]" value="" placeholder="Name">
                        </div>
                      </div>
                      <div class="col-md-5 nopadding">
                        <div class="form-group">
                          <input type="text" class="form-control" id="avalue" name="avalue[]" value="" placeholder="Value">
                        </div>
                      </div>
                        
                      <div class="col-md-2 nopadding">
                        <div class="form-group">
                            <div class="input-group-btn">
                              <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="nav-icon fa fa-plus" aria-hidden="true"></span> </button>
                            </div>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div> 

                    <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Enter Description" maxlength ="1000"></textarea>
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
    <?php include 'footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- <script>
    $(document).ready(() => {
      var name = $('#name');
      var sku = $('#sku');
      var cate = $('#cate');
      var scate = $('#scate');
      var wprice = $('#wprice');
      var rprice = $('#rprice');
      var tax = $('#tax');
      var shipping = $('#shipping');
      var quantity = $('#quantity');
      var weight = $('#weight');
      var anames = $('#sname');
      var avalues = $('#avalue');
      var description = $('#description');

      $.ajax({

      })
    })
  </script> -->
  <?php include 'footer_link.php'; ?>
</body>

</html>
