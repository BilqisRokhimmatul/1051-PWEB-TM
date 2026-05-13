<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
    'kode_lapangan', 
    'nama_lapangan', 
    'email_kontak', 
    'kategori', 
    'harga_per_jam', 
    'foto_lapangan', 
    'user_id'       
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