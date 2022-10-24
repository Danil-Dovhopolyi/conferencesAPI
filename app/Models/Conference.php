<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    protected $table = 'conferences';
    protected $fillable = ['title', 'country', 'date', 'longitude', 'latitude', 'creator_id'];
    protected $guarded = [];
    public $timestamps = false;
}
