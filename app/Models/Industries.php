<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industries extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'bidang_usaha', 'address', 'contact', 'email', 'guru_pembimbing'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'guru_pembimbing', 'id');;
    }
}
