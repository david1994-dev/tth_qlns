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
            $table->string('ma')->unique()->index();
            $table->string('hoTen');
            $table->string('image')->nullable();
            $table->string('email')->unique()->index();
            $table->string('dienThoai')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('emailCongViec')->unique()->index()->nullable();
            $table->tinyInteger('gioiTinh')->default(NhanVien::GIOI_TINH_NU);
            $table->date('ngaySinh');
            $table->date('ngayBatDauLamViec')->nullable();
            $table->date('ngayKetThucLamViec')->nullable();
            $table->unsignedBigInteger('chi_nhanh_id')->nullable();
            $table->unsignedBigInteger('vi_tri_cong_viec_id')->nullable();
            $table->unsignedBigInteger('phong_ban_id')->nullable();
            $table->text('chiTiet')->nullable();
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
