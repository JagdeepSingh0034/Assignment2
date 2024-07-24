<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'config.php';

$sql = "SELECT id, name, email, address, contact, course FROM stud";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info</title>
    <link rel="stylesheet" href="info.css">
</head>
<body>
<h1>students List</h1>
<table class="rwd-table">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>ADDRESS</th>
    <th>CONTACT</th>
    <th>COURSE</th>
    <th>Actions</th>
  </tr>
  <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['contact']}</td>
                    <td>{$row['course']}</td>
                    <td>
                        <a href='read.php?id={$row['id']}'>View</a> | 
                        <a href='update.php?id={$row['id']}'>Edit</a> | 
                        <a href='delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }
    ?>
</table>
<a href="./register.php">Add New Student</a>
<a href="./index.php">Back to Home</a>
</body>
</html>