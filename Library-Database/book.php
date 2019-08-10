<?php
require("../../protected/database-connection.php");

if(!isset($_GET["ISBN13"])){
	header("Location:book-form.php");
	exit();
}

$ISBN13 = $_GET["ISBN13"];

$book_search_query = "SELECT * FROM book WHERE ISBN13 = '$ISBN13';";

$result = $mysqli->query($book_search_query);

if($result->num_rows === 0){
	echo "No Book Found";
}

$row = $result->fetch_assoc();

$isbn13 = $row['ISBN13'];
$title = $row['title'];
$author = $row['author'];
$genre = $row['genre'];
$edition = $row['edition'];
echo "<h1>$title</h1>";
echo "<p>$author</p>";
echo "<p>$genre</p>";
echo "<p>$edition</p>";
echo "<p>$isbn13</p>";

