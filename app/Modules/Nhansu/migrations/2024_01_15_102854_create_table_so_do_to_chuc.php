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
        Schema::create('so_do_to_chuc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phong_ban_id')->index();
            $table->unsignedBigInteger('chi_nhanh_id')->index();
            $table->string('ma_vi_tri');
            $table->unsignedBigInteger('parent_id')->default(0)->index();
            $table->unsignedBigInteger('nguoi_cap_nhat_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('so_do_to_chuc');
    }
};
