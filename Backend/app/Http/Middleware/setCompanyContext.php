<?php

namespace App\Http\Middleware;

use App\Models\CompanyUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class setCompanyContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $companyId = $request->header('CompanyId');

        if (!$companyId){
            return response()->json([
                'message' => 'ID da empresa não encontrado no header',
            ], 400);
        }

        $belongs = CompanyUser::where('user_id', $user->id);

        return $next($request);
    }
}
