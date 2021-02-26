<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "12345";
$db="USER_TEST";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
//Check connection
//if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";
 $result=$conn->query("SELECT * FROM test WHERE username='$Username'") or die("Failed to query DB".mysqli_error($conn));
 $rows= mysqli_fetch_array($result);
 

 ?>
    <!DOCTYPE html>



<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="welcome.css">
    <title>User Profile</title>

     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>

body{
    background: -webkit-linear-gradient(left, #ADD8E6, #ADD8E6);
}
.emp-profile{
    padding: 5%;
    margin-right: 5%;
    margin-left: 5%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 30%;
    padding: 2%;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.profile-img{
    margin-left: 120%;
}
        table{
            border-collapse: collapse;
             width: 100%;
            margin-bottom: 30px;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #000000;
        }
    </style>
    <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href=".php">Home</a></li>
      <li class="active"><a href="Login.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                       <div class="profile-img">
                        <center> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwh5sBr0LLuApAZNKH_nvYphVcqYXs_J_6V3uv_7KBGibyyQu-&s" alt=""/>
                          
                        </div>
                    </center>
                </body>
    
                        <h3><i>
                        <?php
                        echo "Hello ";
                       $_SESSION["Username"] = $row['username'];
                         $row['username'];
                        ?>
                    </i>
                    </h3>
                        <center>
                        <h3 style="color: #0062cc;"><i>Happy Midweek :)</i></h3>
                    </center>
                    </div>
                   
                  
                </div>
              
            
            
        
         
                                      
                                </div>

                            </div>
                             
        
          
                        </div>

                    
          
   
 


</body>
</html>
