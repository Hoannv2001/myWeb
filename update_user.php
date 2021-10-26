<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoanEX";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['update_acount'])&&($_POST['update_acount']))  {
    # code...


    $FirstName= $_POST['firstname'];
    $LastName=$_POST['lastname'];
    $Username=$_POST['username'];
    $PassWord=$_POST['password'];
    $Email=$_POST['email'];
    $Phone=$_POST['telephone'];
    $IDacount =$_POST['Id'];


    # code...


$sql = "UPDATE `user` SET `firstname`='$FirstName',`lastname`='$LastName',
`username`='$Username',`email`='$Email',`telephone`='$Phone',`password`='$PassWord' WHERE `ID` = '$IDacount'";


$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)){


    
    echo '<script type = "text/javascript">';
    echo 'alert("Update Succcessfully!");';
    echo 'window.location.href = "myWeb.php" ';
    echo '</script>';

  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

}

