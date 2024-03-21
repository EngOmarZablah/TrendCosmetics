<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/add_order",
     *     tags={"Orders"},
     *     summary="Add new order",
     *     description="Add a new order for the authenticated user.",
     *     operationId="addOrder",
     *     security={{"bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="JSON object containing items to be added to the order",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="items",
     *                     description="Array of items to be added to the order",
     *                     type="array",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(
     *                             property="item_id",
     *                             description="ID of the item",
     *                             type="integer"
     *                         ),
     *                         @OA\Property(
     *                             property="quantity",
     *                             description="Quantity of the item",
     *                             type="integer"
     *                         ),
     *                     ),
     *                 ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="The order added",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="The order added"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function addOrder(Request $request)
    {
        $order = new Order;
        $user = Auth::user();
        $order->customer_id = $user->id;
        $order->date = Carbon::now();
        $order->status = 0;
        $order->save();


        foreach ($request->items as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item['item_id'],
                'quantity' => $item['quantity'],
            ]);
        }
        return response()->json(['message' => 'The order added'], 201);
    }
}
