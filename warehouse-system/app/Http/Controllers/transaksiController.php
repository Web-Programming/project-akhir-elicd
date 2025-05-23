<?php
include_once '../model/Transaksi.php';

$transaksi = new Transaksi();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $pesan = $transaksi->tambahTransaksi($_POST);
        header("Location: ../views/transaksi/list.php?pesan=$pesan");
    }
    if (isset($_POST['edit'])) {
        $pesan = $transaksi->editTransaksi($_POST, $_POST['id_transaksi_lama']);
        header("Location: ../views/transaksi/list.php?pesan=$pesan");
    }
}

if (isset($_GET['hapus'])) {
    $pesan = $transaksi->hapusTransaksi($_GET['hapus']);
    header("Location: ../views/transaksi/list.php?pesan=$pesan");
}
?>
