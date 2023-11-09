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
        Schema::create('customer', function (Blueprint $table) {
            $table->id()->index();
            $table->string('customer_name')->index();
            $table->string('customer_phone', 12);
            $table->string('customer_email', 100);
            $table->string('customer_address', 250);
            $table->string('customer_city', 250);
            $table->string('customer_province', 250);
            $table->string('customer_shop', 100)->index();
            $table->foreign('customer_shop', 250)->references('shop_name')->on('shop')->onDelete('cascade')->onUpdate('cascade');
            $table->string('submit_date', 250);
            $table->string('submit_time', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
