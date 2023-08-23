<?php

include('todolistconn.php');

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id = '$taskId'";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: todolist.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>