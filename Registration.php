<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "12345";
$db = "USER_TEST";
$conn= mysqli_connect($servername, $username, $password,$db);
   //Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


if (isset($_POST['submit'])) {
  $Username=$_POST['Username'];
$Password=$_POST['Password'];
  }

$Password_hash = md5($Password);//hash the plaintext
$Password_salt= md5($Password, PASSWORD_DEFAULT, array('cost' => 9 ));
//salt the default password && the cost is the salting bit ie the larger the cost, the heavier the load on cpu.
$pass=($Password_hash. $Password_salt);
$pass_hash = md5($pass);
//echo $Password_hash;


$query= "INSERT INTO test (username, salt, pass_hash) VALUES ('$Username', '$Password_salt', '$pass_hash')"; 
  $exec = $conn->query($query);
  

 if ($exec) {
   
    echo "Data saved!";
   header("Refresh:0.1; url=Login.php");
    //header('refresh:0.1; url=Login.php');
  } else {
    echo "Error.Data not saved!";
    
  }
  

//  $result=$conn->query("SELECT * FROM test WHERE username='$Username' and salt='$Password_salt'") or die("Failed to query DB".mysqli_error());
 //$row= mysqli_fetch_array($result);


//if($row['username']==$Username && $row['salt']==$Password_salt) {
//$Username=trim($_POST["Username"]);
 
//$_SESSION["Username"] = $row['username'];
//$_SESSION["Password"] = $row['hash'];
  //echo "Login Successful Welcome ".$row['username'];
// header("Refresh:0.1; url=Login.php");
//} 
  //  else
// {
 // echo "Wrong Username or Password. Please Try again";
 //}



   ?>
   
