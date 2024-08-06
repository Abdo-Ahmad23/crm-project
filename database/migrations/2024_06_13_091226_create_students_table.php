<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('phone');

            $table->string('level');

            $table->date('dateofbirth');

            $table->string('address');

            $table->unsignedBigInteger('classroom_id');

            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->string('image');

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
        Schema::dropIfExists('students');
    }
};
