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

        $response = $next($request);

        try {
            // Only GET requests
            if (! $request->isMethod('GET')) {
                return $response;
            }

            // Only requests expecting HTML
            if (! str_contains(
                $request->header('Accept', ''),
                'text/html'
            )) {
                return $response;
            }

            $ip = $request->ip();

            $position = GeoIP::getLocation($ip);

            // Check that a real country was found
            $country = $position?->countryName;
            $countryCode = $position?->countryCode;

            // Optional: log GeoIP result for testing
            logger()->info('GeoIP result', [
                'ip' => $ip,
                'country' => $country,
                'country_code' => $countryCode,
                'city' => $position?->cityName,
            ]);

            $recent = Visitor::where('ip_address', $ip)
                ->where('url', $request->fullUrl())
                ->where('created_at', '>=', now()->subMinutes(30))
                ->exists();

            if (! $recent) {
                Visitor::create([
                    'ip_address'   => $ip,
                    'country'      => $country,
                    'country_code' => $countryCode,
                    'region'       => $position?->regionName,
                    'city'         => $position?->cityName,
                    'latitude'     => $position?->latitude,
                    'longitude'    => $position?->longitude,
                    'url'          => $request->fullUrl(),
                    'user_agent'   => $request->userAgent(),
                ]);
            }

            // $recent = Visitor::where('ip_address', $ip)
            //     ->where('url', $request->fullUrl())
            //     ->where('created_at', '>=', now()->subMinutes(5))
            //     ->exists();

            // if (! $recent) {
            //     Visitor::firstOrCreate(
            //         [
            //             'ip_address' => $ip,
            //             'country'      => $position?->countryName,
            //             'country_code' => $position?->countryCode,
            //             'region'       => $position?->regionName,
            //             'city'         => $position?->cityName,
            //             'latitude'     => $position?->latitude,
            //             'longitude'    => $position?->longitude,
            //             'url'        => $request->fullUrl(),
            //             'user_agent'   => $request->userAgent(),
            //         ]
            //     );
            // }


        } catch (\Throwable $e) {
            report($e);
        }

        return $response;

    }
}
