<?php

// Get the song parameter from the query string
$song = isset($_GET['song']) ? $_GET['song'] : '';

if (!empty($song)) {
    // Construct the URL with the song parameter
    $url = 'https://jiosavan-coderaryan.vercel.app/search?query=' . urlencode($song);

    // Make the API request
    $response = file_get_contents($url);

    if ($response) {
        $responseData = json_decode($response, true);

        // Check if the response contains the "results" field
        if (isset($responseData['results'])) {
            $results = $responseData['results'];

            // Output the results
            echo '<pre>';
            print_r($results);
            echo '</pre>';
        } else {
            echo 'Invalid response format';
        }
    } else {
        echo 'Failed to fetch data from the API';
    }
} else {
    echo 'Missing song parameter';
}

?>
