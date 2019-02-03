<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('commands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('command');
            $table->timestamps();
        });

        Schema::create('tasks_commands', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tasksId')->nullable();
            $table->foreign('tasksId')->references('id')->on('tasks');
            $table->unsignedInteger('commandsId')->nullable();
            $table->foreign('commandsId')->references('id')->on('commands');
            $table->timestamps();
        });

        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('required')->default(true);
            $table->string('default')->nullable();
            $table->timestamps();
        });

        Schema::create('commands_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('commandsId')->nullable();
            $table->foreign('commandsId')->references('id')->on('commands');
            $table->unsignedInteger('parametersId')->nullable();
            $table->foreign('parametersId')->references('id')->on('parameters');
            $table->timestamps();
        });

        Schema::create('values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('variables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('tasks_variables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tasksId')->nullable();
            $table->foreign('tasksId')->references('id')->on('tasks');
            $table->unsignedInteger('variablesId')->nullable();
            $table->foreign('variablesId')->references('id')->on('variables');
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
        Schema::dropIfExists('tasks_parameters');
        Schema::dropIfExists('tasks_commands');
        Schema::dropIfExists('tasks_variables');
        Schema::dropIfExists('commands');
        Schema::dropIfExists('parameters');
        Schema::dropIfExists('variables');
        Schema::dropIfExists('values');
        Schema::dropIfExists('tasks');
    }
}
