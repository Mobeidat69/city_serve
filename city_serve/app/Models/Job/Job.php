<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
protected $table = 'jobs';
    protected $fillable = [
        'id',
        'job_title',
        'job_region',
        'job_type',
        'vacany',
        'expereince',
        'salary',
        'gender',
        'application_deadline',
        'jobdescription',
        'responsibilities',
        'image',
        'Requirements' ];
        public $timestamps = true;
    }
