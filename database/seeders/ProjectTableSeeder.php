<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;
use App\Models\Type;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_project = new Project();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->name = $faker->sentence();
            $new_project->slug = Helper::generateSlug($new_project->name, Project::class);
            $new_project->start_date = $faker->date();
            $new_project->end_date = $faker->date();
            $new_project->link = $faker->url();
            $new_project->description = $faker->paragraph();
            $new_project->image = $faker->url();
            $new_project->save();
        }
    }
}
