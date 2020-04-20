<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_movies_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('movie_id');
            $table->integer('genre_id');
            $table->primary(['movie_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_movies_genres');
    }
}
