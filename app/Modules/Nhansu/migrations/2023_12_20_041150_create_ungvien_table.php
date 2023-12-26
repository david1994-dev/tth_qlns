<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    use softDeletes;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ungvien', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->date('ngay_sinh');
            $table->string('dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->string('dia_chi')->nullable();
            $table->text('qua_trinh_lam_viec')->nullable();
            $table->string('vi_tri_ung_tuyen');
            $table->text('don_vi_ung_tuyen');
            $table->tinyInteger('loai_ung_vien')->default(\App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_BAC_SI);
            $table->dateTime('ngay_ky')->nullable();
            $table->longText('chi_tiet')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ungvien');
    }
};
