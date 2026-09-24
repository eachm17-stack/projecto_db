<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model {
    use HasFactory;

    // Define qué campos se pueden llenar
    protected $fillable = ['user_id', 'title', 'description'];

    // Un proyecto pertenece a un Usuario
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Un proyecto tiene muchas Tareas
    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }
}
