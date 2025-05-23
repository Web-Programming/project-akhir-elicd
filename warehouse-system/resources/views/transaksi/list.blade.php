<?php
include_once '../../model/Transaksi.php';
$transaksi = new Transaksi();
$data = $transaksi->tampilTransaksi();
?>

<h2>Daftar Transaksi</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Tanggal</th><th>Pelanggan</th><th>Barang</th><th>Jumlah</th><th>Aksi</th>
    </tr>
    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row['id_transaksi'] ?></td>
        <td><?= $row['tanggal_transaksi'] ?></td>
        <td><?= $row['nama_pelanggan'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td>
            <a href="../../controller/transaksiController.php?hapus=<?= $row['id_transaksi'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
