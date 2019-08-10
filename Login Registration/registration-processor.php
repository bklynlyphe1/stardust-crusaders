<?php
require("../../protected/database-connection.php");

$user_id = $mysqli->escape_string($_POST["user_id"]);
$password = $mysqli->escape_string($_POST["password"]);

$private_information = rand(10000000000000000,999999999999999999);

$insert_user = "INSERT INTO user_01 (user_id,password,private_information) VALUES ('$user_id','$password','$private_information');";

$success = $mysqli->query($insert_user);

if($success === false){
	header("Location:registration-form.php?user_id_taken");
	exit();
}
echo "You've been registered!";