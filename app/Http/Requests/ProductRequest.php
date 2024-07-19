<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ProductCode' => 'required|max:50',
            'ProductName' => 'required|unique:products|max:100',
            'ProductGenderID' => 'required',
            'ProductPrice' => 'required|numeric',
            'ProductDesc' => 'required',
            'ProductDetail' => 'required',
            'ProductThumb' => 'required|mimes:jpeg,png,jpg',
            'ProductCollectionID' => 'required',
            'ProductMaterial' => 'required',
            'ProductColorDetail' => 'required',
            'ProductColorID' => 'required',
            'ProductImage' => 'required',
            'size' => 'required',
            'ProductCollectionID' => 'required'
        ];
    }
}