<?php

namespace App\Models;

use App\Models\Bibits;
use App\Models\Pemasukan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanamen extends Model
{
    use HasFactory;
protected $fillable = [
    'nama',
    'kategoris_id',
    'bibits_id',
    'deskripsi',
    'tanam',
    'panen',
    'beli',
    'jual',
    'created_at',
    'updated_at'
];

//Relasi One to One 
protected $table = 'tanamen';

public $timestamp = true ;

//Relasi setiap tanaman = 1 kategori
public function kategoris()
{
    return $this->belongsTo(kategoris::class);
}

//Relasi setiap tanaman = 1 bibit
public function bibits()
{
    return $this->belongsTo(Bibits::class);
}

public function pemasukan()
{
    return $this->hasOne(Pemasukan::class);
}

}