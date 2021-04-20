<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function change_password(Request $req)
    {
        $validations =  [
            'password1' => 'required | min:6 ',
            'password2' => 'required | min:6 | same:password1'
        ];

        $validator = Validator::make($req->all(), $validations);

        if($validator->fails()){
            return view('ajax.change_password')->withErrors($validator);
        }

        return view('ajax.change_password')->with('success', 'yes');

    }
}
