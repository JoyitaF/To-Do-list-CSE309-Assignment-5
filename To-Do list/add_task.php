
<?php

include('todolistconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task']; // Get the task from the form

    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
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