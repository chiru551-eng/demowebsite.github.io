<?php
/**
 * Requires the "PHP Email Form" library
 * The library should be uploaded to: assets/vendor/php-email-form/php-email-form.php
 * For more info: https://bootstrapmade.com/php-email-form/
 */

// Replace with your actual receiving email address
$receiving_email_address = 'chiranjit551@gmail.com';

// Load the PHP Email Form library
$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form_path)) {
  require_once($php_email_form_path);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

// Create the email form object
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Set email parameters
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'Anonymous';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'no-reply@example.com';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'New Contact Form Submission';

// Optional: Use SMTP (recommended for reliable delivery)
$contact->smtp = array(
  'host' => 'smtp.yourdomain.com',       // e.g., smtp.gmail.com
  'username' => 'your_email@domain.com', // your SMTP username
  'password' => 'your_password',         // your SMTP password
  'port' => '587'                         // usually 587 for TLS or 465 for SSL
);

// Add form messages
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send the email and echo the result
echo $contact->send();
?>