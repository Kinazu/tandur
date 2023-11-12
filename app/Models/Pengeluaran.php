<?php

namespace App\Models;

use App\Models\Alats;
use App\Models\Bibits;
use App\Models\Pupuks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pengeluaran',
        'jumlah',
        'bibits_id',
        'pupuks_id',
        'alats_id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'pengeluarans';

    public function bibits() 
    {
        return $this->belongsTo(Bibits::class);
    }
    public function pupuks() 
    {
        return $this->belongsTo(Pupuks::class);
    }
    public function alats() 
    {
        return $this->belongsTo(Alats::class);
    }
}