<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function register(Request $r)
    {
        $validate = Validator::make($r->all(),
        [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if($validate->fails())
        {
            return response()->json([
                'error' => $validate->errors()
            ], 400);
        }

        $data = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password)
        ]);

        return response()->json([
            'message' => "Registered Successfully",
            'user' => $data
        ], 201);
    }
}
