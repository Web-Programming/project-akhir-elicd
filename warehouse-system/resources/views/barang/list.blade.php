<?php
include_once '../../model/Barang.php';
$barang = new Barang();
$data = $barang->tampilBarang();
?>

<h2>Daftar Barang</h2>
<a href="form_tambah.php">Tambah Barang</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nama</th><th>Harga Beli</th><th>Harga Jual</th><th>Satuan</th><th>Stok</th><th>Aksi</th>
    </tr>
    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row['id_barang'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['harga_beli'] ?></td>
        <td><?= $row['harga_jual'] ?></td>
        <td><?= $row['satuan_barang'] ?></td>
        <td><?= $row['stok'] ?></td>
        <td>
            <a href="../../controller/barangController.php?hapus=<?= $row['id_barang'] ?>">Hapus</a>
            <!-- Edit bisa diarahkan ke form edit -->
        </td>
    </tr>
    <?php endforeach; ?>
</table>
