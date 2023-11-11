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
        Schema::create('shop', function (Blueprint $table) {
            $table->id()->index();
            $table->string('shop_name')->index()->unique();
            $table->string('shop_number', 11);
            $table->string('shop_email')->nullable();
            $table->string('shop_access')->default('on');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shop');
    }
};
