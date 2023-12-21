<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Modules\Nhansu\src\Models\PhongBan;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    use softDeletes;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phongban', function (Blueprint $table) {
            $table->id();
            $table->string('ma')->unique()->nullable();
            $table->string('ten');
            $table->unsignedBigInteger('chi_nhanh_id');
            $table->unsignedBigInteger('nguoi_cap_nhat_id');
            $table->integer('dinhBien')->default(0);
            $table->integer('sapXep')->default(0);
            $table->tinyInteger('trangThai')->nullable();
            $table->tinyInteger('loai')->default(PhongBan::LOAI_CHUYEN_MON);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phongban');
    }
};
