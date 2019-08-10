<?php
require("../../protected/database-connection.php");

$user_id = $mysqli->escape_string($_POST["user_id"]);
$password = $mysqli->escape_string($_POST["password"]);

$login_query = "SELECT * FROM user_01 WHERE user_id='$user_id' AND password='$password';";

$login_results = $mysqli->query($login_query);

if($login_results->num_rows === 0){
	header("Location:login-form.php?invalid-login");
	exit();
}

$user = $login_results->fetch_assoc();

echo "Welcome back ".$user["user_id"]." here is your private information: ".$user["private_information"];