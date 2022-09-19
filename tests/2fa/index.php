<?php
require '../../vendor/autoload.php';
use PragmaRX\Google2FA\Google2FA;
#use PragmaRX\Google2FAQRCode\Google2FA;

$g = new Google2FA();


$email = 'will@wclarke.dev';
$name = 'cmshark';
$secret_key = $g->generateSecretKey();

// TODO Generate 2fa qr code + otp enter and validation 