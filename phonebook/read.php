<?php
include 'db.php';

$sql = "SELECT * FROM contacts";
$stmt = $conn->query($sql);
$contacts = $stmt->fetchAll();

foreach ($contacts as $contact) {
    echo "ID: " . $contact['id'] . " - Name: " . $contact['name'] . 
         " - Phone: " . $contact['phone'] . 
         " - Email: " . $contact['email'] . "<br>";
}
?>

