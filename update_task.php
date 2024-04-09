<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include "config.php";

    // Check if task_id is provided in the URL
    if (isset($_GET['task_id'])) {
        // Retrieve task_id from URL parameter
        $taskID = $_GET['task_id'];
        
        // Prepare update statement
        $sql = "UPDATE tasks SET status = 'Done' WHERE task_id = '$taskID'";
        
        // Execute update query
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Error updating task status: " . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
    } else {
        echo "Task ID not provided!";
    }
?>
