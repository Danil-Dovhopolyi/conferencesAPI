<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class UserRole extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'role_id'
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }
      public function role(){
        return $this->belongsToMany(Role::class);
    }
}
