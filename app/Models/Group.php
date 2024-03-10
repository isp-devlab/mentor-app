<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'groups';
    protected $fillable = [
        'name',
        'description',
        'referral_code',
    ];

    public function member()
    {
        return $this->hasMany(Member::class, 'group_id');
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'group_id');
    }

    public function discussion()
    {
        return $this->hasMany(Discussion::class, 'group_id');
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'group_id');
    }
}