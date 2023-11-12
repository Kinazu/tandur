<?php

use App\Models\Alats;
use App\Models\Bibits;
use App\Models\Pupuks;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengeluaran');
            $table->string('jumlah');
            $table->foreignIdFor(Bibits::class)->constrained();
            // $table->foreignIdFor(Pupuks::class)->constrained();
            // $table->foreignIdFor(Alats::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};