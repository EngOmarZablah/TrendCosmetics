<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function getAds(){
        $ads=DB::table('ads')->get();
        return response()->json([$ads,200]);
    }
}