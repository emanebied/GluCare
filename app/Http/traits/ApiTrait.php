<?php
namespace App\Http\traits;

trait ApiTrait{

    public static function successMessage(string $message = "", int $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'errors' => (object)[],
            'data' => (object)[],
        ], $statusCode);
    }

    public static function errorMessage(array $errors, string $message = "", int $statusCode = 422)
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors,
            'data' => (object)[],
        ], $statusCode);
    }

    public static function data(array $data, string $message = "", int $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'errors' => (object)[],
            'data' => $data,
        ], $statusCode);
    }
}
