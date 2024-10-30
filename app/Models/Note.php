<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'valeur',
        'student_id',
        'cours_id'
    ];

    function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    function notes(){
        return $this->hasMany(Note::class, 'cours_id');
    }
}
