<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
    protected $table = 'shipping';
    protected $primaryKey = 'shipping_id';
    protected $fillable = ['shipping_userID','shipping_name','shipping_phone','shipping_email','shipping_address','shipping_city','shipping_note'];
}