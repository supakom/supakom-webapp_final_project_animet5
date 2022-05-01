<?php 

session_start();

$_SESSION["uid"];
 
//var_dump($_POST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "animet5";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo 'ff';
}

$sql = "SELECT * FROM tbl_admin WHERE a_user = '".$_POST["a_user"]."' AND a_pass ='".$_POST["a_pass"]."';";

$re = mysqli_fetch_all(mysqli_query($conn,$sql));

$conn->close();

var_dump($re);

if($re != NULL){
  echo 'yes';

  $_SESSION["uid"] = $re[0][0];

  echo($re[0][0]);
  header('Location: admin/admin.php');
}

else{
  echo 'no';
  header('Location: ../index.php');
}


// if(isset($_POST['log_in'] )){
  
//   echo ("<script LANGUAGE='JavaScript'>
//   window.alert('Welcome');
//   window.location.href='admin/admin.php';
//   </script>");
// }
// elseif(isset($_POST['user'] )){
  
//   echo ("<script LANGUAGE='JavaScript'>
//   window.alert('Welcome');
//   window.location.href='../member.php';
//   </script>");
// }

?>


