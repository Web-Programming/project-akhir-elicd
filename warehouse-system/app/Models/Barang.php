<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'satuan_barang',
        'stok'
    ];

    protected $casts = [
        'harga_beli' => 'decimal:2',
        'harga_jual' => 'decimal:2',
        'stok' => 'integer'
    ];

    // Relationship dengan transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_barang', 'id_barang');
    }

    // Method untuk validasi ID barang yang sudah ada
    public static function isIdExists($id)
    {
        return self::where('id_barang', $id)->exists();
    }

    // Method untuk update stok
    public function updateStok($jumlah)
    {
        $this->stok -= $jumlah;
        return $this->save();
    }

    // Method untuk cek ketersediaan stok
    public function isStokTersedia($jumlah)
    {
        return $this->stok >= $jumlah;
    }
}