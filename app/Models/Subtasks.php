<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtasks extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "task_id",
        "created_by"
    ];

    public function subtaskproducts()
    {
        return $this->hasMany(SubtaskProduct::class, 'subtask_id', 'id');
    }

    public function subtasklocations()
    {
        return $this->hasMany(SubtaskLocation::class, 'subtask_id', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'id', 'task_id');
    }

    
    public function subtasks()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
    
}
