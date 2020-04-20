<?php namespace Voodooley\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'voodooley_movies_films';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

//    protected $jsonable = ['actors'];
    /* Relations */

    public $belongsToMany = [
        'genres' => [
            'Voodooley\Movies\Models\Genre',
            'table' =>'voodooley_movies_movies_genres',
            'order' => 'genre_title'
        ],
        'actors' => [
            'Voodooley\Movies\Models\Actor',
            'table' =>'voodooley_movies_actors_movies',
            'order' => 'name'
        ]
    ];


    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'movie_gallery' => 'System\Models\File'
    ];
}
