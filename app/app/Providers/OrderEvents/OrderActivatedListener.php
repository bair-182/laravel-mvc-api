<?php

namespace App\Providers\OrderEvents;

use App\Models\Stock;


class OrderActivatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStatus $event)
    {
        //print_r('HELLO WORLD from OrderCanceledListener.php');
        if ($event->order->getOriginal('status') === 'canceled' && $event->order->status === 'active') {

            $warehouseId = $event->order->warehouse_id;
            $orderPositions = $event->order->orderItems()->get();

            foreach ($orderPositions as $item) {
                $stock = Stock::where([
                    'warehouse_id' => $warehouseId,
                    'product_id' => $item->product_id
                ])->first();

                $stock->stock = $stock->stock - $item->count; // списание с остатка
                $stock->save();
            }
        }
        return $event->order;
    }
}
