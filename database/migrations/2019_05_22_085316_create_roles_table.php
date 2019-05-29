<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('author');
            $table->string('content_code');
            $table->string('type');
            $table->integer('user_id')->unsigned();
            $table->integer('listtask_id')->unsigned();
            $table->integer('task_id')->unsigned();

            $table->foreign('task_id')
            ->references('id')
            ->on('tasks')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('listtask_id')
            ->references('id')
            ->on('listtasks')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
