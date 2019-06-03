<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$_POST = json_decode(file_get_contents('php://input'), true);

if(isset($_GET)) {
  $username1 = $_POST['username'];
  $password1 = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM user";
//$result = $conn->query($sql);


$policies = [];
//$sql = "SELECT id, number, amount FROM policies";

if($result = $conn->query($sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['id']    = $row['id'];
    $policies[$i]['name'] = $row['name'];
    $policies[$i]['email'] = $row['email']; 
	$policies[$i]['mobile'] = $row['mobile'];
	
    $i++;
  }

	 echo '{
        "message": "'.json_encode($policies).'",
        "success": true   
    }';



  //echo json_encode($policies);




}


}
?>