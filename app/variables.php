<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class variables extends Model
{
    /**
     * @var string
     */
    protected $table = 'variables';

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
}
