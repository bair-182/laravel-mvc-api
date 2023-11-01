<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $table = 'stocks';

    protected $fillable = ['stock'];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($stock) { //  $stock - это СКЛАД.остаток минус ТОВАР.кол-во
            //print_r($stock->getOriginal('stock'));
            //print_r($stock);
            //print_r($stock->id);

            $difference = $stock->getOriginal('stock') - $stock->stock;

            if ($difference !== 0) { // если есть разница между старым значением СТОКа и новым, то выполнять:
                ProductMovement::create([
                    'product_id' => $stock->product_id,
                    'from_warehouse_id' => $difference>0 ? $stock->warehouse_id : null,
                    'to_warehouse_id' => $difference<0 ? $stock->warehouse_id : null,
                    'count' => abs($difference),
                    'type' => $difference>0 ? 'selling' : 'returning'
                ]);
            }
        });
    }
}
