<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$_POST = json_decode(file_get_contents('php://input'), true);

if(isset($_POST) && !empty($_POST)) {
	
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password1 = $_POST['password'];
  $mobile = $_POST['mobile'];
  
  
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angapp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO user (name, email, password, mobile)VALUES ('".$name."', '".$email."', '".$password1."', '".$mobile."')";



/*if ($conn->query($sql) === TRUE) {
	
    echo "Table MyGuests created successfully";exit;
} else {
    echo "Error creating table: " . $conn->error;exit;
}*/

//$conn->close();
  
  

  if ($conn->query($sql) === TRUE) {
    //$_SESSION['user'] = 'admin';
    ?>
{
  "success": true,
  "secret": "This is the secret no one knows but the admin"
}
    <?php
  } else {
    ?>
{
  "success": false,
  "message": "Invalid credentials"
}
    <?php
  }
} else {
  //var_dump($_POST)
  ?>
{
  "success": false,
  "message": "Only POST access accepted"
}
  <?php
}

?>