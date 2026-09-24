<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model {
    use HasFactory;

    protected $fillable = ['project_id', 'title', 'is_completed', 'due_date'];

    // Una tarea pertenece a un Proyecto
    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
