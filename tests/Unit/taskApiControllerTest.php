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
    public function testDeleteMissingTask() {
        $data = [
            'id' => 101,
        ];
        $this->delete(route('task.delete', $data))
            ->assertStatus(404);
    }

    /**
     * @return void
     */
    public function testDelete() {
        $data = [
            'id' => 9,
        ];
        $this->delete(route('task.delete', $data))
            ->assertStatus(204);
    }
}
