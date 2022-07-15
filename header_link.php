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

  <!-- fa icon cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- custom css -->
  <link rel="stylesheet" href="admin/dist/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <script>
    var room = 0;
    function education_fields() {
    
        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
      divtest.setAttribute("class", "form-group removeclass"+room);
      var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="row"><div class="col-md-5 nopadding"><div class="form-group"> <input type="text" class="form-control" id="aname" name="aname[]" value="" placeholder="Name"></div></div><div class="col-md-5 nopadding"><div class="form-group"> <input type="text" class="form-control" id="avalue" name="avalue[]" value="" placeholder="Value"></div></div><div class="col-md-2 nopadding"><div class="form-group"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="nav-icon fa fa-minus" aria-hidden="true"></span> </button></div></div></div><div class="clear"></div></div>';
        
        objTo.appendChild(divtest)
    }
    function remove_education_fields(rid) {
      $('.removeclass'+rid).remove();
    }
  </script>