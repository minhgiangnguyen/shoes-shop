<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    protected $fillable = ['OrderUserID','OrderShippingID','OrderPaymentID','OrderTotalPrice','OrderStatus'];

    public function order(): HasOne
    {
        return $this->hasOne(shipping::class, 'shipping_id', 'OrderShippingID');
    }
    public function payment(): HasOne
    {
        return $this->hasOne(payment::class, 'PaymentID', 'OrderPaymentID');
    }
}