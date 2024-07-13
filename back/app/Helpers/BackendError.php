<?php

namespace App\Helpers;


class BackendError
{
    public static function notFound(string $message = 'resource not found') {
        return response()->json([
            'message' => $message
        ], 404);
    }
}
