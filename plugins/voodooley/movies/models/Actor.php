<?php namespace Voodooley\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
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
    public $table = 'voodooley_movies_actors';

    public $belongsToMany = [
        'movies' => [
            'Voodooley\Movies\Models\Movie',
            'table' =>'voodooley_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->lastname;
    }

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
