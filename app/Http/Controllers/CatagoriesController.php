<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_catagories",
     *     tags={"Catagories"},
     *     summary="Get all catagories",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="getCatagories",
     *     security={{"bearer":{}}},
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
    public function getCatagories()
    {
        $catagories = Catagory::all();
        return response()->json([$catagories, 200]);
    }
}
