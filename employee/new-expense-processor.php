<?php
require '../../protected/database-connection.php';

    
$employee_id = $_GET['employee_id'];
$amount = $_GET['amount'];
$description = $_GET['description'];
$date_submitted = NOW();
    
$query = "INSERT INTO cs85_assignment4_expense(employee_id,amount,description,date_submitted) VALUES ('$employee_id','$amount','$description','$date_submitted');";

$success = $mysqli->query($query);

if(!$success){
	echo "Insert Failed";
}
else{
	echo "Expense Added";
}
?>