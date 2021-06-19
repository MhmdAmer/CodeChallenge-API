<?php


namespace App\Http\Controllers\API;


namespace App\Http\Controllers;

use App\Helpers\InputValidationHelper;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        $inputData = new InputValidationHelper();

        if ($inputData->validateUserRegistration($request)->fails())
            return response()->json(['error' => 'Missing parameters!.'], 404);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return response()->json([
            "data" => $user
        ], 201);
    }
}
