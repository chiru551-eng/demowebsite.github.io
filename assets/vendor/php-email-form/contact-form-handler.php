<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "chiranjit551@gmail.com";
  $subject = $_POST["subject"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  $fullMessage = "Name: $name\n";
  $fullMessage .= "Email: $email\n\n";
  $fullMessage .= "Message:\n$message\n";

  if (mail($to, $subject, $fullMessage, $headers)) {
    echo "Message sent successfully!";
  } else {
    echo "Failed to send message.";
  }
}
?>