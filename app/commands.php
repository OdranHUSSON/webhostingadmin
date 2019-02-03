<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commands extends Model
{
    /**
     * @var string
     */
    protected $table = 'commands';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasks() {
        return $this->belongsToMany(
            tasks::class,
            'tasks_commands',
            'id',
            'tasksId'
        )->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function parameters() {
        return $this->belongsToMany(
            parameters::class,
            'commands_parameters',
            'id',
            'parametersId'
        )->withTimestamps();
    }
}