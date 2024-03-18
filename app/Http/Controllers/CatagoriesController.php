<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    public function getCatagories(){
        $catagories=Catagory::all();
        return response()->json([$catagories,200]);
    }
}