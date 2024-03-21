<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/get_products/{subCatagoryId}",
     *     summary="Get products by subCatagory",
     *     description="",
     *     operationId="getProducts",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         description="",
     *         in="path",
     *         name="subCatagoryId",
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
    public function getProducts($subCatagoryId)
    {
        $products = item::where('subCatagory_id', $subCatagoryId)->get();
        return response()->json([$products], 200);
    }
}