<?php
	if(isset($_GET["user_id_taken"])){
		echo "<p>User ID is in use by somebody else.</p>";
	}
?>

<form action="registration-processor.php" method="post">
	<fieldset>
		<legend>Register An Account</legend>
		
		<label for="user_id">User ID</label><br />
		<input type="text" name="user_id" id="user_id" /><br />
		
		
		<label for="password">Password</label><br />
		<input type="password" name="password" id="password" /><br />
		<input type="submit" />
		
	</fieldset>
</form>