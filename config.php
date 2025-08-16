<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$user = 'primaelectronic'; // sesuaikan jika menggunakan user lain
$password = 'primaelectronic'; // sesuaikan jika menggunakan password
$dbname = 'primaelectronic';
 
$conn = new mysqli($host, $user, $password, $dbname);
 
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>