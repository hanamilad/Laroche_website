<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image_path', 'is_main'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->image_path? Storage::url($this->image_path): asset('images/default.png'); 
    }
}
