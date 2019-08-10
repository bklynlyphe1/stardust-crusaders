<?php
	if(isset($_GET["error"])){
		$error = $_GET["error"];
		if($error === "edition-not-number"){
			echo "<div style='border:1px solid red;'>Error: Edition Not Numeric</div>";
		}
		if($error === "replacement-cost-not-number"){
			echo "<div style='border:1px solid red;'>Error: Replacement Cost Not Numeric</div>";
		}
		else if($error === "isbn13-in-use"){
			$conflicting_isbn13 = $_GET["conflicting_isbn13"];
			$conflicting_title = $_GET["conflicting_title"];
			$conflicting_author = $_GET["conflicting_author"];
			echo "<div style='border:1px solid red;'>ISBN13 in use already by $conflicting_isbn13 : $conflicting_title : $conflicting_author</div>";
		}
		else if($error === "book-not-recognized"){
			echo "<div style='border:1px solid red;'>Error:Book ISBN13 Not Recognized, Add it Here</div>";
		}
	}
?>
<form action="new-book-processor.php" method="post">
	<fieldset>
		<legend>Add a New Book</legend>
		<label for="ISBN13">ISBN13</label><br />
		<input type="text" name="ISBN13" id="ISBN13" value="<?php echo $_GET['isbn13'];?>"/><br />
		
		<label for="title">Title</label><br />
		<input type="text" name="title" id="title"/><br />
		
		<label for="author">Author</label><br />
		<input type="text" name="author" id="author"/><br />
		
		<label for="genre">Genre</label><br />
		<input type="text" name="genre" id="genre"/><br />
		
		<label for="edition">Edition</label><br />
		<input type="text" name="edition" id="edition"/><br />
		
		<label for="replacement_cost">Replacement Cost</label><br />
		<input type="text" name="replacement_cost" id="replacement_cost"/><br />
		
		
		<input type="submit" />
		
	</fieldset>
</form>