<?php

namespace App\Providers\OrderEvents;
use App\Models\Stock;


class OrderItemUpdateListener
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
    public function handle(OrderItemUpdated $event)
    {
        //print_r('HELLO WORLD from OrderItemUpdateListener.php');

        $order = $event->orderItem->order;
        $stock = Stock::where([
            'warehouse_id' => $order->warehouse_id,
            'product_id' => $event->orderItem->product_id
        ])->first();

        $difference = $event->orderItem->getOriginal('count') - $event->orderItem->count;

        $stock->stock = $stock->getOriginal('stock') + $difference; // списание с остатка
        $stock->save();

        return $order;
    }
}
