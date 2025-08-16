<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['fname', 'lname', 'email'];
    protected $dates = ['deleted_at'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
