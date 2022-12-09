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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('batch')->nullable();
            $table->integer('class')->nullable();
            $table->integer('bangla');
            $table->integer('bangla_2nd');
            $table->integer('english');
            $table->integer('english_2nd');
            $table->integer('math');
            $table->integer('islam');
            $table->integer('bgs');
            $table->integer('science');
            $table->integer('ict');
            $table->integer('total');
            $table->integer('gpa');
            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('subjects');
    }
};
