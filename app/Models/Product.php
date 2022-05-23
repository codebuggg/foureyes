<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'price', 'units', 'description', 'image'
    ];

    protected $visible = [
        'id',
        'name',
        'price',
        'units',
        'description',
        'image',
        'images',
        'colors',
        'features',
    ];

    protected $casts = [
      'units' => 'int'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_features');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeInStock($query)
    {
        return $query->where('units', '>', 0);
    }

    public function scopeOutOfStock($query)
    {
        return $query->where('units', '=', 0);
    }
}
