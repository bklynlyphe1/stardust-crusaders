<?php
require("../../protected/database-connection.php");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$new_member_query = "INSERT INTO member (first_name, last_name) VALUES ('$first_name', '$last_name');";
$mysqli->query($new_member_query);

$member_id = $mysqli->insert_id;

echo "You are registered $first_name $last_name.  Your member id is $member_id";