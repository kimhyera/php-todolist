<?php 


$conn=mysqli_connect("localhost","root","889900","todo_app"); 
// 접속 실패 시 메시지 나오게 하기 
if (mysqli_connect_errno($conn)) { echo "MySQL접속 실패: " . mysqli_connect_error(); } 

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