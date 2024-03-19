<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts($subCatagoryId){
        $products=item::where('subCatagory_id',$subCatagoryId)->get();
        return response()->json([$products,200]);
    }
}