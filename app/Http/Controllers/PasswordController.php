<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function change_password(Request $req)
    {

        $req->validate(
            ['password1' => 'required | min:6 '],
            ['password2' => 'required | min:6 | same:password1']
        );
        $pass = $req->password1;
        return view('ajax.change_password', compact($pass) );
    }
}
