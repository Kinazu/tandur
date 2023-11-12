<?php

namespace App\Models;

use App\Models\Tanamen;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibits extends Model
{
    use HasFactory;

    protected $fillable = [
        'bibit',
        'jumlah',
        'harga',
        'total',
        'catatan',
        'created_at',
        'updated_at'
    ];

    protected $table = 'bibits';

    public function tanamen() 
    {
        return $this->hasOne(Tanamen::class);
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }

    /**
     * Summary of total
     * @return float|int
     */
    public function total() {
        return $this->jumlah * $this->harga;
    }
}