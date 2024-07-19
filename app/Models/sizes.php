<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class sizes extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $primaryKey = 'SizeID';
    protected $fillable = ['SizeName'];

    
    public function productSize()
    {
        return $this->hasMany(product_sizes::class, 'SizeID','SizeID');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(products::class, 'product_sizes','SizeID','ProductID');
    }
}