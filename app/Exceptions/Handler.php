<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;

class Handler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = data_get($exception->guards(), 0);

        switch ($guard) {
            case 'conducteur':
                $login = route('login.conducteur');
                break;
            case 'passager':
                $login = route('login.passager');
                break;
            default:
                $login = route('accueil'); // ou toute autre page
                break;
        }

        return $request->expectsJson()
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest($login);
    }
}