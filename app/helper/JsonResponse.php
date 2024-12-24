<?php

// Helper function to send JSON response
function sendJsonResponse($status, $data = null, $message = null) {
    header('Content-Type: application/json');
    $response = [
        'status' => $status,
        'data' => $data,
        'message' => $message
    ];

    // Remove null values to avoid returning unnecessary fields
    $response = array_filter($response, function($value) {
        return !is_null($value);
    });

    echo json_encode($response);
    
    exit(); // Make sure no further code is executed after sending the response
}
