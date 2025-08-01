<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin'); 
            $table->unsignedBigInteger('destination'); 
            $table->integer('weight'); 
            $table->integer('cost'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_costs');
    }
};
