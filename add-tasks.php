<?php 

include 'config.php';

$title = $_POST['title'];
$completed = $_POST['completed'];
$sql = "INSERT INTO tasks (title, completed) VALUES ('$title','$completed')";


$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>