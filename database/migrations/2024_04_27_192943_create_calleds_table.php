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
        Schema::create('calleds', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categories')->unsigned();
            $table->integer('id_situation')->unsigned();
            $table->foreign('id_categories')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_situation')->references('id')->on('situation')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('description');
            $table->date('situation_term');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calleds');
    }
};
