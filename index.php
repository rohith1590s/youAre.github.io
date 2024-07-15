<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = $_POST['response'];

    // Save the response to a file
    $file = fopen("responses.txt", "a");
    fwrite($file, date("Y-m-d H:i:s") . " - Response: " . $response . "\n");
    fclose($file);

    echo "Response received.";
}
?>
