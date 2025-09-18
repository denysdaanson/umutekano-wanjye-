<?php
include 'conn.php';
//$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];


$sql = "INSERT INTO login (username, password) VALUES ($username, $password)";

if ($sql) {
    echo "New record inserted successfully!";

} else {


echo "data not inserted";
}

?>
