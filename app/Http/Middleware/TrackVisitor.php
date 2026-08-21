<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
//use Torann\GeoIP\Location;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    //$ip = $request->ip();
//     $position = GeoIP::getLocation();

// dd($position);

    $response = $next($request);

    try {

        $ip = $request->ip();
        
        $position = GeoIP::getLocation($ip);

        Visitor::create([
            'ip_address' => $ip,
            'country' => $position ? $position->countryName : null,
            'country_code' => $position ? $position->countryCode : null,
            'region' => $position ? $position->regionName : null,
            'city' => $position ? $position->cityName : null,
            'latitude' => $position ? $position->latitude : null,
            'longitude' => $position ? $position->longitude : null,
            'url' => $request->fullUrl(),
            'user_agent' => $request->userAgent(),
        ]);

        

    } catch (\Exception $e) {

        report('Visitor tracking error: ' . $e->getMessage());
    }

    return $response;
   
    
   
        // $response = $next($request);

        // $ip = $request->ip();

        // // Don't record local development addresses
        // if (!in_array($ip, ['127.0.0.1', '::1'])) {

        //     $position = GeoIP::getLocation($ip);

        //     if ($position) {

        //         Visitor::create([
        //             'ip_address' => $ip,
        //             'country' => $position->countryName,
        //             'country_code' => $position->countryCode,
        //             'region' => $position->regionName,
        //             'city' => $position->cityName,
        //             'latitude' => $position->latitude,
        //             'longitude' => $position->longitude,
        //             'url' => $request->fullUrl(),
        //             'user_agent' => $request->userAgent(),
        //         ]);
        //     }
        // }

        // return $response;
        
    }
}
