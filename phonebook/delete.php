<?php
    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM contacts WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Contact deleted successfully!";
        } else {
            echo "Failed to delete contact: " . $conn->error;
        }
    }
    header("Location: index.php");
    exit();
?>
