<?php 

//variable decleration

$host ='localhost';
$dbname = 'UMUTEKANO_WANJYE';
$username = 'root';
$password = '';

$conn =mysqli_connect($host, $username, $password, $dbname);


if($conn){
	echo "Db connected ";
}

else
{
	echo "db is not connected";
}

