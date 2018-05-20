<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;

class LogAfterRequest
{
    private  $start;
    private $end;
    public function handle($request, Closure $next)
    {
        $this->start = microtime(true);

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $this->end = microtime(true);

        $this->log($request, $response);
    }

    protected function log($request, $response)
    {
        $duration = $this->end - $this->start;
        $token = $request->bearerToken();
        $url = $request->fullUrl();
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $status = $response->getStatusCode();

        $log = "{$ip}: [{$status}] {$method}@{$url} - {$duration}ms";

        Log::info($log);
    }
}
