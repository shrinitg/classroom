<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDatetimeToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_test', function (Blueprint $table) {
            $table->string('test_date')->change();
        });
        Schema::table('subject_classes', function (Blueprint $table) {
            $table->string('class_date')->change();
        });
        Schema::table('subject_assignment', function (Blueprint $table) {
            $table->string('assignemnt_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('string', function (Blueprint $table) {
            //
        });
    }
}
