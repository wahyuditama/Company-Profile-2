<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "compro";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

if($koneksi->connect_error){
    die("Koneksi gagal: " . $koneksi->connect_error);
}