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
        Schema::create('lista_detalles', function (Blueprint $table) {
            $table->id();
        $table->foreignId('id_cotiz')->references('id')->on('listas')->onUpdate('cascade')->onDelete('cascade');
        $table->foreignId('id_det_product')->references('id')->on('detalle_productos')->onUpdate('cascade')->onDelete('cascade');
    
        $table->integer('cantidad');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_detalles');
    }
};
