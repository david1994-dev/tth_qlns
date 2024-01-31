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
            $table->unsignedBigInteger('receive_id')->index()->default(0);
            $table->tinyInteger('type')->index()->default(\App\Modules\Nhansu\src\Models\ThongBao::TYPE_CONG_VAN);
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('images')->nullable();
            $table->unsignedBigInteger('creator_id')->default(0);
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
