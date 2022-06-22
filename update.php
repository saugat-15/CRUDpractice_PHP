<div class="container">
    <div class="form-group" style="padding: 5rem" >
<?php
require_once './header.php';


if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: select.php');
}

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
        // echo "<p>form Updated, $name</p>";
        $db = new mysqli(
            'localhost',
            'root',
            '123456',
            'php_test'
        );

        $sql = sprintf(
            "UPDATE users SET name='%s', email='%s', contact='%s' WHERE id=%s",
            $db->real_escape_string($name),
            $db->real_escape_string($email),
            $db->real_escape_string($contact),
            $id
        );

        $db->query($sql);
        if ($sql) {
            echo "<p class='alert alert-success'>User updated</p>";
        };
        $db->close();
    } else {
        $db = new mysqli(
            'localhost',
            'root',
            '123456',
            'php_test'
        );

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $db->query($sql);
        foreach ($result as $row) {
            $name = $row['name'];
            $gender = $row['email'];
            $color = $row['contact'];
        }

        $db->close();
    }
}
?>


<form action="" method="POST">
    User Name: <input type="text" class="form-control" name="name" value="<?php
                                                        echo htmlspecialchars($name, ENT_QUOTES);
                                                        ?>"><br>
    Email: <input type="email" class="form-control" name="email" value="<?php
                                                    echo htmlspecialchars($email, ENT_QUOTES);
                                                    ?>"><br>
    Contact: <input type="text" class="form-control" name="contact" value="<?php
                                                        echo htmlspecialchars($contact, ENT_QUOTES);
                                                        ?>"><br>
    <input type="submit" name="submit" class="btn btn-success" value="Update">
    <a href="form.php" class="btn btn-info">home</a>
</form>
</div>
</div>
<?php 
require_once './footer.php'?>