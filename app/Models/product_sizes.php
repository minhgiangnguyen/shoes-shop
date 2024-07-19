<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class product_sizes extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $primaryKey = 'ProductSizeID';
    protected $fillable = ['ProductID','SizeID'];

    


    
    public function size_name(): HasOne
    {
        return $this->hasOne(sizes::class, 'SizeID', 'SizeID');
    }
    public function sizes(): BelongsTo
    {
        return $this->belongsTo(sizes::class,'SizeID','SizeID');
    }
    public function products(): BelongsTo
    {
        return $this->belongsTo(products::class,'ProductID','ProductID');
    }
}