<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eprofile_db";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}