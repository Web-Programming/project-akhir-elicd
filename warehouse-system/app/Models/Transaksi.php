<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Exception;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'tanggal_transaksi',
        'id_pelanggan',
        'id_barang',
        'jumlah'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
        'jumlah' => 'integer'
    ];

    // Relationships
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function pelanggan()
    {
        return $this->belongsTo(InfoPelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Method untuk validasi ID transaksi yang sudah ada
    public static function isIdExists($id)
    {
        return self::where('id_transaksi', $id)->exists();
    }

    // Method untuk create transaksi dengan validasi stok
    public static function createTransaksi($data)
    {
        try {
            // Validasi ID transaksi
            if (self::isIdExists($data['id_transaksi'])) {
                throw new Exception('ID Transaksi sudah ada');
            }

            // Cek barang dan stok
            $barang = Barang::find($data['id_barang']);
            if (!$barang) {
                throw new Exception('Barang tidak ditemukan');
            }

            if (!$barang->isStokTersedia($data['jumlah'])) {
                throw new Exception('Stok tidak cukup');
            }

            // Cek pelanggan
            $pelanggan = InfoPelanggan::find($data['id_pelanggan']);
            if (!$pelanggan) {
                throw new Exception('Pelanggan tidak ditemukan');
            }

            // Start database transaction
            \DB::beginTransaction();

            // Update stok barang
            $barang->updateStok($data['jumlah']);

            // Create transaksi
            $transaksi = self::create($data);

            \DB::commit();

            return ['success' => true, 'message' => 'Transaksi berhasil ditambahkan'];

        } catch (Exception $e) {
            \DB::rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    // Method untuk update transaksi dengan validasi stok
    public function updateTransaksi($data)
    {
        try {
            $oldData = $this->toArray();
            
            // Start database transaction
            \DB::beginTransaction();

            // Kembalikan stok barang lama
            $oldBarang = Barang::find($oldData['id_barang']);
            $oldBarang->stok += $oldData['jumlah'];
            $oldBarang->save();

            // Cek barang baru dan stok
            $newBarang = Barang::find($data['id_barang']);
            if (!$newBarang) {
                throw new Exception('Barang tidak ditemukan');
            }

            if (!$newBarang->isStokTersedia($data['jumlah'])) {
                throw new Exception('Stok tidak cukup');
            }

            // Update stok barang baru
            $newBarang->updateStok($data['jumlah']);

            // Update transaksi
            $this->update($data);

            \DB::commit();

            return ['success' => true, 'message' => 'Transaksi berhasil diubah'];

        } catch (Exception $e) {
            \DB::rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    // Method untuk delete transaksi dengan mengembalikan stok
    public function deleteTransaksi()
    {
        try {
            \DB::beginTransaction();

            // Kembalikan stok barang
            $barang = $this->barang;
            $barang->stok += $this->jumlah;
            $barang->save();

            // Delete transaksi
            $this->delete();

            \DB::commit();

            return ['success' => true, 'message' => 'Transaksi berhasil dihapus'];

        } catch (Exception $e) {
            \DB::rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}