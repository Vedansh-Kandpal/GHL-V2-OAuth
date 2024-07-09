<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $postData = file_get_contents('php://input');
    
    // Define the file to save data
    $filename = 'webhookResponse.txt';
    
    // Open the file in append mode
    $file = fopen($filename, 'a');
    
    if ($file) {
        // Write the data to the file, handling special characters properly
        
        // fwrite($file, $postData . PHP_EOL);
        $formattedData = json_encode($postData, JSON_PRETTY_PRINT) . PHP_EOL;

        // Write the formatted data to the file
        fwrite($file, $formattedData);
        
        // Close the file
        fclose($file);
        
        echo 'Data has been successfully written to ' . $filename;
    } else {
        echo 'Unable to open file ' . $filename . ' for writing.';
    }
} else {
    // Handle the case where the request method is not POST
    echo 'Invalid request method. Only POST requests are allowed.';
}
?>
