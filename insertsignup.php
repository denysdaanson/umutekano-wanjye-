<?php
include 'conn.php';
//$id=$_POST['id'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

$sql = "INSERT INTO signup (fullname, email,password,confirm_password) VALUES ('$fullname', '$email','password','confirm_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record inserted successfully!";

} else {


echo "data not inserted";
}

?>
