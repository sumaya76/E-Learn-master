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
        Schema::create('paidcourses', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('link')->nullable();
            
            $table->double('price');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('status')->default('active');
           
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paidcourses');
    }
};
