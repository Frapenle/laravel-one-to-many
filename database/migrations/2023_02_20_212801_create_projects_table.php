<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            /**
             * 1 proj name
             * 2 proj decription
             * 3 created
             * 4 last update
             * 5 proj_preview
             * 6 authors
             * 7 licence
             * 8 language
             * 9 frameworks
             * 10 github url
             * 
             */
            $table->id();
            $table->string('name', 25)->unique();
            $table->text('description', 1000)->nullable();
            $table->date('start_date');
            $table->datetime('update')->nullable();
            $table->string('preview', 255)->nullable();
            $table->string('authors', 255);
            $table->string('license', 255)->nullable();
            $table->string('program_lang', 100)->nullable();
            $table->string('frameworks', 100)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
