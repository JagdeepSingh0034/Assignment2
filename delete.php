<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM stud WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: info.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee</title>
    <link rel="stylesheet" type="text/css" href="delete.css">
</head>
<body>
<h2>Delete Employee</h2>
<p>Are you sure you want to delete this employee?</p>
<form method="post" action="delete.php?id=<?php echo $id; ?>">
    <input type="submit" value="Yes">
    <a href="info.php">No</a>
</form>
</body>
</html>
