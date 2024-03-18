<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfileDetails($id)
    {
        $customer=Customer::find($id);
        return response()->json([$customer,200]);
    }
}