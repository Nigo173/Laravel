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
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('m_Id', 10);
            $table->string('m_IdCard', 10);
            $table->string('m_Name', 20);
            $table->string('m_Birthday', 10)->nullable('');
            $table->string('m_Address', 50)->nullable('');
            $table->string('m_Email', 30)->nullable('');
            $table->string('m_Phone', 20)->nullable('');
            $table->longText('m_Photo')->nullable();
            $table->string('m_Remark', 200)->nullable('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
