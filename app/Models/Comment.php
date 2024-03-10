<?php

namespace App\Models;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'comments';
    protected $fillable = [
        'discussion_id',
        'user_id',
        'content',
    ];

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class, 'discussion_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
