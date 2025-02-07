<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = htmlspecialchars($_POST['company_name']);
    $ie_code = htmlspecialchars($_POST['ie_code']);
    $address = htmlspecialchars($_POST['address']);
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $order_details = htmlspecialchars($_POST['order_details']);

    $to = "vetrivelinternationals@gmail.com"; // Replace with your email
    $subject = "New Order from $company_name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $message = "Company Name: $company_name\n";
    $message .= "IE Code: $ie_code\n";
    $message .= "Address: $address\n\n";
    $message .= "Contact Person: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n\n";
    $message .= "Order Details:\n$order_details\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Order placed successfully. We will contact you soon.";
    } else {
        echo "Failed to send order details. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
