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
        Schema::create('unpaidcourses', function (Blueprint $table) {
            $table->id();//id
            $table->string('name',100);//mandatory--fashion,home and decor
            $table->string('status',10)->default('active'); //madatory---active or inactive - 255(247)
            $table->text('description')->nullable();//optional----
            $table->timestamps();//created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unpaidcourses');
    }
};
