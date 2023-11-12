<?php

namespace App\Models;

use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alats extends Model
{
    use HasFactory;

    protected $fillable = [
        'alat',
        'jumlah',
        'harga',
        'total',
        'catatan',
        'created_at',
        'updated_at'
    ];

    protected $table = 'alats';

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