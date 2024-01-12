<?php

use App\Modules\Nhansu\src\Models\ChiNhanh;
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
        Schema::create('chi_nhanh', function (Blueprint $table) {
            $table->id();
            $table->string('ma')->unique()->nullable();
            $table->string('ten')->unique();
            $table->string('slug')->unique();
            $table->tinyInteger('trang_thai')->default(ChiNhanh::TRANGTHAI_DANG_HOAT_DONG);
            $table->unsignedBigInteger('nguoi_cap_nhat_id')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_nhanh');
    }
};
 