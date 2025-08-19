<?php
$host = 'localhost';
$dbname = 'dbiyfqm7zpsubs';
$username = 'ufgzffdwyusgm';
$password = 'ifqlkpgc9quz';
 
try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
 
