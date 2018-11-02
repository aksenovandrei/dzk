<?php

namespace App\Http\Middleware;

use App\Repositories\CertificateRepository;
use Closure;

class CheckCode
{
    public function __construct(CertificateRepository $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $certificate = $this->certificateRepository->checkCode($request->get('code'));
        if (!$certificate) {
            return redirect('/')->with('status', 'Такого кода не существует');
        }
        $request->attributes->add(['certificate' => $certificate]);
        return $next($request);
    }
}
