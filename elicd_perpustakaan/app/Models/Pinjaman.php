<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{

    public function buku(){
        return $this->belongsTo('App\Models\Buku');
    }
}

