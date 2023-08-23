<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Bootstrap  link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>To-Do List</title>

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">To-Do List</h1>

        <form class="form-inline mt-3" action="add_task.php" method="post" style="margin-bottom: 10px;">
            <div class="form-group mr-2">
                <input type="text" class="form-control" name="task" placeholder="Enter a new task" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <ul class="list-group">
            <?php
            // Connection
            include('todolistconn.php');

            $sql = "SELECT id, task, complete FROM tasks";
            $result = mysqli_query($conn, $sql);

            // Fetch Tasks
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $task = $row['task'];
                    $task_id = $row['id'];
                    $is_completed = $row['complete'];
            
                    // Determine the Bootstrap CSS based on completion
                    $taskClass = $is_completed ? 'list-group-item completed-task' : 'list-group-item';
            
                    echo "<li class='$taskClass'>";
                    if ($is_completed) {
                        echo "<del>$task</del>";
                    } else {
                        echo $task;
                    }
                    
                    echo "<div class='float-right'>";
                    echo "<a href='delete_task.php?id=$task_id'><small>Delete</small></a>";

                    if (!$is_completed) {
                        echo " | <a href='mark_as_done.php?id=$task_id'><small>Mark as Done</small></a>";
                    }
                    echo "</div>";
                    
                    echo "</li>";
                }

            } else {
                echo 'No tasks found.';
            }


            mysqli_close($conn);
            ?>
        </ul>


    </div>

    <!-- Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>



