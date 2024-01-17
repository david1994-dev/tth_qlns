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
        Schema::create('nhanvien_chitiet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhan_vien_id')->index();
            $table->string('que_quan')->nullable();
            $table->string('dan_toc')->nullable();
            $table->string('ton_giao')->nullable();
            $table->string('dia_chi_thuong_tru')->nullable();
            $table->string('dia_chi_tam_tru')->nullable();
            $table->string('ma_so_thue')->nullable();
            $table->string('dien_thoai_ca_nhan')->nullable();
            $table->tinyInteger('tinh_trang_hon_nhan')->default(1);
            $table->string('email_phu')->nullable();
            $table->date('ngay_bat_dau_lam_viec');
            $table->date('ngay_ket_thuc_lam_viec')->nullable();
            $table->date('ngay_thuc_te_lam_viec')->nullable();
            $table->string('cmnd');
            $table->date('ngay_cap_cmnd');
            $table->string('noi_cap_cmnd');
            $table->tinyInteger('trinh_do_chuyen_mon')->nullable();
            $table->string('so_cchn')->nullable();
            $table->string('bo_sung_pham_vi_cm')->nullable();
            $table->date('ngay_cap_cchn')->nullable();
            $table->string('dang_ki_hanh_nghe_hien_tai')->nullable();
            $table->string('bien_oto')->nullable();
            $table->string('bien_xe_may')->nullable();
            $table->string('size_quan')->nullable();
            $table->string('size_ao')->nullable();
            $table->string('size_giay_dep')->nullable();
            $table->string('bang_lai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien_chitiet');
    }
};
