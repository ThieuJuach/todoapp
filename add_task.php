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

    try {
        // Prepare insert statement
        $sql = "INSERT INTO tasks (task_id, task_description, status, date) VALUES (:task_id, :task_description, 'Pending', :date)";
        
        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskID);
        $stmt->bindParam(':task_description', $taskDescription);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close connection (PDO automatically closes connections)
?>
