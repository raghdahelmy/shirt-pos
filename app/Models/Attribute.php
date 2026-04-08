<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name'];

    public function options()
    {
        return $this->hasMany(AttributeOption::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
