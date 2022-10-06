<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "api_user";

$link = mysqli_connect($server, $user, $pass, $database);

if ($link == false) {
    echo "Koneksi Gagal";
}