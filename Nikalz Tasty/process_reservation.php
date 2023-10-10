<?php
// Include the Africa's Talking SDK
require 'vendor/autoload.php';

// Set your Africa's Talking API credentials
$username = "Akida";
$apiKey = "9a0aa16969d2a4e46556dc71f0bce279ad1971714adbe2706bae13452c72c41b";

// Initialize Africa's Talking SMS
$AT = new AfricasTalking\SDK\AfricasTalking($username, $apiKey);

// Create an instance of the SMS service
$sms = $AT->sms();

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["form_name"];
    // Retrieve other form fields here (e.g., phone number, items ordered)
    // ...

    // Compose the SMS message
    $message = "Reservation for $name. Items ordered: [Add details here]";

    // Recipient's phone number (you may get it from a form field)
    $phone = "+254114467728";

    // Send SMS
    try {
        $result = $sms->send([
            "to" => $phone,
            "message" => $message,
        ]);

        // SMS sent successfully
        echo "Reservation confirmed! You will receive an SMS shortly.";
    } catch (Exception $e) {
        // Handle SMS sending error
        echo "Reservation confirmed, but SMS notification failed.";
    }
}
?>
