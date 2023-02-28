<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * $table->string('name', 20)->unique();
            $table->text('description', 1000);
            $table->date('start_date');
            $table->datetime('update');
            $table->string('preview', 255);
            $table->string('authors', 255);
            $table->string('licence', 255)->nullable();
            $table->string('program_lang', 100)->nullable();
            $table->string('frameworks', 100)->nullable();
            $table->string('github_url', 255)->nullable();
         */
        //faker 
        $a = 0;
        while ($a <= 10) {
            Project::create([
                'name' => fake()->unique()->name(),
                'type_id' => Type::inRandomOrder()->first()->id,
                'description' => fake()->text(1000),
                'start_date' => fake()->dateTime(),
                'update' => fake()->dateTime(),
                'preview' => 'placeholder-300x300.jpeg',
                'authors' => fake()->name(),
                'license' => fake()->randomElement(['Open Source', 'Creative Commons', 'Shareware', 'Freeware', null]),
                'program_lang' => fake()->randomElement(['PHP', 'JavaScript', 'Python', 'C', 'Java', 'C++', 'Ruby', 'Swift', 'Rust', 'Kotlin', 'Go', null]),
                'frameworks' => fake()->randomElement(['Laravel', 'React', 'Django', 'Flask', 'VueJs', 'Angular', 'Bootstrap', null]),
                'github_url' => fake()->url(),
            ]);
            $a++;
        }
    }
}
