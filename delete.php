<div class="card text-center alert alert-danger">
    <div class="car-body">
<?php
require_once './header.php';

if(isset($_GET['id']) && ctype_digit($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('Location: selct.php');
}

$db = new mysqli(
    'localhost',
    "root",
    '123456',
    'php_test'

);

$sql = "DELETE FROM users WHERE id=$id";
$db->query($sql);
echo "<h4 class='card-header' style='padding:2rem'>User Deleted!</h4>";
$db->close();
?><br>
<a href="form.php" class="btn btn-info">Home</a>
</div>
</div>
<?php 
// require_once './footer.php'?>