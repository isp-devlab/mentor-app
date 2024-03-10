<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'classes';
    protected $fillable = [
        'category_id',
        'mentor_id',
        'slug',
        'name',
        'description',
        'price',
        'thumbnail_path',
        'grade',
        'is_active',
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'class_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
