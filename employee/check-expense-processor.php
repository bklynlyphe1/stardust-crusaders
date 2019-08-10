<?php
require '../../protected/database-connection.php';
include 'employee-login-processor.php';


$employee_id = $_GET['employee_id'];
$employee_expense_query = "SELECT * FROM cs85_assignment4_expense WHERE employee_id=$employee_id;";
$employee_table = $mysqli->query($employee_expense_query);
if($employee_table->num_rows === 0){
	echo "<p>Employee has no expenses.</p>";
	exit();

}
echo '<table>';

while($row = $employee_table->fetch_assoc()){
	echo '<tr>';
	echo '<td>'.$row['employee_id'].'</td>';
	echo '<td>'.$row['amount'].'</td>';
	echo '<td>'.$row['description'].'</td>';
	echo '<td>'.$row['date_submitted'].'</td>';
    echo '<td>'.$row['date_updated'].'</td>';
    echo '<td>'.$row['status'].'</td>';
	echo '</tr>';
}

echo '</table>';


?>
