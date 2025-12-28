<?php

namespace App\Helpers;

class ApiResponse
{
    public static function continue()
    {
        return response()->json([
            'success' => true,
            'message' => 'Request approved.',
            'data' => null,
        ], 100);
    }

    public static function switchProtocol()
    {
        return response()->json([
            'success' => true,
            'message' => 'Request switch protocol.',
            'data' => null,
        ], 101);
    }

    public static function success($data = null, string $message = 'Success.')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    public static function dataNotfound($errors = null, string $message = 'Data not found.')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], 404);
    }

    public static function internalServerError($errors = null, string $message = 'Internal server error.')
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], 500);
    }

    public static function unauthorized(string $message = 'Unauthorized.')
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
        ], 401);
    }

    public static function forbidden(string $message = 'Forbidden.')
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
        ], 403);
    }

    public static function unprocessableContent($errors = null, string $message = 'Unprocessable Content.')
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], 422);
    }

    public static function badResource()
    {
        return response()->json([
            'success' => false,
            'message' => 'Bad resource.',
            'data' => null,
        ], 301);
    }

    public static function badRequest($errors = null, string $message = 'Bad request.')
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], 400);
    }
}
