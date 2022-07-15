<?php 
include 'common.php';
$page = $_POST['page'];
if($page=='get_class_data'){
    $class = $_POST['class'];
    $where_class = 'where class="'.$class.'" ';
    $result_class = $GLOBALS['db']->ExeQuersys("SELECT DISTINCT `name`,`class` from `drivers` " . $where_class . " ORDER BY name ASC");
    $id = 1;
    while ($row_class = mysqli_fetch_array($result_class)) {
    $data_class .='
      <tr>
        <td>'.$id.'</td>
	    <td scope="row">
	      <b>'.$row_class['name'].'</b>
	    </td>
	    <td>'.$row_class['car_no'].'</td>
	    <td>'.$row_class['class'].'</td>
	    <td>6.63</td>
	    <td>
	      <a href="DriverResults.html" class="btn-link">View Drivers Results</a>
	    </td>
	    <td>
	      <a href="driver_edit.php?id='.$row_class['id'].'" class="btn-edit"><i class="fas fa-edit"></i></a>
	      <a onclick="checkDelete('.$row_class['id'].')" class="btn-delete"><i class="fas fa-trash"></i></a>
	    </td>
	  </tr>
    ';
    $id++; }
    echo $data_class;
}
?>