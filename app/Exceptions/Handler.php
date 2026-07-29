<?php

namespace App\Exceptions;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // $this->renderable(function(NotFoundHttpException $e, $request){
        //     return response()->json([
        //         'status' => false,
        //         'errors' => null,
        //         'data' => null,
        //         'message' => 'page not fund'

        //     ], Response::HTTP_NOT_FOUND);
        // });
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function render($request, Throwable $e)
    // {
    //     if ($this->isHttpException($e)) {
    //         return response()->view('errors.404');
    //     } else {
    //         return response()->view('errors.500');
    //     }
        
    // }

    public function render($request, Throwable $e)
{
    if ($e instanceof \ErrorException) {
        $response = response()->view('errors.500', [], 500);
        return  $this->toIlluminateResponse($response,$e);
    }

    return parent::render($request, $e);
}
}
