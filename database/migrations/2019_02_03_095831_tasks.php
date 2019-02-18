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
            $table->unsignedInteger('tasks_id')->nullable();
            $table->foreign('tasks_id')->references('id')->on('tasks')->onDelete('cascade');;
            $table->unsignedInteger('commands_id')->nullable();
            $table->foreign('commands_id')->references('id')->on('commands')->onDelete('cascade');;
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
            $table->unsignedInteger('commands_id')->nullable();
            $table->foreign('commands_id')->references('id')->on('commands');
            $table->unsignedInteger('parameters_id')->nullable();
            $table->foreign('parameters_id')->references('id')->on('parameters');
            $table->string('value')->nullable();
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
            $table->unsignedInteger('tasks_id')->nullable();
            $table->foreign('tasks_id')->references('id')->on('tasks');
            $table->unsignedInteger('variables_id')->nullable();
            $table->foreign('variables_id')->references('id')->on('variables');
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
        Schema::dropIfExists('commands_parameters');
        Schema::dropIfExists('tasks_commands');
        Schema::dropIfExists('tasks_variables');
        Schema::dropIfExists('commands');
        Schema::dropIfExists('parameters');
        Schema::dropIfExists('variables');
        Schema::dropIfExists('tasks');
    }
}
