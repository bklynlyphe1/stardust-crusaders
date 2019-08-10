<?php
require("../../protected/database-connection.php");

$ISBN13 = $_POST["ISBN13"];
$title = $_POST["title"];
$author = $_POST["author"];
$genre = $_POST["genre"];
$edition = $_POST["edition"];
$replacement_cost = $_POST["replacement_cost"];


if(!is_numeric($edition)){
	header("Location:new-book-form.php?error=edition-not-number");
	exit();
}

if(!is_numeric($replacement_cost)){
	header("Location:new-book-form.php?error=replacement-cost-not-number");
	exit();
}

$query = "INSERT INTO book (ISBN13, title, author, genre, edition, replacement_cost) VALUES ('$ISBN13','$title','$author', '$genre', $edition, $replacement_cost);";

$result = $mysqli->query($query);

if($result === false){
	
	$conflicting_book_query = "SELECT * FROM book WHERE ISBN13 = '$ISBN13';";
	$conflicting_book_result = $mysqli->query($conflicting_book_query);
	$book = $conflicting_book_result->fetch_assoc();

	$conflicting_isbn13 = urlencode($book["ISBN13"]);
	$conflicting_title = urlencode($book["title"]);
	$conflicting_author = urlencode($book["author"]);
	
	
	header("Location:new-book-form.php?error=isbn13-in-use&conflicting_isbn13=$conflicting_isbn13&conflicting_title=$conflicting_title&conflicting_author=$conflicting_author");
	exit();
}
else{
	echo "<p>Book $ISBN13 : $title : $author was successfully created.</p>";
}

















