<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "comment",
        "created_by"
    ];

    public function subtask()
    {
        return $this->belongsToMany(Subtasks::class);
    }
}
