<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <style>
        form{padding-top: 120px;
             text-align: center;
             font-size:30px;}
        
        input{width: auto;
              height: auto;
              font-size: 30px;}
    </style>
    
</head>
<body> 
<form method="post" action="employee-login-processor.php">
	
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tableheader">
			<td align="center" colspan="2">Enter Login Details</td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="employee_id" placeholder="Employee ID" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>    
   
</body>
</html>