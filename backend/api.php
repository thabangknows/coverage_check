<?php

// API endpoint URL
$api_url = 'https://services.metrofibre.co.za:8443/Address/ApiV1/CheckCoverageForCoordinate';

// API credentials
$api_key = 'uY1kM5yo5l7zoacaTUF2zAo5MwIhXAe6';
$username = 'Accelerit1@API';
$password = 'Giraffe5FD10E';


// Data to be sent in the request body (if needed)
$request_body = [
    'Id' => '0',
    'Coordinate' => [
        'Longitude' => '0',
        'Latitude' => '0',
    ],

];
// Initialize cURL session
$curl = curl_init($api_url);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set headers
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Adjust content type based on the API's requirements
    'Authorization: Basic ' . base64_encode($username . ':' . $password),
    'API-Key: ' . $api_key
]);

// Set the request type to POST (if needed)
curl_setopt($curl, CURLOPT_POST, true);

// Set the request body (if needed)
curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

// Execute cURL session and get the response
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    // Decode the JSON response if the API returns JSON
    $decoded_response = json_decode($response, true);

    // Process the response as needed
    var_dump($decoded_response);
}

// Close cURL session
curl_close($curl);

?>
