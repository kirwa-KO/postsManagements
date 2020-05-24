<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiAuthLogin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    public  function login (ApiAuthLogin $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password))
        {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect..!'],
            ]);
        }
        return response()->json(['api_token' => $user->createToken('api_token')->plainTextToken]);
    }
}
