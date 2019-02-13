<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();

        factory(App\tasks::class, 10)->create();

        $commands = factory(App\commands::class, 10)->create();

        App\tasks::all()->each(function ($task) use ($commands){
            $tmp = rand(0,4);
            $i=0;
            $commands = [];
            while($i <= $tmp) {
                $commands[] = \App\commands::find(rand(0,10));
                $i++;
            }

            /** @var \App\tasks $task */
            $task->commands()->sync($commands);
        });
    }
}
