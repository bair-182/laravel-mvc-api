<?php

namespace App\Providers\OrderEvents;

use App\Models\Stock;


class OrderCanceledListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * возвращаем остатки при отмене заказа
     *
     * @param OrderStatus $event объект события при обновлении заказа
     * @return \App\Models\Order
     */
    public function handle(OrderStatus $event)
    {
        /**
         * блок кода сработает, если: СТАТУС был ACTIVE, стал CANCELED)
         */
        if ($event->order->getOriginal('status') === 'active' && $event->order->status === 'canceled') {

            $warehouseId = $event->order->warehouse_id;
            $orderPositions = $event->order->orderItems()->get();

            foreach ($orderPositions as $item) {
                $stock = Stock::where([
                    'warehouse_id' => $warehouseId,
                    'product_id' => $item->product_id
                ])->first();

                $stock->stock = $stock->stock + $item->count; // возвращение на остаток
                $stock->save();
            }
        }
        return $event->order;
    }
}
