<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class product_images extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $primaryKey = 'ImageID';
    protected $fillable = ['ProductID','ProductImage'];
    
    public function products(): BelongsTo
    {
        return $this->belongsTo(products::class, 'ProductID', 'ProductID');
    }
}