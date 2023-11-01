<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderUpdateRequest;


class OrderController extends Controller
{
    public function index()
    {
        return Order::with('orderItems')
            ->orderBy('created_at', 'desc')
            ->filterByQueryString()
            ->paginate(5);
    }


    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $order = Order::create($request->all());

            foreach ($request->input('order_items') as $orderItem) {
                $order->orderItems()->create($orderItem);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create order.'], 500);
        }
        return response()->json(['message' => 'Order created.'], 201);
    }


    public function update(OrderUpdateRequest $request, int $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::find($id);
            $reqCustomer = $request->input('customer');
            $order->update(['customer' => $reqCustomer]);

            foreach ($request->input('order_items') as $item) {
                $orderItem = OrderItem::where('id', $item['id'])->first();
                $orderItem->fill($item);
                $orderItem->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update order.'], 500);
        }
        return response()->json(['message' => 'Order updated.'], 201);
    }


    public function completed(int $id)
    {
        $order = Order::find($id);
        $order->update(['status' => 'completed']);

        return response()->json(['message' => 'Order is completed'], 200);
    }


    public function canceled(int $id)
    {

        $order = Order::find($id);
        $order->fill(['status' => 'canceled']);
        $order->save();

        return response()->json(['message' => 'Order canceled'], 200);
    }


    public function active(int $id)
    {
        $order = Order::find($id);
        $order->fill(['status' => 'active']);
        $order->save();

        return response()->json(['message' => 'Order activated'], 200);
    }
}
