<?php
namespace Voodooley\Movies\Components;

use CMS\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use Voodooley\Movies\Models\Actor;
use Flash;

class ActorForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Актеры',
            'description' => 'Добавить актера',
        ];
    }

    public function onSave()
    {
        $actor = new Actor();
        $actor->name = Input::get('name');
        $actor->lastname = Input::get('last_name');
        $actor->save();
        Flash::success('Актер добавлен');
        return Redirect::back();
    }
}
