<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Your email address is not verified.'], 409);
            // return redirect('/login');
        }

        $errorMessage = $this->getErrorMessage($roles);

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        return response()->json(['massage' =>  $errorMessage], 403);
    }

    private function getErrorMessage($roles)
    {
        switch ($roles) {
            case 'admin':
                return 'You do not have administrative privileges.';
            case 'superAdmin':
                return 'You do not have super admin privileges.';
            case 'publisher':
                return 'You do not have publishing privileges.';
            case 'editor':
                return 'You do not have editing privileges.';
            default:
                return 'You do not have sufficient privileges.';
        }
    }
}
