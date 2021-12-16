<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoVendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_vendedors', function (Blueprint $table) {
            $table->id();
            $table->double('monto');
            $table->string('status');
            $table->string('nota');
            $table->timestamps();

            $table->foreignId('user_id')
            ->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_vendedors');
    }
}
