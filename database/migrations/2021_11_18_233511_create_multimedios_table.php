<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedios', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
           // $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreignId('productos_id')
            ->constrained('productos')
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
        Schema::dropIfExists('multimedios');
    }
}
