<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfoPelanggan extends Model
{
    use HasFactory;

    protected $table = 'info_pelanggans';
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'alamat',
        'no_telp'
    ];

    // Relationship dengan transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Method untuk validasi ID pelanggan yang sudah ada
    public static function isIdExists($id)
    {
        return self::where('id_pelanggan', $id)->exists();
    }
}