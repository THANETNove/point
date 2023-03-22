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
        Schema::create('bank_name_users', function (Blueprint $table) {
            $table->id();
            $table->string('iduser')->nullable();
            $table->string('bank_user')->nullable();
            $table->string('bank_numbar_user')->nullable();
            $table->string('bank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_name_users');
    }
};