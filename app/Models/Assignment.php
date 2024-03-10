<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Mentor;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'assignments';
    protected $fillable = [
        'group_id',
        'mentor_id',
        'title',
        'content',
        'end_time',
    ];

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'assignment_id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
