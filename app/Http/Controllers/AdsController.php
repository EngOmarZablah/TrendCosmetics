<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_ads",
     *     tags={"Ads"},
     *     summary="Get Ads",
     *     description="",
     *     operationId="getAds",
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
    public function getAds()
    {
        $ads = DB::table('ads')->orderBy('id', 'desc')->limit(3)->get();
        return response()->json([$ads], 200);
    }
}