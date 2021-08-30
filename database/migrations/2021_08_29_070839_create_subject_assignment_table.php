<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_assignment', function (Blueprint $table) {
            $table->id();
            $table->string('subjectUuid');
            $table->string('assignemnt_title');
            $table->dateTime('assignemnt_date');
            $table->string('assignemnt_link');
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
        Schema::dropIfExists('subject_assignment');
    }
}
