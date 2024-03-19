<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_catagories",
     *     tags={"catagories"},
     *     summary="Get all catagories",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="getCatagories",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
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

    public function getCatagories()
    {
        $catagories = Catagory::all();
        return response()->json([$catagories, 200]);
    }
}