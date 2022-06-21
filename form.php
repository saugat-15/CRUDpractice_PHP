<div class="container">
<?php
require_once './header.php';


$name = '';
$email = '';
$contact = '';

if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    }
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
    } else {
        $email = $_POST['email'];
    }
    if (!isset($_POST['contact']) || $_POST['contact'] === '') {
        $ok = false;
    } else {
        $contact = $_POST['contact'];
    };

    if ($ok) {
        echo "<p>Thank You for submitting the form, $name</p>";
        $db = new mysqli(
            'localhost',
            'root',
            '123456',
            'php_test'
        );

        $sql = sprintf(
            "INSERT INTO users (name, email, contact) VALUES ('%s', '%s', '%s')",
            $db->real_escape_string($name),
            $db->real_escape_string($email),
            $db->real_escape_string($contact),
        );

        $db->query($sql);
        $db->close();
    }
}



?>


<form action="" method="POST">
    <div class="form-group" style="padding: 5rem">
    User Name: <input type="text" class="form-control"name="name" value="<?php 
        echo htmlspecialchars($name, ENT_QUOTES);
    ?>"><br>
    Email: <input type="email" class="form-control" name="email" value="<?php 
        echo htmlspecialchars($email, ENT_QUOTES);
    ?>"><br>
    Contact: <input type="text" class="form-control" name="contact" value="<?php 
        echo htmlspecialchars($contact, ENT_QUOTES);
    ?>"><br>
    <input type="submit" class="btn btn-success" name="submit" value="Register">
    <a href="select.php" class="btn btn-primary">View List</a>
</div>
</form>
</div>
<?php 
require_once './footer.php'?>