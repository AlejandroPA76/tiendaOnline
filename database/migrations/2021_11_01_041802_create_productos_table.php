<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->double('precio',8,2);
            $table->string('imagen')->nullable();
             $table->integer('stock')->unsigned();
             $table->string('consignar')->nullable();
             $table->integer('porcentaje')->nullable();
             $table->string('motivo')->nullable();
             $table->string('propietario');
            //llave foranea categoria_id pertenece a la tabla categorias
            $table->foreignId('categoria_id')
            ->constrained('categorias')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
