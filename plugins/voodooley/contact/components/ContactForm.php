<?php
namespace Voodooley\Contact\Components;

use CMS\Classes\ComponentBase;
use Input;
use Mail;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Форма контактов',
            'description' => 'Простая форма контактов',
        ];
    }

    public function onSend()
    {
        $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

        Mail::send('voodooley.contact::mail.message', $vars, function ($message) {

            $message->to('voodooley83@gmail.com', 'Admin Person');
            $message->subject('Новое сообщение из контактной формы');
        });
    }
}
