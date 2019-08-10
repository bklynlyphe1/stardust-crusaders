<?php
require("../../protected/database-connection.php");
$search_book_query = "SELECT * FROM book;";
$results = $mysqli->query($search_book_query);
if($results->num_rows === 0){
	echo "<p>There Are No Books In This Database</p>";
}
echo "<table>";
while($row = $results->fetch_assoc()){
	$isbn13 = $row['ISBN13'];
	$title = $row['title'];
	$author = $row['author'];
	$genre = $row['genre'];
	$edition = $row['edition'];
	echo "<tr>";
	echo "<td>$isbn13</td>";
	echo "<td>$title</td>";
	echo "<td>$author</td>";
	echo "<td>$genre</td>";
	echo "<td>$edition</td>";
	echo "</tr>";
}
echo "</table>";











