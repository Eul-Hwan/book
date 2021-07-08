<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
    }

    // p.132 예외 처리 (서버가 작동을 하지 않음)
    // public function render($request, Exception $exception)
    // {
    //     if (app()->environment('production')) {
    //         if ($exception instanceof ModelNotFoundException) {
    //             return response(view('error.notice', [
    //                 'title' => '찾을 수 없습니다.',
    //                 'description' => '죄송합니다! 요청하신 페이지가 없습니다.'
    //             ]), 404);
    //         }
    //     }

    //     return parent::render($request, $exception);
    // }

    // 모델 예외 처리 p.174 (작동하지 않음)
    // public function render($request, Exception $exception)
    // {
    //     if (app()->environment('production')){
    //         $statusCode = 400;
    //         $title = '죄송합니다. :(';
    //         $description = '에러가 발생했습니다.';

    //         if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException or $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
    //             $statusCode = 404;
    //             $description = $exception->getMessage() ?: '요청하신 페이지가 없습니다.';
    //         }

    //         return response(view('errors.notice', [
    //             'title' => $title,
    //             'description' => $description,
    //         ]), $statusCode);
    //     }

    //     return parent::render($request, $exception);
    // }
}
