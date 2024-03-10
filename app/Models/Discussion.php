<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'discussions';
    protected $fillable = [
        'group_id',
        'user_id',
        'content',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'discussion_id');
    }
}
