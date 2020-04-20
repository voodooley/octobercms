<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoodooleyMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('voodooley_movies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voodooley_movies_actors');
    }
}
