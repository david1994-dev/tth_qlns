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
            $table->string('ho_ten');
            $table->string('image')->nullable();
            $table->string('email')->unique()->index();
            $table->string('dien_thoai')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('email_cong_viec')->unique()->index()->nullable();
            $table->tinyInteger('gioi_tinh')->default(NhanVien::GIOI_TINH_NU);
            $table->date('ngay_sinh');
            $table->date('ngay_bat_dau_lam_viec')->nullable();
            $table->date('ngay_ket_thuc_lam_viec')->nullable();
            $table->unsignedBigInteger('chi_nhanh_id')->nullable();
            $table->unsignedBigInteger('vi_tri_cong_viec_id')->nullable();
            $table->unsignedBigInteger('phong_ban_id')->nullable();
            $table->text('chi_tiet')->nullable();
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
