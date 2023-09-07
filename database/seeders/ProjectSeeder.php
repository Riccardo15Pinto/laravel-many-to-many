<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $tech_ids = Technology::pluck('id')->toArray();

        Storage::makeDirectory('project_images');
        $data = config('project');
        $type_ids = Type::pluck('id')->toArray();
        foreach ($data as $item) {

            $project = new Project();
            $project->name_project = $item['name_project'];
            $project->type_id = Arr::random($type_ids);
            $project->slug = Str::slug($item['name_project'], '-');
            $project->url_project = $item['url_project'];
            $project->description_project = $item['description_project'];
            $project->image = $item['image'];

            $project->save();

            $project_tech = [];
            foreach ($tech_ids as $tech_id) {
                if ($faker->boolean()) $project_tech[] = $tech_id;
            }

            $project->technologys()->attach($project_tech);
        }
    }
}
