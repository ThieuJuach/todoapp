<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('config.php');

    // Check if form is submitted and task_id is provided
    if (isset($_POST['updateTask']) && isset($_POST['task_id'])) {
        // Retrieve form data
        $taskID = $_POST['task_id'];
        $taskDescription = $_POST['task_description'];
        $date = $_POST['task_date'];
        
        // Prepare update statement
        $sql = "UPDATE tasks SET task_description = '$taskDescription', date = '$date' WHERE task_id = '$taskID'";
        
        // Execute update query
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Error updating task: " . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
    } else {
        echo "Form data not provided!";
    }
?>
