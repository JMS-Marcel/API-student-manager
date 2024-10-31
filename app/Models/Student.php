<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable =[
        'nom',
        'prenom',
        'date_naissance',
        'password',
        'matricule',
        'phone',
        'email',
        'adresse',
    ];

    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cours_student');
    }

    public function notes(){
        return $this->hasMany(Note::class, 'student_id');
    }
}


