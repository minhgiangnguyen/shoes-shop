<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class colors extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $primaryKey = 'ColorID';
    protected $fillable = ['ColorName'];
    protected $guarded = [''];
    
    public function productColor()
    {
        return $this->hasMany(products::class, 'ProductColorID','ColorID');
    }
    public function products(): HasMany
    {
        return $this->HasMany(products::class,'ProductColorID','ColorID');
    }
}