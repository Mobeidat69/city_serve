<?php

namespace App\Models\Applications;

use App\Models\Tasks\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
    ];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function task(): BelongsTo{
        return $this->belongsTo(Task::class);
    }
}
