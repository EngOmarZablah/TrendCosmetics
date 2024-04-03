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


    /**
     * @OA\POST(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="Login",
     *     description="Login to system",
     *     operationId="login",
     *     @OA\RequestBody(
     *         description="Pet object that needs to be added to the store",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="User email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="User password",
     *                     type="string"
     *                 ),
     *                 required={"email","password"}
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
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
            ], 200
        ]);
    }

    /**
     * @OA\POST(
     *     path="/api/register",
     *     tags={"Authentication"},
     *     summary="Register",
     *     description="Register to system",
     *     operationId="register",
     *     @OA\RequestBody(
     *         description="",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="firstName",
     *                     description="Enter your firstName",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="lastName",
     *                     description="Enter your lastName",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     description="Enter your email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     description="Enter your phone number",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Enter your password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirmation",
     *                     description="Confirm your password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="street",
     *                     description="Enter your street",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="region_id",
     *                     description="Enter your region",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="city_id",
     *                     description="Enter your city",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="township_id",
     *                     description="Enter your township",
     *                     type="integer"
     *                 ), 
     *                 required={"firstName","lastName","email","phone","password","password_confirmation","street","region_id","city_id","township_id"}
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
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
                'verifyCode' => random_int(100000, 999999),
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

    /**
     * @OA\POST(
     *     path="/api/logout",
     *     tags={"Authentication"},
     *     summary="Logout",
     *     description="Logout from profile",
     *     operationId="logout",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     * )
     */
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    /**
     * @OA\POST(
     *     path="/api/refresh",
     *     tags={"Authentication"},
     *     summary="Refresh",
     *     description="",
     *     operationId="refresh",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     * )
     */
    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
