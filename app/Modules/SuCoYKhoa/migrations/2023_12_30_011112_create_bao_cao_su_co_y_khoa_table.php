<?php

use App\Modules\SuCoYKhoa\src\Models\BaoCaoSuCoYKhoa;
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
        Schema::create('bao_cao_su_co_y_khoa', function (Blueprint $table) {
            $table->id();
            $table->string('ma')->nullable()->index();
            $table->tinyInteger('status')->default(BaoCaoSuCoYKhoa::STATUS_UNDER_REVIEW);
            $table->string('ho_ten_nguoi_benh')->nullable();
            $table->string('ho_ten_nguoi_bao_cao')->nullable();
            $table->string('muc_do', 2)->nullable();
            $table->date('ngay_bao_cao')->nullable();
            $table->dateTime('ngay_su_co')->nullable();
            $table->unsignedBigInteger('khoa_phong_ban_id')->index()->nullable();
            $table->unsignedBigInteger('chi_nhanh_id')->index()->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('de_xuat_giai_phap')->nullable();
            $table->text('giai_phap_da_thuc_hien')->nullable();
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
        Schema::dropIfExists('bao_cao_su_co_y_khoa');
    }
};
