<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class genders extends Model
{
    use HasFactory;
    protected $table = 'genders';
    protected $primaryKey = 'GenderID';
    protected $fillable = ['GenderName'];
    protected $guarded = [''];
    
    
    public function getRouteKeyName(): string
{
    return 'GenderName';
}
    public function productGender()
    {
        return $this->hasMany(products::class, 'ProductGenderID','GenderID');
    }
    public function products()
    {
        return $this->hasMany(products::class, 'ProductGenderID','GenderID');
    }

}