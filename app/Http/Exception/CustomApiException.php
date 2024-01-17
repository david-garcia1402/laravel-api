<?php

namespace App\Http\Exception;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Arr;
use Spatie\FlareClient\Api;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomApiException extends HttpException
{
    public function __construct(string $message, int $code)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function ApiStatus()
    {
        // dd('oi');

        $return = abort(
            $this->code,
            $this->message
        );

        return $return;
    }
}
