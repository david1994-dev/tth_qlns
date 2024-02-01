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
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('tieu_de');
            $table->boolean('gui_tat_ca')->index()->default(false);
            $table->text('chi_nhanh_ids')->index()->nullable();
            $table->text('phong_ban_ids')->index()->nullable();
            $table->text('nhom_nguoi_nhan_ids')->index()->nullable();
            $table->text('nguoi_nhan_ids')->index()->nullable();

            $table->unsignedBigInteger('loai_thong_bao')->index()->default(0);
            $table->tinyInteger('muc_do')->default(\App\Modules\Nhansu\src\Models\ThongBao::MUC_DO_BINH_THUONG);
            $table->text('noi_dung')->nullable();
            $table->text('dinh_kem')->nullable();
            $table->boolean('xuat_ban')->default(false);
            $table->unsignedBigInteger('nguoi_gui_id')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_bao');
    }
};
