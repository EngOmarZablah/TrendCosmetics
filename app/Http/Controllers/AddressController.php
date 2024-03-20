<?php

namespace App\Http\Controllers;

use App\Models\AllAddress;
use App\Models\City;
use App\Models\Region;
use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_addresses",
     *     tags={"Addresses"},
     *     summary="Get all addresses",
     *     description="",
     *     operationId="getAddresses",
     *     security={{"bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="error"
     *     ),
     * )
     */
    public function getAddresses()
    {
        $id = Auth::id();
        $addresses = AllAddress::where('customer_id', $id)->get();
        return response()->json([$addresses, 200]);
    }
    /**
     * @OA\POST(
     *     path="/api/add_address",
     *     tags={"Addresses"},
     *     summary="Add new address",
     *     description="",
     *     operationId="addAddress",
     *     security={{"bearer":{}}},
     *     @OA\RequestBody(
     *         description="",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="region_id",
     *                     description="Enter your region",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="city_id",
     *                     description="Enter your city",
     *                     type="string"
     *                 ), 
     *                 @OA\Property(
     *                     property="township_id",
     *                     description="Enter your township",
     *                     type="string"
     *                 ),  
     *                 required={"region_id","city_id","township_id"}
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="error"
     *     ),
     * )
     */
    public function addAddress(Request $request)
    {
        $user = Auth::user();
        $address = new AllAddress;
        $region = Region::where('id', $request->region_id)->select('regionName')->first();
        $city = City::where('id', $request->city_id)->select('cityName')->first();
        $township = Township::where('id', $request->township_id)->select('townshipName')->first();
        $address->address = $region->regionName . ' ' . $city->cityName . ' ' . $township->townshipName;
        $address->customer_id = $user->id;
        $address->save();
        return response()->json([$address, 201]);
    }
}