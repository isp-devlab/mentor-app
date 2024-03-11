<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Role extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'roles';
    protected $fillable = [
        'name',
    ];
}
