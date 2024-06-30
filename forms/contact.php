<?php
$receiving_email_address = 'arjunasatria1717@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = 'New Contact Form Submission';

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
$contact->smtp = array(
  'host' => 'smtp.example.com',
  'username' => 'your_username@example.com',
  'password' => 'your_password',
  'port' => '587',
  'encryption' => 'tls' // tls or ssl
);

$contact->add_message($_POST['name'], 'Name');
$contact->add_message($_POST['company-name'], 'Company Name');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['number'], 'Number');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
