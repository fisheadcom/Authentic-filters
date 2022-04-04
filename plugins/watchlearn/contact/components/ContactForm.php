<?php namespace Watchlearn\Contact\Components;

use Cms\Classes\ComponentBase;
use Watchlearn\Contact\Models\Contact;
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
            'email' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        else{
                $contact= new Contact();
                $contact->firstname    = trim(Input::get('firstname'));
                $contact->reasons_for_contacting     = trim(Input::get('reasons_for_contacting'));
                $contact->phone         = Input::get('phone');
                $contact->email         = Input::get('email');
                $contact->address       = Input::get('address');
                $contact->content       = Input::get('content');
                $contact->business_name       = Input::get('business_name');
                $contact->save();

                $vars = ['firstname' => Input::get('firstname'), 'reasons_for_contacting' => Input::get('reasons_for_contacting'), 'business_name' => Input::get('business_name'), 'email' => Input::get('email'), 'phone' => Input::get('phone'), 'address' => Input::get('address'), 'content' => Input::get('content')];

            Mail::send('watchlearn.contact::mail.message', $vars, function ($message) {

                $message->to('info@authenticfilters.com.au', 'Admin Person');
                $message->subject('New message from contact form');

            });
            Flash::success('Thank you for showing interest, We will contact you soon !!!');

        }

    }

}
