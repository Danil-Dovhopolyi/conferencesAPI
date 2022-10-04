<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserRole;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
       'role_id',
       'updated_at',
       'created_at',
    ];

    public function user()
    {
        return $this->belongsToMany(UserRole::class);
    }
}