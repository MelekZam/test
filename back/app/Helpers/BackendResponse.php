<?php

namespace App\Helpers;


class BackendResponse
{
    public static function success(array $data) {
        return response()->json([
            'message' => 'success',
            ...$data,
        ], 200);
    }
}
