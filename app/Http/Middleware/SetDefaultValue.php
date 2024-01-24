<?php

namespace App\Http\Middleware;

use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultValue
{

    private NhanVienRepositoryInterface $nhanVienRepository;
    public function __construct(NhanVienRepositoryInterface $nhanVienRepository)
    {
        $this->nhanVienRepository = $nhanVienRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nhanVienByType = $this->nhanVienRepository->countByType();
        return $next($request);
    }
}

