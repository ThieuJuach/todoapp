<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";

// Check if task_id is provided in the URL
if (isset($_GET['task_id'])) {
    // Retrieve task_id from URL parameter
    $taskID = $_GET['task_id'];

    try {
        // Prepare update statement
        $sql = "UPDATE tasks SET status = 'Done' WHERE task_id = :task_id";
        
        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskID);
        $stmt->execute();

        // Redirect to index.php after successful update
        header("location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error updating task status: " . $e->getMessage();
    }
} else {
    echo "Task ID not provided!";
}
?>
