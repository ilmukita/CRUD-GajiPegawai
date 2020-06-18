<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'db_gaji';

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
  die("Gagal koneksi:" . $conn->connect_error);
}
