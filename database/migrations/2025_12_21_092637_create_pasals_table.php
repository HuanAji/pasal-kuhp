<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasals', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pasal');
            $table->longText('isi_pasal');
            $table->date('tanggal_berlaku');
            $table->foreignId('pasal_category_id')->constrained('pasal_categories')->cascadeOnDelete();
            $table->string('status_pasal'); // Enum: berlaku, kadaluwarsa, berubah, uji_coba
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasals');
    }
};