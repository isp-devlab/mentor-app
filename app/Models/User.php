<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'image',
        'is_active',
        'is_student'
    ];

    protected $hidden = [
        'password',
        'remember_me_token',
    ];

}
