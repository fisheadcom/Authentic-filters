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

    public function componentDetails()
    {
        return [
            'name' => 'Contact Form',
            'description' => 'Simple contact form'
        ];
    }


    public function onSend()
    {

        $data = post();

        $rules = [
            'firstname' => 'required',
            'reasons_for_contacting' => 'required',
            'business_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required'

        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        } else {
            $vars = ['firstname' => Input::get('firstname'), 'reasons_for_contacting' => Input::get('reasons_for_contacting'), 'business_name' => Input::get('business_name'), 'email' => Input::get('email'), 'phone' => Input::get('phone'), 'address' => Input::get('address'), 'message' => Input::get('message')];

            Mail::send('watchlearn.contact::mail.message', $vars, function ($message) {

                $message->to('saibabu@snapperit.com', 'Admin Person');
                $message->subject('New message from contact form');

            });
            Flash::success('Thank you for showing interest,we will contact you soon !!!');

        }

    }

}
