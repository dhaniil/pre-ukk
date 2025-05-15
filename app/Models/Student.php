<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Student extends Model
{
    use SoftDeletes, HasRoles;
    protected $guard_name = 'web';
    protected $fillable = ['name', 'gender', 'address', 'contact', 'email', 'nis', 'status_pkl'];

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industries::class);
    }
}
