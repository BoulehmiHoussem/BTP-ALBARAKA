<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "comment",
        "created_by"
    ];

    public function subtasks()
    {
        return $this->hasMany(subtasks::class, 'task_id', 'id');
    }

    public function planningtak()
    {
        return $this->hasMany(planningtak::class, 'task_id', 'id');
    }
}
