<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form () {
        return view('page.form');
    }

    public function welcome (Request $request) {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $gender = $request->input('gender');
        $negara = $request->input('negara');
        $bahasa = $request->input('bahasa');
        $bio = $request->input('bio');

        return view('page/home', ['firstname' => $firstname, 'lastname' => $lastname, 'gender' => $gender, 'negara' => $negara, 'bahasa' => $bahasa, 'bio' => $bio]);
    }
}
