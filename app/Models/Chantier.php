<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chantier extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'adresse',
        'chef_id',
        'comment',
        'created_by',
    ];

    public function chef()
    {
        return $this->hasOne(User::class, 'id', 'chef_id');
    }
}
