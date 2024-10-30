<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
        'prenom',
        'date_naissance',
        'password',
        'matricule',
        'phone',
        'email',
        'adresse'
    ];

    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cours_student');
    }
}


