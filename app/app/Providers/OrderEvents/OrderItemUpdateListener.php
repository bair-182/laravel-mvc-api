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
     * списываем или возвращаем на остаток на складе при обновлении заказа
     *
     * @param OrderItemUpdated $event объект события при обновлении заказа
     * @return mixed
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
