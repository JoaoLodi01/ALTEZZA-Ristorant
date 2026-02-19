<?php

namespace App\Http\Middleware;

use App\Models\CompanyUser;
use App\Support\CompanyContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCompanyContext
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

        $belongs = CompanyUser::where('user_id', $user->id)->where('company_id', $companyId)->exists();

        if (!$belongs) {
            return response()->json([
                'message' => 'Usuário não pertence à empresa',
            ], 403);
        }

        CompanyContext::set($companyId);

        $request->merge(['company_id' => $companyId]);

        return $next($request);
    }
}
