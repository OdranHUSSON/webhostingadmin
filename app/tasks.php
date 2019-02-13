<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function commands() {
        return $this->belongsToMany(
            commands::class,
            'tasks_commands',
            'id',
            'commandsId'
        )->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function variables() {
        return $this->belongsToMany(
            variables::class,
            'tasks_variables',
            'id',
            'variablesId'
        )->withTimestamps();
    }
}

