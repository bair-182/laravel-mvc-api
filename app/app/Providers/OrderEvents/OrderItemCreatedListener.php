<?php

namespace App\Providers\OrderEvents;
use App\Models\Stock;


class OrderItemCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    /**
     * списываем с остатка на складе позиции из заказа
     *
     * @param OrderItemCreated $event объект  события при создании заказа
     * @return \App\Models\OrderItem
     */
    public function handle(OrderItemCreated $event)
    {
        //print_r('HELLO WORLD from OrderItemCreatedListener.php');
        $order = $event->orderItem->order;
        $stock = Stock::where([
            'warehouse_id' => $order->warehouse_id,
            'product_id' => $event->orderItem->product_id
        ])->first();

        if (isset($stock->stock)) {
            $stock->stock = $stock->stock - $event->orderItem->count; // списание с остатка
            $stock->save();
        }

        return $event->orderItem;
    }
}
