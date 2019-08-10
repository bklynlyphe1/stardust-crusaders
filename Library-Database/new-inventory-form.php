<?php
	if(isset($_GET["error"])){
		$error = $_GET["error"];
		if($error === "quantity-not-number"){
			echo "<div style='border:1px solid red;'>Error:Quantity Not Numeric</div>";
		}
	}
?>
<form action="new-inventory-processor.php" method="post">
	<fieldset>
		<legend>Add New Inventory</legend>
		<label for="ISBN13">ISBN13</label><br />
		<input type="text" name="ISBN13" id="ISBN13"/><br />

		<label for="quantity">Quantity</label><br />
		<input type="text" name="quantity" id="quantity" value="1"/><br />
		
		<input type="submit" />
		
	</fieldset>
</form>