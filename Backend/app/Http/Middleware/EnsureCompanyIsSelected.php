<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureCompanyIsSelected
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        if (!$user->current_company_id) {
            return response()->json([
                'message' => 'Nenhuma empresa selecionada'
            ], 403);
        }

        return $next($request);
    }
}
