<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // Désactiver la vérification CSRF pour accélérer le développement (demande de l'utilisateur).
    protected $except = ['*'];
}
