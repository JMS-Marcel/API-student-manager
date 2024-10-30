<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'password',
        'phone',
        'email',
    ];

    public function cours()
    {
        return $this->hasMany(Cours::class, 'teacher_id');
    }
}
