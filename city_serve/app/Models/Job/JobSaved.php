<?php

namespace App\Models\Job;

use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobSaved extends Model
{
    use HasFactory;
    public function task(){
        return $this->HasMany(Task::class);
    }
    protected $table='jobsaved';
    protected $fillable=['id',
    'task_id',
    'user_id',
];

public $timestamps = true;

}

