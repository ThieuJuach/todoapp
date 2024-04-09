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

    try {
        // Prepare update statement
        $sql = "UPDATE tasks SET task_description = :task_description, date = :date WHERE task_id = :task_id";

        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':task_description', $taskDescription);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':task_id', $taskID);
        $stmt->execute();

        // Redirect to index.php after successful update
        header("location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error updating task: " . $e->getMessage();
    }
} else {
    echo "Form data not provided!";
}
?>
