<?php

include('todolistconn.php');

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $update_query = "UPDATE tasks SET complete = 1 WHERE id = '$task_id'";
    mysqli_query($conn, $update_query);
}

header("Location: todolist.php");

mysqli_close($conn);
?>
