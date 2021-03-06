<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function sizeActives()
    {
        return self::where('status', 1)->get();
    }

    // Check the product number belongs to the size
    public function productOfSizes()
    {
        return $this->belongsToMany(Product::class, ProductSize::class);
    }
}
