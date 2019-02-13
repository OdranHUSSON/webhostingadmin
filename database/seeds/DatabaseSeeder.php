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
        $nbToGenerate = 100;

        factory(App\User::class, $nbToGenerate)->create();

        factory(App\tasks::class, $nbToGenerate)->create();

        $commands = factory(App\commands::class, $nbToGenerate)->create();

        App\tasks::all()->each(function ($task) use ($commands,$nbToGenerate){
            $tmp = rand(0,4);
            $i=0;
            $ids = [];
            while($i <= $tmp) {
                $ids[] = rand(0, $nbToGenerate);
                $i++;
            }
            try {
                /** @var \App\tasks $task */
                $task->commands()->attach($ids);
            }
            catch(Exception $e) {
                // If we try to attach something already attached to this command
                // This is ugly but this is for testing purpose
            }
        });
    }
}
