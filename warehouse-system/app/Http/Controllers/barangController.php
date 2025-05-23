<?php
include_once '../model/Barang.php';

$barang = new Barang();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $pesan = $barang->tambahBarang($_POST);
        header("Location: ../views/barang/list.php?pesan=$pesan");
    }
    if (isset($_POST['edit'])) {
        $pesan = $barang->editBarang($_POST, $_POST['id_barang_lama']);
        header("Location: ../views/barang/list.php?pesan=$pesan");
    }
}

if (isset($_GET['hapus'])) {
    $pesan = $barang->hapusBarang($_GET['hapus']);
    header("Location: ../views/barang/list.php?pesan=$pesan");
}
?>
