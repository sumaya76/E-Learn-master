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
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('paidcourses_id')->constrained('paidcourses');
            $table->double('total_price')->default(0.0);
            $table->string('payment_method')->default('cod');
            $table->string('address')->nullable();
            $table->string('transaction_id')->unique();
            $table->string('payment_status')->nullable();
            $table->string('status')->default('pending');
           
            $table->string('name');
            $table->string('username');
            $table->integer('nid');
            $table->string('phone_number');
            $table->string('email');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};
