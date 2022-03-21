<?php namespace Watchlearn\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use ValidationException;
use Flash;


class ContactForm extends ComponentBase
{

    public function componentDetails(){
        return [
            'name' => 'Contact Form',
            'description' => 'Simple contact form'
        ];
    }


    public function onSend(){

        $data = post();

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',

        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            throw new ValidationException($validator);
        } else {
            $vars = ['firstname' => Input::get('firstname'), 'lastname' => Input::get('lastname')];

            Mail::send('watchlearn.contact::mail.message', $vars, function($message) {

                $message->to('kavitha.a@snapperit.com', 'Admin Person');
                $message->subject('New message from contact form');

            });
            Flash::success('Thank you for showing interest,we will contact you soon !!!');

        }

    }

}
