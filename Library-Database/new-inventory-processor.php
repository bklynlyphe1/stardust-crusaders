<?php
require("../../protected/database-connection.php");
$ISBN13 = $_POST["ISBN13"];
$quantity = $_POST["quantity"];
if(!is_numeric($quantity)){
	header("Location:new-inventory-form.php?error=quantity-not-number");
	exit();
}
$book_exist_query = "SELECT * FROM book WHERE ISBN13 = '$ISBN13';";
$results = $mysqli->query($book_exist_query);
if($results->num_rows === 0){
	header("Location:new-book-form.php?error=book-not-recognized&isbn13=".urlencode($ISBN13));
	exit();
}
$add_new_book_query = "INSERT INTO inventory (ISBN13) VALUES ";
$inventory_component = "";
for($i = 0 ; $i < $quantity - 1 ; $i++){
	$inventory_component .= "('$ISBN13'),";
}
$inventory_component  .= "('$ISBN13');";
$add_new_book_query .= $inventory_component;
$mysqli->query($add_new_book_query);

echo "Success, This Inventory Element was Added";