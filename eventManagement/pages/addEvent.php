<?php
include ('../db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventID = $_POST['event_id'];
    $name = $_POST['name'];
    $bookingDate = $_POST['booking_date'];  // Booking Date
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $contactInfo = $_POST['contact_info'];
    $status = $_POST['status'];  // Status
    $budget = $_POST['budget'];

    // Convert status string to 1 (Planned) or 0 (Cancelled)
    $statusValue = ($status == 'Planned') ? 1 : 0;

    // Modified SQL query with backticks around column names with spaces
    $sql = "INSERT INTO Event (`EventID`, `Name`, `Date_OF_Booking`, `Time`, `Venue`, `Contact_info`, `Status`, `Budget`) 
            VALUES ('$eventID', '$name', '$bookingDate', '$time', '$venue', '$contactInfo', '$statusValue', '$budget')";

    if ($conn->query($sql)) {
        $success = "Event added successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3 class="mb-4">Add New Event</h3>

    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <div class="row g-3">
            <div class="col-md-4">
                <label>Event ID</label>
                <input type="text" name="event_id" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Customer Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Booking Date</label>
                <input type="date" name="booking_date" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Time</label>
                <input type="time" name="time" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Venue</label>
                <input type="text" name="venue" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Contact Info</label>
                <input type="text" name="contact_info" class="form-control" placeholder="Separate multiple by commas" required>
            </div>
            <div class="col-md-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Budget</label>
                <input type="number" name="budget" class="form-control" step="0.01" required>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-success">Add Event</button>
            <a href="events.php" class="btn btn-secondary">Back to Events</a>
        </div>
    </form>
</div>
</body>
</html>
