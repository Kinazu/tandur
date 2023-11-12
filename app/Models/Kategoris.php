<?php

namespace App\Models;

use App\Models\Tanamen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoris extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategoris'
    ];

    //Relasi Many to One
    protected $table = 'kategoris';
 //tiap kategori = byk tanaman  
 public function tanamen()
    {
        return $this->hasMany(Tanamen::class);
    }

}