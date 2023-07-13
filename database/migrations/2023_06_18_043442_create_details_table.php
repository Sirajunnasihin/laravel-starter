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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique()->nullable();
            $table->string('no_kk')->nullable();
            $table->string('name');
            $table->string('place_of_birth', 30);
            $table->date('date_of_birth');
            $table->string('gender');
            $table->integer('religion');
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->string('village');
            $table->string('address');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('period');
            $table->integer('faculty');
            $table->integer('major');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
