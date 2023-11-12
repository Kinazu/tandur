<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\kategoris;
use App\Models\Bibits;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tanamen', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 30);
            $table->foreignIdFor(Bibits::class)->constrained();
            $table->foreignIdFor(kategoris::class)->constrained();
            $table->text('deskripsi');
            $table->date('tanam')->nullable();
            $table->date('panen')->nullable();
            $table->string('beli')->nullable();
            $table->string('jual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanamen');
    }
};