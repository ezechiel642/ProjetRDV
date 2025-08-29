<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Medecin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom', 'prenom', 'telephone', 'email',
        'hopital', 'specialite', 'ville', 'quartier',
        'sexe', 'password',
    ];

    protected $hidden = ['password'];
}
