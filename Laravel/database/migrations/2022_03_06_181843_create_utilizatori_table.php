<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizatoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizatori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->boolean('rgarsoniera');
            $table->boolean('rapartament');
            $table->boolean('rcasa');
            $table->boolean('cgarsoniera');
            $table->boolean('capartament');
            $table->boolean('ccasa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilizatori');
    }
}
