<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CustomerId');
            $table->string('RoomNo');
            $table->string('Members');
            $table->string('Status');
            $table->string('CheckInDate');
            $table->string('CheckOutDate')->nullable();
            $table->string('StayDuration');
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
        Schema::dropIfExists('hotel_bookings');
    }
}
