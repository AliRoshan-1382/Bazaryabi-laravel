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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 100);
            $table->string('customer_id', 250);
            $table->string('customer_phone', 12);

            $table->string('customer_shop', 100)->index();
            $table->foreign('customer_shop')->references('shop_name')->on('shop')->onDelete('cascade')->onUpdate('cascade');

            $table->string('customer_email', 100);
            $table->string('report_text', 15000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
