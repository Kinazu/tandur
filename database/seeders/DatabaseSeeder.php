<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory()->times(100)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'type' => '1',
            'umur' => '17',
            'alamat' => 'Depok',
            'notelp' => '085239142',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Marvel',
            'email' => 'marvel@gmail.com',
            'password' => 'marvel',
            'type' => '2',
            'umur' => '24',
            'alamat' => 'Bogor',
            'notelp' => '081294125',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Azka',
            'email' => 'azka@gmail.com',
            'password' => 'azka',
            'type' => '0',
            'umur' => '30',
            'alamat' => 'Jaktim',
            'notelp' => '089421512',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $this->command->info('Users berhasil ditambahkan');
        
        $this->call(RelasiSeeder::class);
        
        $this->command->info('RelasiSeeder berhasil ditambahkan');
    }
}