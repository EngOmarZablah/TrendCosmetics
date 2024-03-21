<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Models\Township;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_regions",
     *     tags={"Regions"},
     *     summary="Get all regions",
     *     description="",
     *     operationId="getRegions",
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
    public function getRegions()
    {
        $regions = Region::all();
        return response()->json([$regions], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/get_cities/{region_id}",
     *     summary="Get all cities",
     *     description="",
     *     operationId="getCities",
     *     security={{"bearer":{}}},
     *     tags={"Regions"},
     *     @OA\Parameter(
     *         description="",
     *         in="path",
     *         name="region_id",
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
    public function getCities($region_id)
    {
        $cities = City::where('region_id', $region_id)->get();
        return response()->json([$cities], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/get_townships/{city_id}",
     *     summary="Get all townships",
     *     description="",
     *     operationId="getTownships",
     *     security={{"bearer":{}}},
     *     tags={"Regions"},
     *     @OA\Parameter(
     *         description="",
     *         in="path",
     *         name="city_id",
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
    public function getTownships($city_id)
    {
        $townships = Township::where('city_id', $city_id)->get();
        return response()->json([$townships], 200);
    }
}
