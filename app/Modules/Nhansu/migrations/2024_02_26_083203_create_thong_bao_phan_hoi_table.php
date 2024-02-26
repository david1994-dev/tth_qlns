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
        Schema::create('thong_bao_phan_hoi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thong_bao_id')->index();
            $table->boolean('gui_tat_ca')->default(false);
            $table->text('nguoi_nhan_ids')->nullable();
            $table->text('noi_dung')->nullable();
            $table->text('dinh_kem')->nullable();
            $table->unsignedBigInteger('nguoi_gui_id')->default(0);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_bao_phan_hoi');
    }
};
