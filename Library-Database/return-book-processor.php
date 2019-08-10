<?php
$daily_fee = 0.50;

require("../../protected/database-connection.php");
$book_id = $_POST["book_id"];
$book_search_query = "SELECT *, DATEDIFF(date_due,NOW()) AS days_left  FROM loan WHERE book_id = $book_id AND date_returned IS NULL;";
$result = $mysqli->query($book_search_query);

if($result->num_rows === 0){
	echo "Thank you for returning the book";
}
else{
	$loan = $result->fetch_assoc();
	$loan_id = $loan['loan_id'];
	$member_id = $loan['member_id'];
	$days_left = $loan['days_left'];
	
	$update_return_date_query = "UPDATE loan SET date_returned = NOW() WHERE loan_id = $loan_id;";
	$mysqli->query($update_return_date_query);
	
	$update_location_query = "UPDATE inventory SET location = 'Stacks' WHERE book_id = $book_id;";
	$mysqli->query($update_location_query);
	
	
	
	if($days_left < 0){
		echo "Your book is overdue";
		
		$replacement_cost_lookup = "SELECT replacement_cost FROM inventory NATURAL JOIN book WHERE book_id= $book_id ;";
		$result = $mysqli->query($replacement_cost_lookup);
		$replacement_cost_row = $result->fetch_assoc();
		$replacement_cost = $replacement_cost_row["replacement_cost"];
		
		$penalty = MIN($replacement_cost , $daily_fee * $days_left * -1);

		$balance_lookup = "SELECT balance FROM member WHERE member_id = $member_id;";
		$balance_result = $mysqli->query($balance_lookup);
		$balance_row = $balance_result->fetch_assoc();
		$balance = $balance_row["balance"];
		$new_balance = $balance + $penalty;
		
		$update_member_balance = "UPDATE member SET balance = $new_balance WHERE member_id = $member_id;";
		
		$mysqli->query($update_member_balance);
		
		echo "You have been assessed a late penalty of $penalty.  Your new balance is $new_balance";

	}
	
	echo "Thank you for returning the book";

}








