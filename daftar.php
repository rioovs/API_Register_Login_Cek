<?php
// import koneksi
include "core/init.php";

// Kode Respon Json
$response = array("error" => FALSE);
if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])) {
    // Menerima Parameter POST (nama, password dan email)
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Mengecek id apakah sudah pernah daftar atau belum
    if (cek_nama($name) == 0) {
        // Mendaftarkan user baru
        $user = register_user($name, $password, $email);
        if ($user) {
            // simpan user berhasil
            $response["status"] = http_response_code(200);
            $response["user"]["name"] = $user["user_username"];
            $response["user"]["key"] = $user["unique_id"];
            echo json_encode($response);
        } else {
            // Gagal Menyimpan User
            $response["error"] = http_response_code(400);
            $response["error_msg"] = "Terjadi Kesalahan Saat Melakukan Registrasi";
            echo json_encode($response);
        }
    } else {
        // User Telah Ada
        $response["status"] = http_response_code(400);
        $response["error_msg"] = "Terjadi Kesalahan Saat Melakukan Registrasi";
        echo json_encode($response);
    }
}