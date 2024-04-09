<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('config.php');

    // Check if task_id is provided in the URL
    if (isset($_GET['task_id'])) {
        // Retrieve task_id from URL parameter
        $taskID = $_GET['task_id'];
        
        // Prepare select statement
        $sql = "SELECT * FROM tasks WHERE task_id = '$taskID'";
        
        // Execute select query
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - to-do list </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>to-do list</h1>
        <span>.</span>
      </a>
    </div>
    <section id="hero" class="hero">

<img src="to-do.jpg" alt="" data-aos="fade-in">

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
          </div></div></div></div></section>

     <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>

<?php
    // Close connection
    mysqli_close($conn);
?>
