<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanningTak extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->belongsTo(task::class, 'task_id', 'id');
    }

    

}
