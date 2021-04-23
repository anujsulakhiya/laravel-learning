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

    public function createbatch(Request $req)
    {
        $user = Auth::user();
        $batchcount = Batch_detail::select('id')->where('creater_email', $user->email)->where('is_deleted', '0')->get()->count();

        $validator = Validator::make($req->all(), [
            'batch_name' => 'required',
        ]);

        if ($validator->fails()) {

            return view('faculty.create_batch')->with('batchcount' , $batchcount)->with('user' , $user)->withErrors($validator);
        }

        dd($req->all());

        return view('faculty.create_batch')->with('success', 'yes');
    }
}

