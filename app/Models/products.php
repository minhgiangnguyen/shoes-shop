<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mehradsadeghi\FilterQueryString\FilterQueryString;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\product_sizes;


class products extends Model
{
    use SoftDeletes,FilterQueryString, Sluggable, HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    // protected $fillable = ['ProductCode','ProductName','ProductSlug','ProductGenderID',
    //                        'ProductColorID','ProductPrice',"ProductDesc","ProductDetail",
    //                        'ProductThumb','ProductCollectionID','ProductMaterial' ];
    protected $fillable = ['ProductCode','ProductName','ProductSlug','ProductGenderID',
                           'ProductColorID','ProductPrice',"ProductDesc","ProductDetail",
                           'ProductThumb','ProductCollectionID','ProductMaterial',
                           'ProductColorDetail' ];
    protected $dates = ['deleted_at'];
    protected $filters = ['sort','filter_collect','filter_color','filter_gender','filter_size'];
    public function sort($query,$value) {
        if($value == 'newest'){
            return $query->orderBy('ProductID','desc');
        }else{
            return $query->orderBy('ProductPrice',$value);
        }
    }
    public function filter_collect($query,$value) {
        return $query->where('ProductCollectionID', $value);
    }
    public function filter_color($query,$value) {
        return $query->where('ProductColorID', $value);
    }
    public function filter_gender($query,$value) {
        return $query->where('ProductGenderID', $value);
    }
    public function filter_size($query,$value) {
        $ProductID = product_sizes::select('ProductID')->where('SizeID',$value)->pluck('ProductID');
        return $query->whereIn('ProductID', $ProductID);
    }
    
    
    public function collections(): BelongsTo
    {
        return $this->belongsTo(collections::class, 'ProductCollectionID', 'CollectionID');
    }
    public function genders(): BelongsTo
    {
        return $this->belongsTo(genders::class, 'ProductGenderID', 'GenderID');
    }
    public function colors(): BelongsTo
    {
        return $this->belongsTo(colors::class, 'ProductColorID', 'ColorID');
    }
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(sizes::class, 'product_sizes', 'ProductID', 'SizeID');
    }
    // public function product_sizes(): HasOne
    // {
    //     return $this->hasOne(product_sizes::class, 'ProductID', 'ProductSizeID');
    // }
    // public function product_images(): HasOne
    // {
    //     return $this->hasOne(product_images::class, 'ProductID', 'ImageID');
    // }
    
    public function product_sizes(): HasMany
    {
        return $this->HasMany(product_sizes::class, 'ProductID', 'ProductSizeID');
    }
    
    public function product_images(): HasMany
    {
        return $this->HasMany(product_images::class, 'ProductID', 'ImageID');
    }
    public function orderdetais(): HasMany
    {
        return $this->HasMany(orderdetais::class, 'ProductID', 'DetailID');
    }
    
    public function getRouteKeyName()
    {
        return 'ProductSlug'; // db column name
    }

    public function sluggable(): array
    {
        return [
            'ProductSlug' => [
                'source' => 'ProductName'
            ]
        ];
    }
    

}