<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('category_id');   // FK categoría

        $table->string('name');                      // Nombre del producto
        $table->string('short_description')->nullable(); // Descripción corta
        $table->text('long_description')->nullable();    // Descripción larga

        $table->decimal('price', 10, 2);             // Precio
        $table->decimal('rating', 2, 1)->default(0); // Rating 4.5, 4.8, etc.
        $table->integer('reviews_count')->default(0);    // Número de reseñas

        $table->integer('stock')->default(0);        // Stock disponible
        $table->string('image_url')->nullable();     // Imagen del producto
        $table->boolean('is_featured')->default(false);  // Producto destacado

        $table->timestamps();

        // Clave foránea
        $table->foreign('category_id')
              ->references('id')->on('categories')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
