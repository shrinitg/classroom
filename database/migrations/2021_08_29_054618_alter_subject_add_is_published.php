<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubjectAddIsPublished extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('subject', function (Blueprint $table) {
            $table->integer('isPublished')->default(0)->comment('0.Not Published 1.Published')->after('name');
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
        Schema::create('subject', function (Blueprint $table) {
            $table->dropColumn('isPublished');
        });
    }
}
