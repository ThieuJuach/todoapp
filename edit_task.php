<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Check if task_id is provided in the URL
if (isset($_GET['task_id'])) {
    // Retrieve task_id from URL parameter
    $taskID = $_GET['task_id'];
    
    // Prepare select statement
    $sql = "SELECT * FROM tasks WHERE task_id = :task_id";
    
    // Prepare and execute statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':task_id', $taskID);
    $stmt->execute();
    
    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $taskDescription = $row['task_description'];
        $date = $row['date'];
    } else {
        echo "Task not found!";
        exit();
    }
} else {
    echo "Task ID not provided!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content here -->
</head>
<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <!-- Header content here -->

    <section id="hero" class="hero">
        <!-- Hero content here -->

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <h2>Edit Task</h2>
                        <form id="custom-card-form" action="update.php" method="POST">
                            <input type="hidden" name="task_id" class="form-control" value="<?php echo $taskID; ?>">
                            <div class="mb-3">
                                <label for="task-description-input" class="form-label">Task Description</label>
                                <input type="text" class="form-control" name="task_description" value="<?php echo $taskDescription; ?>" placeholder="Enter task description">
                            </div>
                            <div class="mb-3">
                                <label for="task-date-input" class="form-label">Date</label>
                                <input type="date" class="form-control" name="task_date" value="<?php echo $date; ?>">
                            </div>
                            <button class="btn btn-primary" type="submit" name="updateTask">Update Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll Top Button and Preloader content here -->

    <!-- Vendor JS Files and Template Main JS File here -->

</body>
</html>

<?php
// No need to close PDO connection
?>
