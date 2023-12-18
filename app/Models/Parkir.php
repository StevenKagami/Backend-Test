<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $fillable = ['kode_unik', 'nomor_polisi', 'waktu_masuk', 'waktu_keluar'];
}

