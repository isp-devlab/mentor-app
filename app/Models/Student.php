<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'students';
    protected $fillable = [
        'class_id',
        'user_id',
    ];

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
