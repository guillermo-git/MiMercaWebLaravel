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
        Schema::create('detalle_productos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('id_producto')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_tienda')->references('id')->on('tiendas')->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_productos');
    }
};
