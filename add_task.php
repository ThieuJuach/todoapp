<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include 'config.php';

    // Check if form is submitted
    if (isset($_POST['add'])) {
        // Retrieve form data
        $taskID = $_POST['task_id'];
        $taskDescription = $_POST['task_description'];
        $date = $_POST['date'];
        
        // Prepare insert statement
        $sql = "INSERT INTO tasks (task_id, task_description, status, date) VALUES ('$taskID', '$taskDescription', 'Pending', '$date')";
        
        // Execute query
        if (mysqli_query($conn, $sql)) {
            echo "Task added successfully!";
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
    }
?>
