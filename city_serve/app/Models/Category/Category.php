<?php

namespace App\Models\Category;

use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function task():HasMany{
        return $this->hasMany(Task::class);
    }

    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'image',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
