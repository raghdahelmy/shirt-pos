<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'base_price', 'image'];
    
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
