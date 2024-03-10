<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = [
        'slug',
        'name',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'category_id');
    }
}
