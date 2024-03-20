<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_profile_details/{id}",
     *     summary="Get profile info",
     *     description="",
     *     operationId="getProfileDetails",
     *     tags={"Profile"},
     *     @OA\Parameter(
     *         description="",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="error"
     *     ),
     * )
     */
    public function getProfileDetails($id)
    {
        $customer=Customer::find($id);
        return response()->json([$customer,200]);
    }
}