<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'lessons';
    protected $fillable = [
        'class_id',
        'title',
        'content',
        'lesson_video'
    ];

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
