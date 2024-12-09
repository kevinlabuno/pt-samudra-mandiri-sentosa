<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    // Method lainnya...

    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception) && $exception->getStatusCode() === 404) {
            // Jika pengguna belum login, redirect ke login
            if (!auth()->check()) {
                return redirect()->route('login');
            }

            // Jika pengguna sudah login, redirect ke beranda
            return redirect()->route('beranda');
        }

        return parent::render($request, $exception);
    }
}
