<?php

namespace App\Http\Middleware;

use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class Firebase
{
    private Auth $auth;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, \Closure $next)
    {
        $idTokenString = $request->headers->get('authorization');
        // $token = trim(str_replace('Bearer', '', $idTokenString));
        $token = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjNiYjg3ZGNhM2JjYjY5ZDcyYjZjYmExYjU5YjMzY2M1MjI5N2NhOGQiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoidGF4IiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9hL0FDZzhvY0lzRzBhWjdtUEFEbVNuem15b1FGZWZvN0JJanh1dGYwNUVGbWlIYmcwVj1zOTYtYyIsImlzcyI6Imh0dHBzOi8vc2VjdXJldG9rZW4uZ29vZ2xlLmNvbS9zdWJtYXJpbmUtZGV2LTExMSIsImF1ZCI6InN1Ym1hcmluZS1kZXYtMTExIiwiYXV0aF90aW1lIjoxNzA5OTg0MTM2LCJ1c2VyX2lkIjoiNW9FN1F1WTA5TGhXQWpTNFhOMjlCM2J1U2JKMiIsInN1YiI6IjVvRTdRdVkwOUxoV0FqUzRYTjI5QjNidVNiSjIiLCJpYXQiOjE3MDk5ODQxMzYsImV4cCI6MTcwOTk4NzczNiwiZW1haWwiOiJ0YXg5Nzc5QGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7Imdvb2dsZS5jb20iOlsiMTA1ODQ1ODEyMTc1ODAxNzg3NTczIl0sImVtYWlsIjpbInRheDk3NzlAZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoiZ29vZ2xlLmNvbSJ9fQ.sbAJFy7E_Uq7Iah5jAi1zLCFCCl9EkepiXpIH6bN2xDqA3qcjrQjyGMjpfmi3in5qU1LsD1lt4Rc_dGWYHB9oWLJmCWYjBxwmT3jTnSqEMflHiGcg2h1dzb4l5g6n0lvpSE4vzbNS8-rXgNT_-A-j-mpv-Y1ASFcdjn46iEv-lEq_1DTQPJfZlGRZT38o_heck4mscfpLOWV_Nhu8vXYCDwwihAU_mlNzfrYCO_0Gf5MZ6SwySIM70GwK3KqnTshyrLrhXp1gS6gEFlGbyxQVK6-9CzwEAYhEhwqM70VpZKSf-xm2pEX8VGaZqqss09JGT-3RnOwKIBZtRK0hH3LCw';

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        }

        $firebaseId = $verifiedIdToken->claims()->get('sub');
        $email = $verifiedIdToken->claims()->get('email');

        $request->merge([
            'firebaseId' => $firebaseId,
            'email' => $email,
        ]);

        return $next($request);
    }
}
