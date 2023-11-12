<?php

namespace Database\Seeders;

use App\Models\kategoris;
use App\Models\Tanamen;
use App\Models\Alats;
use App\Models\Bibits;
use App\Models\Pupuks;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
       $kentang = Bibits::create([
        'bibit' => 'Kentang',
        'jumlah' => '10',
        'harga' => '30000',
        'total' => '300000'
        ]);

        $padi = Bibits::create([
            'bibit' => 'Padi',
            'jumlah' => '64',
            'harga' => '5000',
            'total' => '320000'
        ]);

       $kubis = Bibits::create([
            'bibit' => 'Kubis',
            'jumlah' => '40',
            'harga' => '20000',
            'total' => '800000'
        ]);

       $jahe = Bibits::create([
                'bibit' => 'Jahe',
                'jumlah' => '20',
                'harga' => '10000',
                'total' => '200000'
        ]);

        $urea = Pupuks::create([
            'pupuk' => 'Urea',
            'jumlah' => '25',
            'harga' => '40000',
            'total' => '1000000'
            ]);

        $cangkul = Alats::create([
            'alat' => 'Cangkul',
            'jumlah' => '40',
            'harga' => '10000',
            'total' => '400000'
            ]);

        //tabel kategoris
        $sayur = Kategoris::create([
                'kategori' => 'Sayuran',
                'updated_at' => now(),
                'created_at' => now()
            ]);
    
        $umbi = Kategoris::create([
                'kategori' => 'Umbi',
                'updated_at' => now(),
                'created_at' => now()
            ]);
    
        $serealia = Kategoris::create([
                'kategori' => 'Serealia',
                'updated_at' => now(),
                'created_at' => now()
            ]);
    
        $rempah = Kategoris::create([
                'kategori' => 'Rempah',
                'updated_at' => now(),
                'created_at' => now()
            ]);
            
            //tabel tanaman
    Tanamen::create([
            'nama' => 'Kentang',
            'bibits_id' => $kentang->id,
            'kategoris_id' => $umbi->id,
            'deskripsi' => 'Tanaman Umbi Batang',
            'tanam' => '2023-09-24',
            'panen' => '2023-12-24',
            'updated_at' => now(),
            'created_at' => now()
        ]);

    Tanamen::create([
            'nama' => 'Padi',
            'bibits_id' => $padi->id,
            'kategoris_id' => $serealia->id,
            'deskripsi' => 'Tanaman biji bijian',
            'tanam' => '2023-09-24',
            'panen' => '2023-12-24',
            'updated_at' => now(),
            'created_at' => now(),
        ]);

    Tanamen::create([
            'nama' => 'Kubis',
            'bibits_id' => $kubis->id,
            'kategoris_id' => $sayur->id,
            'deskripsi' => 'Tanaman Cole',
            'tanam' => '2023-09-24',
            'panen' => '2023-12-24',
            'updated_at' => now(),
            'created_at' => now()
        ]);

    Tanamen::create([
            'nama' => 'Jahe',
            'bibits_id' => $jahe->id,
            'kategoris_id' => $rempah->id,
            'deskripsi' => 'Rempah rempah',
            'tanam' => '2023-09-24',
            'panen' => '2023-12-24',
            'updated_at' => now(),
            'created_at' => now()
        ]);

    Pemasukan::create([
        'tgl_pemasukan'=> '2022-11-08',
        'jumlah' => '300000',
        'bibits_id' => $jahe->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    Pemasukan::create([
        'tgl_pemasukan'=>'2023-09-30',
        'jumlah' => '450000',
        'bibits_id' => $kentang->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    Pemasukan::create([
        'tgl_pemasukan'=>'2023-10-01',
        'jumlah' => '2000000',
        'bibits_id' => $padi->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    
    Pemasukan::create([
        'tgl_pemasukan'=>'2023-10-21',
        'jumlah' => '2000000',
        'bibits_id' => $padi->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    Pengeluaran::create([
        'tgl_pengeluaran'=>'2023-10-21',
        'jumlah' => '500000',
        'bibits_id' => $jahe->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    Pengeluaran::create([
        'tgl_pengeluaran'=>'2023-10-01',
        'jumlah' => '100000',
        'bibits_id' => $kentang->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    Pengeluaran::create([
        'tgl_pengeluaran'=>'2023-09-24',
        'jumlah' => '24000000',
        'bibits_id' => $padi->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

        $this->command->info('Data Tanaman dan Kategoris telah diisi');

    }
}