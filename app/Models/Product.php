<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'reference',
        'quantity',
        'price',
        'fournisseur',
    ];

    public function subtask()
    {
        return $this->belongsToMany(Subtasks::class);
    }
}
