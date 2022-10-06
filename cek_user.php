<?php
// Menautkan Koneksi
include "core/init.php";

// Membuat query untuk mengambil data user
$sql = "SELECT * FROM users";
$query = mysqli_query($link, $sql);
// Mengestrak Hasil
while ($fech = mysqli_fetch_array($query)) {
    // echo $fech["nama"] . " ";
    $item[] = array(
        'nama_user' => $fech["user_username"],
        'id_unik' => $fech["unique_id"],
        'email' => $fech["user_email"]
    );
}

$response =
    array(
        'status' => http_response_code(200),
        'data_user_terdaftar' => $item
    );

echo json_encode($response);