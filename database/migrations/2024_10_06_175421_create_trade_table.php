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
        Schema::create('trade', function (Blueprint $table) {
            $table->id();
            $table->string('t_aId', 10);
            $table->string('t_sId', 20);
            $table->string('t_cId', 10);
            $table->string('t_mId', 10);
            $table->string('t_Title', 15);
            $table->string('t_Content', 100)->nullable('');
            $table->integer('t_Money')->length(20)->unsigned();
            $table->string('t_PayDateTime', 10);
            $table->string('t_Remark', 200)->nullable('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade');
    }
};
