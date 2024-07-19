<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collections extends Model
{
    use HasFactory;
    protected $table = 'collections';
    protected $primaryKey = 'CollectionID';
    // protected $fillable = ['CollectionName','CollectionImage','CollectionTitle','CollectionSummary','isBanner'];
    protected $fillable = ['CollectionName','CollectionImage','CollectionTitle','CollectionSummary','ImageType'];
    protected $guarded = [''];

    public function products()
    {
        return $this->hasMany(products::class, 'ProductCollectionID','CollectionID');
    }
    public function getRouteKeyName(): string
    {
        return 'CollectionName';
    }
}