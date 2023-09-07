<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
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
    public function run(): void
    {
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
        }
    }
}
