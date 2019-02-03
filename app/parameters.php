<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parameters extends Model
{
    /**
     * @var string
     */
    protected $table = 'parameters';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function commands() {
        return $this->belongsToMany(
            commands::class,
            'commands_parameters',
            'id',
            'commandsId'
        )->withTimestamps();
    }
}
