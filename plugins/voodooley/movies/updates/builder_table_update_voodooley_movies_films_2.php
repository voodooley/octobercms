<?php namespace Voodooley\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoodooleyMoviesFilms2 extends Migration
{
    public function up()
    {
        Schema::table('voodooley_movies_films', function($table)
        {
            $table->text('actors')->nullable();
            $table->text('description')->default(null)->change();
            $table->integer('year')->default(null)->change();
            $table->string('slug', 191)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('voodooley_movies_films', function($table)
        {
            $table->dropColumn('actors');
            $table->text('description')->default('NULL')->change();
            $table->integer('year')->default(NULL)->change();
            $table->string('slug', 191)->default('NULL')->change();
        });
    }
}
