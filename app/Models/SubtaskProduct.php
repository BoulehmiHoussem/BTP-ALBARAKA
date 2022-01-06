<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtaskProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "subtask_id",
        "product_id",
        "product_quantity"
    ];
    public function subtaskproducts()
    {
        return $this->hasMany(SubtaskProduct::class, 'product_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
    
}
