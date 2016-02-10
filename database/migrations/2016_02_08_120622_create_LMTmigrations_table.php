<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLMTMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LMTmigrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('migration_name');
            $table->string('folder_name');
            $table->string('table_name');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('LMTmigrations');
    }
}
