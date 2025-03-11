<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = 'peminjam';
    protected $primaryKey = 'id_peminjam';
    protected $fillable = [
        'nama',
        'alamat',
        'foto',
    ];

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'id_peminjam');
    }
}
