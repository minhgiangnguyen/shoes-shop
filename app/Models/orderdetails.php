<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;



class orderdetails extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $primaryKey = 'DetailID';
    protected $fillable = ['DetailOrderID','DetailProductID','DetailProductName','DetailSize','DetailPrice','DetailQuantity'];


    public function products(): BelongsTo
    {
        return $this->belongsTo(products::class, 'DetailProductID', 'ProductID');
    }
    public function detailSize(): HasOne
    {
        return $this->hasOne(sizes::class, 'SizeID', 'DetailSize');
    }

}