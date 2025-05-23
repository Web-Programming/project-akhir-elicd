<?php
include_once '../model/InfoPelanggan.php';

$pelanggan = new InfoPelanggan();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $pesan = $pelanggan->tambahInfoPelanggan($_POST);
        header("Location: ../views/pelanggan/list.php?pesan=$pesan");
    }
    if (isset($_POST['edit'])) {
        $pesan = $pelanggan->editInfoPelanggan($_POST, $_POST['id_pelanggan_lama']);
        header("Location: ../views/pelanggan/list.php?pesan=$pesan");
    }
}

if (isset($_GET['hapus'])) {
    $pesan = $pelanggan->hapusInfoPelanggan($_GET['hapus']);
    header("Location: ../views/pelanggan/list.php?pesan=$pesan");
}
?>
