<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $customer = Auth::user();
        return response()->json([
            'customer' => $customer,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|max:100|unique:customers',
            'phone' => 'required|string|unique:customers',
            'password' => 'required|string|confirmed|min:8',
            'street' => 'string'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $customer = Customer::create(array_merge(
            $validator->validated(),
            [
                'password' => bcrypt($request->password),
                'region_id' => $request->region_id,
                'city_id' => $request->city_id,
                'township_id' => $request->township_id,
                'accountType' => 0,
                'status' => 0,
                'verifyCode' => 3435,
            ]
        ));

        $token = Auth::login($customer);
        return response()->json([
            'message' => 'User successfully registered',
            'customer' => $customer,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ], 201);
    }
}