<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE contacts SET name = ?, phone = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $phone, $email, $id]);

    echo "Contact updated successfully!";
} else {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $contact = $stmt->fetch();
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
    <input type="text" name="name" value="<?= $contact['name'] ?>" required>
    <input type="text" name="phone" value="<?= $contact['phone'] ?>" required>
    <input type="email" name="email" value="<?= $contact['email'] ?>">
    <button type="submit">Update Contact</button>
</form>
