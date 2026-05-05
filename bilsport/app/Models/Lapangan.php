<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'kode_lapangan', 'nama_lapangan', 'kategori', 'lokasi', 'harga_per_jam', 'is_available'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTersedia($query)
    {
        return $query->where('is_available', true);
    }
}