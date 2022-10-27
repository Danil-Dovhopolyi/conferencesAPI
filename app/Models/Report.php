<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = ['topic', 'dateStart', 'dateEnd', 'description'];
    protected $guarded = [];
    public $timestamps = false;
}
