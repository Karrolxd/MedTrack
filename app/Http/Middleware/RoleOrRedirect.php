<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleOrRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        $role = optional($user->role)->name;   // 'admin' / 'doctor' / …

        if ($request->is('dashboard')) {
            return match ($role) {
                'admin'      => redirect()->route('admin.dashboard'),
                'doctor'     => redirect()->route('doctor.dashboard'),
                'reception'  => redirect()->route('reception.dashboard'),
                'patient'    => redirect()->route('patient.dashboard'),
                default      => abort(403, 'Brak przypisanej roli'),   // zamiast pacjent-domyślny
            };
        }

        // jeśli middleware ma parametry i rola nie pasuje → 403
        if ($roles && ! in_array($role, $roles, true)) {
            abort(403, 'Brak uprawnień');
        }

        return $next($request);
    }
}
