<div class="container" style="padding: 5rem">
    <div class="list-group">
<?php
require_once './header.php';


$db = new mysqli(

    'localhost',
    'root',
    '123456',
    'php_test'
);

$sql = "SELECT * FROM users";
$result = $db->query($sql);

foreach($result as $row){
    printf('<li class="list-group-item" style="padding: 2rem"><span>%s, Contact: (%s)</span>
    <a href="update.php?id=%s" class="btn btn-success">update</a>
    <a href="delete.php?id=%s" class="btn btn-danger">delete</a>
</li>',
        htmlspecialchars($row['name'], ENT_QUOTES),
        htmlspecialchars($row['contact'], ENT_QUOTES),
        htmlspecialchars($row['id'], ENT_QUOTES),
        htmlspecialchars($row['id'], ENT_QUOTES),
    
    );
}
?>
</div>
<a href="form.php" class="btn btn-info" style="margin:1rem;">Home</a>
</div>
<?php 
require_once './footer.php'?>