<?php namespace Voodooley\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Voodooley\Movies\Components\Actors' => 'actors',
            'Voodooley\Movies\Components\ActorForm' => 'actorform'
        ];
    }

    public function registerFormWidgets()
    {
        return  [
            'Voodooley\Movies\FormWidgets\Actorbox' => [
                'label' => 'Actorbox field',
                'code' => 'actorbox'
            ]
        ];
    }

    public function registerSettings()
    {
    }
}
