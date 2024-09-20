<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = ['totalAmount'];
    protected $fillable = ['name', 'address', 'phone', 'email', 'customer_id', 'status'];

    public function details() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function getTotalAmountAttribute() {
        $total = 0;

        foreach($this->details as $detail) {
            $total += $detail->quantity * ($detail->price - (isset($detail->sale_price) && $detail->sale_price ? ($detail->sale_price * $detail->price) / 100 : 0));
        }
        return $total;
    }
}
