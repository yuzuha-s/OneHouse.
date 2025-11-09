<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    // ヘッダーを付与する
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // CORS ヘッダーを付与
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', '*');

        // OPTIONS メソッドの場合は空レスポンスで終了
        if ($request->getMethod() === 'OPTIONS') {
            $response->setStatusCode(200);
            $response->setContent('');
        }

        return $response;
    }
}
