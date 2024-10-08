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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
           
            $table->string('time');
            $table->date('date');
            $table->unsignedBigInteger('client_id');
            $table->string('status');
            $table->timestamps();
        
            $table->foreign('client_id')->references('id')->on('clients')->restrictOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
