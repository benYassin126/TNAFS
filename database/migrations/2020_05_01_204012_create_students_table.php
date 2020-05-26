<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('StudentName');
            $table->unsignedInteger('StudentGroup');
            $table->unsignedInteger('StudentSuper');
            $table->float('StudentPoints');
            $table->timestamps();


            $table->foreign('StudentSuper')
            ->references('id')
            ->on('users')
            ->delete('RESTRICT');

            $table->foreign('StudentGroup')
            ->references('id')
            ->on('groups')
            ->delete('RESTRICT');


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
}
