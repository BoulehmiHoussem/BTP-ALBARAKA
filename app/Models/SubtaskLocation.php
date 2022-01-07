<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtaskLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        "subtask_id",
        "location_id",
        "location_from",
        "location_to"
    ];

    public function subtasklocations()
    {
        return $this->hasMany(SubtaskLocation::class, 'location_id', 'id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'id', 'location_id');
    }
}
