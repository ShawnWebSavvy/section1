<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "No form submission detected.";
} else {
    echo "Form submitted successfully!<br>";

    $quantity = intval($_POST['quantity']);
    $countryCode = $_POST['countryCode'];
    
    echo "Quantity: $quantity<br>";
    echo "Country Code: $countryCode<br>";

    // Simple phone number generation logic
    $phoneNumbers = [];
    for ($i = 0; $i < $quantity; $i++) {
        $phoneNumbers[] = $countryCode . rand(1000000000, 9999999999);
    }

    echo "Generated Phone Numbers:<br>";
    echo "<pre>";
    print_r($phoneNumbers);
    echo "</pre>";

    // $url = 'http://mock-backend/mock-backend.php'; 
    // $url = 'http://localhost/mock-backend.php';
    // $url = 'http://127.0.0.1/Docker/Local/mock-backend.php';
    $url = 'http://127.0.0.1/Section1/mock-backend.php';

    $data = ['phoneNumbers' => $phoneNumbers, 'countryCode' => $countryCode];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    echo "Backend Response:<br>";
    echo "<pre>";
    print_r($response);
    echo "</pre>";

    // Display results
    if ($response) {
        $validCount = $response['validCount'];
    } else {
        $validCount = 0;
    }
    $totalCount = count($phoneNumbers);
    $percentage = ($totalCount > 0) ? ($validCount / $totalCount) * 100 : 0;
    echo "Out of the {$totalCount} numbers generated, {$validCount} were found to be valid for the country, which calculates to " . round($percentage, 2) . "% valid results.";
}
?>