<?php namespace Voodooley\Movies\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;
use Voodooley\Movies\Models\Actor;

class ActorBox extends FormWidgetBase
{
    public function widgetDetails()
    {
        return [
            'name' => 'Actorbox',
            'description' => 'Добавить актера'
        ];
    }

    public function render()
    {
        $this->prepareVars();
//        dump($this->vars['selectedValues']);
        return $this->makePartial('widget');
    }

    public function prepareVars()
    {
        $this->vars['id'] = $this->model->id;
        $this->vars['actors'] = Actor::all()->lists('full_name', 'id');
        $this->vars['name'] = $this->formField->getName().'[]';
        if (!empty($this->getLoadValue())) {
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }
    }

    public function getSaveValue($actors)
    {
        $newArray = [];

        foreach ($actors as $actorID) {
            if (!is_numeric($actorID)) {
                $newActor = new Actor;
                $nameLastName = explode(' ', $actorID);

                $newActor->name = $nameLastName[0];
                $newActor->lastname = $nameLastName[1];
                $newActor->save();
                $newArray[] = $newActor->id;
            } else {
                $newArray[] = $actorID;
            }
        }

        return $newArray;
    }

    public function loadAssets()
    {
        $this->addCss('css/select2.css');
        $this->addJs('js/select2.js');
    }
}
