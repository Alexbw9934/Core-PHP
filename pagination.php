<?
include('config.php');
 $loadBtn = 0;
 $row = 10;
if(isset($_POST['loadBtn'])){
   $loadBtn = mysqli_real_escape_string($conn,$_POST['loadBtn']); 
}
if(isset($_POST['row'])){
   $row = mysqli_real_escape_string($conn,$_POST['row']); 
}

// selecting posts
$query = 'SELECT * FROM `events_division` limit '.$loadBtn.','.$row;

$result = mysqli_query($conn,$query);

$html = '';

while($rows = mysqli_fetch_array($result)){
   $id = $rows['id'];
   $name = $rows['name'];
   $date = $rows['date'];
   
   $location = $rows['location'];

   // Creating HTML structure
   $html .= '<div id="post_'.$id.'" class="post">';
   $html .= '<h2>'.$name.'</h2>';
   $html .= '<p>'.$date.'</p>';
   $html .= '<p>'.Natoinal.'</p>';
   $html .= '<p>'.$location.'</p>';
   $html .= '</div>';

}

echo $html;
?>