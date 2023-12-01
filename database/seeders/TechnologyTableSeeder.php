<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use illuminate\Support\Str;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = ['HTML', 'CSS', 'JavaScript', 'Vue.js', 'Node.js', 'Laravel', 'MySQL', 'Git'];
        foreach ($tecnologies as $tecnology) {
            $new_tecnology = new Technology();
            $new_tecnology->name = $tecnology;
            $new_tecnology->slug = Str::slug($tecnology, '-');
            $new_tecnology->save();
        }
    }
}
