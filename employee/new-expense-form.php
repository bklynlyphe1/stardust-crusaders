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
<form action="new-expense-processor.php">
	<fieldset>
		<legend>Expense Information</legend>
        
        Employee ID : <input type="text" name="employee_id" id="employee_id" /><br />
        
		Amount: <input type="text" name="amount" id="amount" /><br />
		
		Description : <input type="text" name="description" id="description" /><br />
		<input type="submit" /><br />
		
	</fieldset>
</form>
    
</body>
</html>