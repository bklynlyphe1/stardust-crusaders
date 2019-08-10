<?php
require '../../protected/database-connection.php';

$employee_id = $mysqli->escape_string($_POST['user_id']);
$password = $mysqli->escape_string($_POST['password']);

$login_query = "SELECT * FROM cs85_assignment4_employee WHERE employee_id='".$employee_id."' and password = '".$password."';";

$results = $mysqli->query($login_query);
if($results->num_rows === 0){
	die("Authentication Failed");
}
else{
    echo "You are successfully authenticated!";
    header("Location:new-expense-form.php");
}
?>
