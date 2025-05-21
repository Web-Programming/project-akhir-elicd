<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Barang {     
    private $db; //atribut untuk object dari kelas koneksi() 
 
    public function __construct() 
    { 
        $this->db = new Koneksi();  //object kelas Koneksi 
    } 
 
    public function tambahBarang($data) 
    { 
        //mengambil data dari form 
        $id_barang = $data['id_barang']; 
        $nama_barang = $data['nama_barang']; 
        $harga_beli = $data['harga_beli']; 
        $harga_jual = $data['harga_jual']; 
        $satuan_barang = $data['satuan_barang']; 
        $stok = $data['stok']; 
 
        //mengecek apakah primary key yang dimasukkan sudah ada 
        $query = "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'";         $hasil = $this->db->fetchID($query); 
 
        //kalau hasilnya >0 atau ada, maka muncul alert         
        if(mysqli_num_rows($hasil) > 0) 
        { 
            $pesan = "ID Barang Sudah Ada";             return $pesan; 
        }else{ 
            //jika tidak sama, maka insert bisa dilakukan   
            $query = "INSERT INTO tb_barang SET 
            id_barang='$id_barang', 
            nama_barang='$nama_barang',              
            harga_beli='$harga_beli', 	
            harga_jual='$harga_jual', 
            satuan_barang='$satuan_barang', 
            stok='$stok'"; 
 
            $hasil = $this->db->insert($query); 
             if($hasil) 
            { 
                $pesan = "Data Berhasil Ditambahkan"; 
                return $pesan; 
            }else{ 
                $pesan = "Data Gagal Ditambahkan";                 
                return $pesan; 
            } 
        } 
    } 
 
    public function tampilBarang() 
    { 
        $query = "SELECT * FROM tb_barang ORDER BY id_barang"; 
        $hasil = $this->db->show($query);         return $hasil; 
    } 
 
    public function getIDBarang($id) 
    { 
        //mengambil id_barang pada row tertentu 
        $query = "SELECT * FROM tb_barang WHERE id_barang = '$id'"; 
        $hasil = $this->db->show($query);         
        return $hasil; 
    } 
 
    public function editBarang($data, $id) 
    { 
        //mengambil data dari form 
        $id_barang = $data['id_barang']; 
        $nama_barang = $data['nama_barang']; 
        $harga_beli = $data['harga_beli']; 
        $harga_jual = $data['harga_jual']; 
        $satuan_barang = $data['satuan_barang']; 
        $stok = $data['stok']; 
 
        $query = "UPDATE tb_barang SET 
        id_barang='$id_barang', 
        nama_barang='$nama_barang',          
        harga_beli='$harga_beli', 
        harga_jual='$harga_jual', 
        satuan_barang='$satuan_barang',          
        stok='$stok' WHERE id_barang='$id'"; 
 
        $hasil = $this->db->edit($query); 
         if($hasil) 
        { 
            $pesan = "Data Berhasil Diubah";             
            return $pesan; 
        }else{ 
            $pesan = "Data Gagal Diubah";             
            return $pesan; 
        } 
    } 
 
    public function hapusBarang($id) 
    { 
        $query = "DELETE FROM tb_barang WHERE id_barang='$id'"; 
        $hasil = $this->db->hapus($query); 
        if($hasil) 
        { 
            $pesan = "Data Berhasil Dihapus";             
            return $pesan; 
        }else{ 
            $pesan = "Data Gagal Dihapus";             
            return $pesan; 
        } 
    } 
} 

?>
