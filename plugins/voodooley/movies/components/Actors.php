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

            'sortOrder' => [
                'title' => 'Сортировать',
                'description' => 'Сортировать по',
                'type' => 'dropdown',
                'default' => 'Name ASC'
            ],
        ];
    }

    public function getSortOrderOptions()
    {
        return [
            'name asc' => 'Имя (по возрастанию)',
            'name desc' => 'Имя (по убыванию)'
        ];
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    protected function loadActors()
    {
        $query = Actor::all();

        if ($this->property('sortOrder') == 'name asc') {
            $query = $query->sortBy('name');
        }

        if ($this->property('sortOrder') == 'name desc') {
            $query = $query->sortByDesc('name');
        }

        if ($this->property('results') > 0) {
            $query = $query->take($this->property('results'));
        }

        return $query;
    }

    public $actors;
}
