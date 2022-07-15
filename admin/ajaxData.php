<?php
   
   // include database connection file
   include('connection.php');
   // load records using select box jquery ajax in PHP
   
   
//   // load records using select box jquery ajax in PHP
//   $id = $_POST['id'];
//   $sql = "SELECT * FROM `events_division` WHERE year = '$id'";
//   $query = mysqli_query($conn,$sql);
//   $output = "";
//   if ($query>0) {
      
//       $output .= "<table class='table table-hover table-border'>
//                   <thead>
//                      <tr>
//                         <th scope='col'>Sr.No</th>
//                         <th scope='col'>Event</th>
//                         <th scope='col'>Date</th>
//                         <th scope='col'>Division</th>
//                         <th scope='col'>Track</th>
//                      </tr>
//                   </thead>";
//                   $sr = 1;
//       while ($row = mysqli_fetch_assoc($query)) {
//       $output .= "<tbody>
//                   <tr>
//                     <td>{$sr}</td>
//                     <td><b>{$row['name']}</b></td>
//                     <td>{$row['date']}</td>
//                     <td>Natoinal</td>
//                     <td>{$row['location']}</td>
//                     <td>
//                         <a class='btn-link'>View Drivers Results</a>
//                     </td>
//                   </tr>
//                 </tbody>";
//       $sr++; }                   
                   
//       $output .= "</table>";
//       echo $output;
//   }else{
//       echo "No records found";
//   }

// configuration

$start = 0;$row = 3;
if(isset($_POST['start'])){
   $start = mysqli_real_escape_string($con,$_POST['start']); 
}
if(isset($_POST['row'])){
   $row = mysqli_real_escape_string($con,$_POST['row']); 
}

// selecting posts
$query = 'SELECT * FROM `events_division` limit '.$start.','.$row;

$result = mysqli_query($con,$query);

$html = '';

while($row = mysqli_fetch_array($result)){
   $output .= "<table class='table table-hover table-border'>
                   <thead>
                      <tr>
                         <th scope='col'>Sr.No</th>
                         <th scope='col'>Event</th>
                         <th scope='col'>Date</th>
                         <th scope='col'>Division</th>
                         <th scope='col'>Track</th>
                      </tr>
                   </thead>";
                  $sr = 1;
      while ($row = mysqli_fetch_assoc($query)) {
      $output .= "<tbody>
                  <tr>
                    <td>{$sr}</td>
                    <td><b>{$row['name']}</b></td>
                    <td>{$row['date']}</td>
                    <td>Natoinal</td>
                    <td>{$row['location']}</td>
                    <td>
                        <a class='btn-link'>View Drivers Results</a>
                    </td>
                  </tr>
                </tbody>";
      $sr++; }                   
                   
      $output .= "</table>";
      echo $output;
}
?>