<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_peminjam',
        'id_sepeda',
        'tgl_pinjam',
        'tgl_pulang',
        'bayar',
        'denda',
        'jaminan',
        'status'
    ];

    public function peminjam() {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }

    public function sepeda() {
        return $this->belongsTo(Sepeda::class, 'id_sepeda');
    }
}
