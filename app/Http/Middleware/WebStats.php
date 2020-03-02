<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\WebStatsController;

class WebStats
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }


    public function terminate($request, $response)
    {
        $ua = $request->server('HTTP_USER_AGENT');
        $data = ['Platform' => '', 'Browser' => '', 'Time' => ''];

        if (preg_match('/linux/i', $ua))
            $data['Platform'] = 'Linux';
        elseif (preg_match('/macintosh|mac os x/i', $ua))
            $data['Platform'] = 'Mac';
        elseif (preg_match('/Windows|win32/i', $ua))
            $data['Platform'] = 'Windows';

        if (preg_match('/MSIE/i', $ua) && !preg_match('/Opera/i', $ua))
            $data['Browser'] = 'Internet Explorer';
        elseif (preg_match('/Firefox/i', $ua))
            $data['Browser'] = 'Mozilla Firefox';
        elseif (preg_match('/Chrome/i', $ua))
            $data['Browser'] = 'Google Chrome';
        elseif (preg_match('/Safari/i', $ua))
            $data['Browser'] = 'Apple Safari';
        elseif (preg_match('/Opera/i', $ua))
            $data['Browser'] = 'Opera';
        elseif (preg_match('/Netscape/i', $ua))
            $data['Browser'] = 'Netscape';

        $data['Time'] = number_format((float) microtime(true) - LARAVEL_START, 2, '.', '');

        (new WebStatsController)->addStat('PageLoad', json_encode($data));
    }
}
