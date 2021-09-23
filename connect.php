<?php
$name = $_POST["cusname"];
$email = $_POST["email"];
$message = $_POST["message"];


// Create connection
$conn = new mysqli('localhost', 'root', '', 'website','3307');

// Check connection
if ($conn->connect_error) {
  die('Connection failed:  '. $conn->connect_error);
}else{
  $stmt = $conn->prepare("insert into contact(cusname, email,message)
  values(?, ?, ?)");
  $stmt->bind_param("sss",$name, $email, $message);
  $stmt->execute();
  echo file_get_contents("thankyou.html");
  $stmt->close();

}

?>