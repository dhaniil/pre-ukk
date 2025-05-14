<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'nip', 'gender', 'address', 'contact', 'email'];

    public function industries()
    {
        return $this->hasMany(Industries::class);
    }

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }
}
