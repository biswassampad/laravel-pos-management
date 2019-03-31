<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orderno');
            $table->string('name');
            $table->string('tableno');
            $table->string('members');
            $table->string('mobileno');
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
        Schema::dropIfExists('resorders');
    }
}
