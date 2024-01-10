<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/Antrian.php';

$database = new Database();
$db = $database->getConnection();
$item = new Antrian($db);
$data = json_decode(file_get_contents("php://input"));
$item->waktudatang = $data->waktudatang;
$item->selisihkedatangan = $data->selisihkedatangan;
$item->awalpelayanan = $data->awalpelayanan;
$item->selisihpelayanankasir = $data->selisihpelayanankasir;
$item->selesai = $data->selesai;
$item->selisihkeluarantrian = $data->selisihkeluarantrian;


if ($item->createAntrian()) {
    echo json_encode(['message' => 'Data Customer Berhasil Ditambahkan.']);
} else {
    echo json_encode(['message' => 'Data Customer Gagal .']);
}
