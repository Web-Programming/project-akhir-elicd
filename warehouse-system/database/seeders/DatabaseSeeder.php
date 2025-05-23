<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use App\Models\InfoPelanggan;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default user
        User::factory()->create([
            'name' => 'Admin Warehouse',
            'email' => 'admin@warehouse.com',
        ]);

        // Create sample barangs
        Barang::create([
            'id_barang' => 'BRG001',
            'nama_barang' => 'Laptop Asus ROG',
            'harga_beli' => 12000000,
            'harga_jual' => 15000000,
            'satuan_barang' => 'pcs',
            'stok' => 5
        ]);

        Barang::create([
            'id_barang' => 'BRG002',
            'nama_barang' => 'Mouse Logitech',
            'harga_beli' => 250000,
            'harga_jual' => 350000,
            'satuan_barang' => 'pcs',
            'stok' => 20
        ]);

        Barang::create([
            'id_barang' => 'BRG003',
            'nama_barang' => 'Keyboard Mechanical',
            'harga_beli' => 500000,
            'harga_jual' => 750000,
            'satuan_barang' => 'pcs',
            'stok' => 15
        ]);

        Barang::create([
            'id_barang' => 'BRG004',
            'nama_barang' => 'Monitor 24 inch',
            'harga_beli' => 1500000,
            'harga_jual' => 2000000,
            'satuan_barang' => 'pcs',
            'stok' => 8
        ]);

        // Create sample pelanggans
        InfoPelanggan::create([
            'id_pelanggan' => 'PLG001',
            'nama_pelanggan' => 'John Doe',
            'alamat' => 'Jl. Sudirman No. 123, Jakarta',
            'no_telp' => '081234567890'
        ]);

        InfoPelanggan::create([
            'id_pelanggan' => 'PLG002',
            'nama_pelanggan' => 'Jane Smith',
            'alamat' => 'Jl. Thamrin No. 456, Jakarta',
            'no_telp' => '081987654321'
        ]);

        InfoPelanggan::create([
            'id_pelanggan' => 'PLG003',
            'nama_pelanggan' => 'Bob Johnson',
            'alamat' => 'Jl. Gatot Subroto No. 789, Jakarta',
            'no_telp' => '081122334455'
        ]);

        // Create sample transaksis
        Transaksi::create([
            'id_transaksi' => 'TRX001',
            'tanggal_transaksi' => '2025-05-20',
            'id_pelanggan' => 'PLG001',
            'id_barang' => 'BRG002',
            'jumlah' => 2
        ]);

        // Update stok after transaction
        $barang = Barang::find('BRG002');
        $barang->stok -= 2;
        $barang->save();

        Transaksi::create([
            'id_transaksi' => 'TRX002',
            'tanggal_transaksi' => '2025-05-21',
            'id_pelanggan' => 'PLG002',
            'id_barang' => 'BRG003',
            'jumlah' => 1
        ]);

        // Update stok after transaction
        $barang = Barang::find('BRG003');
        $barang->stok -= 1;
        $barang->save();
    }
}