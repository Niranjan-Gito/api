<?php

namespace GitoAPI\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\{NotFoundHttpException,MethodNotAllowedHttpException};

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
        BaseException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (config('app.env') === 'local')
        {
            return $this->renderExceptions($request, $exception);
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }
        return $this->handle($request, $exception);

    }

    /**
     * When In Local development
     * Convert the Exception into a JSON HTTP Response
     *
     * Set ENV=local
     * @param Request $request
     * @param Exception $e
     * @return JSONResponse
     */
    public function renderExceptions($request,$e)
    {
        if ( $request->expectsJson()  && ( ! $e instanceof ValidationException) )
        {
            // Default response of 400
            $status = 400;

            // If this exception is an instance of HttpException
            if ($this->isHttpException($e))
            {
                // Grab the HTTP status code from the Exception
                $status = $e->getStatusCode();
            }

            $json = [
                'success' => false,
                'error' => [
                    'exception' => get_class($e),
                    'message' => $e->getMessage(),
                    'trace' => $e->getTrace(),
                ],
            ];

            return response()->json($json, $status);
        }
    }

    /**
     * Convert the Exception into a JSON HTTP Response
     *
     * @param Request $request
     * @param Exception $e
     * @return JSONResponse
     */
    private function handle($request, Exception $e) {
        if($e instanceOf Exception || $e instanceof CommonException){
            $data['message'] = $e->getMessage();
            $data['status'] = 400;
        }
        if ($e instanceOf BaseException) {
            $data   = $e->toArray();
        }
        if ($e instanceOf NotFoundHttpException || $e instanceOf ModelNotFoundException) {
            $data = array_merge([
                'id' => 'not_found'
            ],trans(sprintf('errors.not_found')));
        }
        if ($e instanceOf MethodNotAllowedHttpException) {
            $data = array_merge([
                'id' => 'method_not_allowed'
            ],trans(sprintf('errors.method_not_allowed')));
        }
        return response()->json($data, $data['status']);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('login');
    }
}
