<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];

    $sql = "UPDATE stud SET name='$name', email='$email', address='$address', contact='$contact', course='$course' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: info.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT id, name, email, address, contact, course FROM stud WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="update.css">
  </head>

  
  <body>
    <div class="contaner">
    <form method="post" action="update.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <lable>NAME :</lable> <input class="fields" type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
    <lable>EMAIL :</lable> <input class="fields" type="text" name="email" value="<?php echo $row['email']; ?>" required><br>
    <lable>ADDRESS :</lable> <input class="fields" type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
    <lable>CONTACT :</lable> <input class="fields" type="text" name="contact" value="<?php echo $row['contact']; ?>" required><br>
    <lable>COURSE :</lable> <input class="fields" type="text" name="course" value="<?php echo $row['course']; ?>" required><br>
    <input class="btn" type="submit" value="Update">
</form>
    
    <script>
        $('#name').addClass('animated tada');
    </script>
  </body>
</html>
