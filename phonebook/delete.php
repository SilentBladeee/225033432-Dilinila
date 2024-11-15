<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM contacts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    echo "Contact deleted successfully!";
}
?>

<form method="POST" action="">
    <input type="text" name="id" placeholder="Contact ID" required>
    <button type="submit">Delete Contact</button>
</form>

