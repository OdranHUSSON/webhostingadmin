<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\tasks;

class taskApiControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanPersist() {
        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,

        ];
        $this->post(route('task.post', $data))
            ->assertStatus(201)
            ->assertJsonFragment($data);
    }

    /**
     * @return void
     */
    public function testCanDelete() {
        $data = [
            'id' => 9,
        ];
        $this->delete(route('task.delete', $data))
            ->assertStatus(204)
            ->assertJsonFragment($data);
    }
}
