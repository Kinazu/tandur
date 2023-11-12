<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupuks extends Model
{
    use HasFactory;

    protected $fillable = [
        'pupuk',
        'jumlah',
        'harga',
        'total',
        'catatan',
        'created_at',
        'updated_at'
    ];

    protected $table = 'pupuks';

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