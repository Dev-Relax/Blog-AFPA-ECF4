<?php
function connectToBdd()
{
  $servername = "";
  $username = "";
  $password = "";
  $database = "";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->exec('SET NAMES UTF8');
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }
  return $conn;
}