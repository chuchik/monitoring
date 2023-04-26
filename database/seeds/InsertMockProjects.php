<?php

use Illuminate\Database\Seeder;

class InsertMockProjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<11; $i++){
            \App\Project::create([
                'owner_id' => 1,
                'name' => "Project {{$i}}",
                'description' => "Test project N:{{$i}"
            ]);
        }
    }
}
