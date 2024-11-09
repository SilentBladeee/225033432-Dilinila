<?php
include 'db.php';

// Fetch users from database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User CRUD</title>
</head>
<body>

<h2>CRUD Operations on Users</h2>

<!-- Display Users -->
<h3>Users List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $row['id']; ?>">Update</a> | 
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<!-- Create User Form -->
<h3>Create New User</h3>
<form method="POST" action="create.php">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Create User">
</form>

</body>
</html>

<?php $conn->close(); ?>
