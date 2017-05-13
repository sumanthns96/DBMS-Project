
<?php

 $con = mysqli_connect("localhost","root","","wpproject");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $name = mysqli_real_escape_string($con, $_REQUEST['name']);
  $email = mysqli_real_escape_string($con, $_REQUEST['email']);
  $message = mysqli_real_escape_string($con, $_REQUEST['message']);
  
  
  
  
  
  
$query = "INSERT INTO usermessage VALUES ('$name','$email','$message')";
$result=mysqli_query($con,$query);
$message="SUCESSFULLY SENT";
echo $message;
mysqli_close($con);



?>
