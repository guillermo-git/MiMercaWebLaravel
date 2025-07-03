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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id();
        $table->string('nombre', 25);
        $table->foreignId('id_mercado')->references('id')->on('mercados')->onUpdate('cascade')->onDelete('cascade');
        $table->foreignId('id_responsable')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        $table->string('direccion', 255);
        $table->string('logo', 255)->nullable();
        $table->string('codigo', 255);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiendas');
    }
};
