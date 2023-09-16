<?php

namespace App\Models\Tasks;

use App\Models\Category\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\Console\Application;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'deadline',
        'vacancy',
        'category',
        'image',
    ];
    public function application(): HasMany
    {
        return $this->hasMany(Application::class);
    }
    public function savedTable(): BelongsToMany{
        return $this->belongsToMany(User::class , 'jobsaved' ,'task_id' , 'user_id');
    } 
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
