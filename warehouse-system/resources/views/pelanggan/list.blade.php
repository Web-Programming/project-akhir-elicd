<?php
include_once '../../model/InfoPelanggan.php';
$pelanggan = new InfoPelanggan();
$data = $pelanggan->tampilInfoPelanggan();
?>

<h2>Daftar Pelanggan</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Nama</th><th>Alamat</th><th>No. Telp</th><th>Aksi</th>
    </tr>
    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row['id_pelanggan'] ?></td>
        <td><?= $row['nama_pelanggan'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['no_telp'] ?></td>
        <td>
            <a href="../../controller/pelangganController.php?hapus=<?= $row['id_pelanggan'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
