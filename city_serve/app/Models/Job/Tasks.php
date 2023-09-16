<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $table = 'Tasks';
    
    protected $fillable = [
        'id', 'job_title',
        'job_region',
        'company',
        'job_type',
        'Vacancy',
        'experience',
        'salary',
        'Gender',
        'application_deadline',
        'job_description',
        'responsibilities',
        'education_experience',
        'otherbenifits',
        'image',
    ];

    public $timestamps = true;
}
