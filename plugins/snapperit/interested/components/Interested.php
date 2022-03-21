<?php namespace Snapperit\Interested\Components;

use Cms\Classes\ComponentBase;
use Input;
use Validator;
use Redirect;
use Snapperit\Interested\Models\Interest;
use Flash;
use ValidationException;
use System\Models\File;

class Interested extends ComponentBase
{

    public function componentDetails(){
        return [
            'name' => 'Get in touch form',
            'description' => 'Get in touch form'
        ];
    }


    public function onSubmit(){
        $validator = Validator::make(
            $form = Input::all(), [
                'name' => 'required',
                'email' => 'required'
            ]
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }


        $interest = new Interest();
        $interest->name = Input::get('name');
        $interest->email = Input::get('email');
        $interest->save();
        Flash::success('Thank you for showing interest,we will contact you soon !!!');
    }
}
