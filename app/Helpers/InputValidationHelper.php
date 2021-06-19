<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InputValidationHelper
{

    public function validateUserRegistration(Request $request)
    {
        return Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required',
            "c_password" => 'required|same:password',
        ]);
    }
}
