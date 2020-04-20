<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesActorsMovies extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_actors_movies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('movie_id')->unsigned();
            $table->integer('actor_id')->unsigned();
            $table->primary(['movie_id','actor_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_actors_movies');
    }
}
