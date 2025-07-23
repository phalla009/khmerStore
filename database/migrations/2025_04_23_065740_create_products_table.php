<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->tinyInteger('categories_id')->unsigned();
            $table->string('product_name', 191)->unique();  
            $table->double('price');
            $table->unsignedInteger('quantity');
            $table->unsignedTinyInteger('warranty');
            $table->text('description');
            $table->timestamps();
            // $table->foreign('categories_id')
            // ->references('id')
            // ->on('categories')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
