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
     * списываем с остатка при возобновлении заказа
     *
     * @param OrderStatus $event объект события при обновлении заказа
     * @return \App\Models\Order
     */
    public function handle(OrderStatus $event)
    {
        /**
         * блок кода сработает, если: СТАТУС был CANCELED, стал ACTIVE)
         */
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
