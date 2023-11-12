<?php

namespace App\Models;

use App\Models\Tanamen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pemasukan',
        'jumlah',
        'tanamen_id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'pemasukans';

    public function tanamen() 
    {
        return $this->belongsTo(Tanamen::class);
    }
}