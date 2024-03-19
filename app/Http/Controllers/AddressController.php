<?php

namespace App\Http\Controllers;

use App\Models\AllAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    
    public function getAddresses($id)
    {
        $addresses = AllAddress::where('customer_id', $id)->get();
        return response()->json([$addresses, 200]);
    }

    public function addAdress(Request $request){
        $user=Auth::user();
        $address=new AllAddress;
        $address->address=$request->address;
        $address->customer_id=$user->id;
        $address->save();
        return response()->json([$address,201]);
    }
}