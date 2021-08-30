<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAssignmentDateColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('subject_assignment', function (Blueprint $table) {
            $table->renameColumn('assignemnt_date', 'assignment_date');
            $table->renameColumn('assignemnt_title', 'assignment_title');
            $table->renameColumn('assignemnt_link', 'assignment_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
