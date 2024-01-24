<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Modules\Nhansu\src\Models\NhanVien;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('ma')->unique()->index()->nullable();
            $table->string('ho_ten')->nullable();
            $table->string('email')->unique()->index()->nullable();
            $table->string('dien_thoai_cong_viec')->nullable();
            $table->tinyInteger('gioi_tinh')->default(NhanVien::GIOI_TINH_NU);
            $table->unsignedBigInteger('loai_nhan_vien_id')->default(0)->index();
            $table->date('ngay_sinh')->nullable();
            $table->unsignedBigInteger('chi_nhanh_id')->index();
            $table->unsignedBigInteger('phong_ban_id')->index();
            $table->timestamps();

            $table->softDeletes();
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
