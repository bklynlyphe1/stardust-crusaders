<?php
require("../../protected/database-connection.php");

$book_id = $_POST["book_id"];
$member_id = $_POST["member_id"];

$book_available_query = "SELECT * FROM loan WHERE book_id = $book_id AND date_returned IS NULL;";
$result = $mysqli->query($book_available_query);

if($result->num_rows === 1){
	echo "Someone else is currently borrowing this book";
	exit();
}

$new_loan_query = "INSERT INTO loan (book_id, member_id, date_loaned, date_due) VALUES ($book_id, $member_id , NOW() , DATE_ADD(NOW() , INTERVAL 14 DAY));";

$new_loan_success = $mysqli->query($new_loan_query);

if($new_loan_success){
	echo "Loan Successfully Created";
	$update_inventory_query = "UPDATE inventory SET location = 'ON LOAN' WHERE book_id = $book_id;";
	$mysqli->query($update_inventory_query);
}
else{
	echo "Loan Could Not Be Created";
}

