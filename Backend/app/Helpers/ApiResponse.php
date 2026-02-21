<?php
    
function success(mixed $data = null, string $message = 'success', int $status = 200){
    return response()->json([
        'success' => true,
        'message' => $message,
        'data' => $data
    ], $status);
};

function error(string $message = 'Error', int $status = 400, mixed $errors = null){
    return response()->json([
        'success' => false,
        'message' => $message,
        'errors' => $errors
    ], $status);
}