<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = [
        'id',
        'task_id',
        'cv',
        'user_id',
        'company',

    ];
}
