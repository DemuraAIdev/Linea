<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // table customer foreign key id to user id
            $table->unsignedBigInteger('customer');
            $table->foreign('customer')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('spot_id');
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on(
                'statuses'
            )->onDelete('cascade');
            $table->integer('person');
            $table->integer('bill');
            $table->date('date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
