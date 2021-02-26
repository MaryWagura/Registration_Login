<!DOCTYPE html>
<html>
<head>
<title> Welcome </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
body {font-family: Arial, Helvetica, sans-serif;
margin-left: 400px;
margin-right: 400px;
background-color: #FFFFFF;
background-image: url('https://images.app.goo.gl/gSuZ5kMNUYsJmabM6.jpg');
}
form {
  border: 3px solid #703174;
  background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_wNLel30L8gQbjbQWNHQqQFC2grsfB13mWGQMQVUEKO24SKhQ&s);
  }
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button {
  background-color: #703E74;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}
button:hover {
  opacity: 0.8;
}
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}
img.avatar {
  width: 40%;
  border-radius: 50%;
}
.container {
  padding: 16px;
}
span.psw {
  float: right;
  padding-top: 16px;
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

</style>
  </head>


<body>

  <center>
  <b><h1>COMPANY </h1></b>
  <h2><i>Please Login Below:</h2></i>
  </center>

  <form action="" method="POST">
  <label for="Username"><b>Username:</label><br></b>
  <input type="text" id="Username" name="Username" required><br>
  <label for="Password"><b>Password:</label><br></b>
 <input type="Password" id="Password" name="Password"pattern=".{6,}">
 
 <center>  
<button type="login" name="login"><b>Login</button><br></a> </center></b>
 <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    


</form>

<?php



$servername = "localhost";
$username = "root";
$password = "12345";
$db = "USER_TEST";



$Username=$_POST['Username'];
$Password=$_POST['Password'];
$pass_hash=$_POST['pass_hash'];


if(isset($_POST['login']))
{
  $conn= mysqli_connect($servername, $username, $password,$db);
  // Check connection
//if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";
$Password_hash = md5($Password);


$result=$conn->query("SELECT * FROM test WHERE username='$Username'") or die("Failed to query DB".mysqli_error());
 $row= mysqli_fetch_array($result);
 $recovered_salt= $row['salt'];
$pass=($Password_hash. $recovered_salt);
$pass_hash = md5($pass);

$result=$conn->query("SELECT * FROM test WHERE username='$Username' and pass_hash='$pass_hash'") or die("Failed to query DB".mysqli_error());
 $row= mysqli_fetch_array($result);
 //echo "$pass_hash";

if($row['username']==$Username && $row['pass_hash']==$pass_hash) {
  session_start();
$_SESSION["Username"] = $row['username'];
  echo "Login Successful Welcome ".$row['username'];
 header("Refresh:0.1; url=welcome.php");
} 
    else
 {
  echo "Wrong Username or Password. Please Try again";
 }
 


   //if (password_verify($Password, $row['salt'])) {
  //echo "Login Successful Welcome ".$row['username'];
 //header("Refresh:0.1; url=welcome.php");
//} 
  //  else
// {
  //echo "Wrong Username or Password. Please Try again";
 //}
}


?>

</body>
</html>
