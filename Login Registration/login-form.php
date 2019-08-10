<?php
	if(isset($_GET["invalid-login"])){
		echo "<p>Invalid Username or Password.</p>";
	}
?>


<form action="login-processor.php" method="post">
	<fieldset>
		<legend>Login</legend>
		
		<label for="user_id">User ID</label><br />
		<input type="text" name="user_id" id="user_id" /><br />
		
		
		<label for="password">Password</label><br />
		<input type="password" name="password" id="password" /><br />
		<input type="submit" />
		
	</fieldset>
</form>