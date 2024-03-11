<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Teacher extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'teachers';
    protected $fillable = [
        'group_id',
        'mentor_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'class_id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
