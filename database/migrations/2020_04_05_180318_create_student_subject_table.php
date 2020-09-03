<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->string('rating')->default(0);
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
        Schema::dropIfExists('student_subject');
    }
}
