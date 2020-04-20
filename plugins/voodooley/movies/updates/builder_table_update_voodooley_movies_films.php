<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoodooleyMoviesFilms extends Migration
{
    public function up()
    {
        Schema::table('voodooley_movies_films', function($table)
        {
            $table->string('slug')->nullable();
            $table->text('description')->default(null)->change();
            $table->integer('year')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('voodooley_movies_films', function($table)
        {
            $table->dropColumn('slug');
            $table->text('description')->default('NULL')->change();
            $table->integer('year')->default(NULL)->change();
        });
    }
}
