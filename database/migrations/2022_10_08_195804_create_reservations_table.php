<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('allocation_date');
            $table->unsignedBigInteger('scooter_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('duration')->nullable();
            $table->boolean('confirmed')->default(0);
            $table->string('cin_front', 254)->nullable();
            $table->string('cin_back', 254)->nullable();
            $table->string('user_tel', 255);

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
        Schema::dropIfExists('reservations');
    }
};
