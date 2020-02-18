<?php

namespace App\Helpers;

class Helper
{
    public static function json($data = null, $status = 200)
    {
        if (is_int($data)) {
            return response()->json([
                'status' => $data,
                'data' => $data,
            ]);
        }

        return response()->json([
            'status' => $status,
            'data' => $data,
        ]);
    }
}
