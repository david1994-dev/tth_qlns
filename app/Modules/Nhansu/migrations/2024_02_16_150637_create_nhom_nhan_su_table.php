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
        Schema::create('nhansu_nhom', function (Blueprint $table) {
            $table->id();
            $table->string('ma')->unique()->index();
            $table->string('ten');
            $table->string('slug');
            $table->text('user_ids');
            $table->unsignedBigInteger('nguoi_cap_nhat_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhansu_nhom');
    }
};
