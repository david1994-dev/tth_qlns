<?php

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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->string('manv')->unique()->index();
            $table->string('hoten');
            $table->string('image')->nullable();
            $table->string('email')->unique()->index();
            $table->unsignedBigInteger('chinhanh_id')->nullable();
            $table->unsignedBigInteger('phongban_id')->nullable();
            $table->unsignedBigInteger('vitricongviec_id')->nullable();
            $table->unsignedBigInteger('phongban_id_them')->nullable();
            $table->text('chitiet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
    }
};
