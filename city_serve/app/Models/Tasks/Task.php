<?php

namespace App\Models\Tasks;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
    
}
