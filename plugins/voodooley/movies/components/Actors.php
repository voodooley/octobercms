<?php namespace Voodooley\Movies\Components;

use Cms\Classes\ComponentBase;
use Voodooley\Movies\Models\Actor;

class Actors extends ComponentBase
{

    /**
     * @inheritDoc
     */
    public function componentDetails()
    {
        return [
            'name' => 'Список актеров',
            'description' => 'Отображает список актеров на странице'
        ];
    }

    public function defineProperties()
    {
        return [
            'results' => [
                'title' => 'Кол-во актеров',
                'description' => 'Сколько актеров показывать?',
                'default' => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Разрешены только цифры'
            ],
        ];
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    protected function loadActors()
    {
        $query = Actor::all();

        if ($this->property('results') > 0) {
            $query = $query->take($this->property('results'));
        }

        return $query;
    }

    public $actors;
}
