<?php
include "core/init.php";
//mengecek parameter post
if (isset($_POST['name']) && isset($_POST['password'])) {

    //menampung parameter ke dalam variabel
    $nama  = $_POST['name'];
    $pass = $_POST['password'];

    $user = cek_data_user($nama, $pass); //validasi user
    if ($user != false) {
        //jika berhasil login
        $response["status"] = http_response_code(200);
        $response["user"]["name"] = $user["user_username"];
        $response["user"]["user_key"] = $user["unique_id"];

        echo json_encode($response);
    } else {
        // user tidak ditemukan password/email salah
        $response["error"] = http_response_code(400);
        $response["error_msg"] = "Login gagal. Password/Nik salah";
        echo json_encode($response);
    }
} else {
    $response["error"] = http_response_code(404);
    $response["error_msg"] = "Nik atau Password tidak boleh kosong !";
    echo json_encode($response);
}