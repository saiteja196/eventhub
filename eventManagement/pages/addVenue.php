<?php
include '../db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $cost = $_POST['cost'];
    $facilities = $_POST['facilities'];
    $availability = $_POST['availability'];
    $eventID = $_POST['event_id'];

    $sql = "INSERT INTO Venue (Name, Location, Cost, Facilities, Availability, EventID)
            VALUES ('$name', '$location', '$cost', '$facilities', '$availability', '$eventID')";

    if ($conn->query($sql)) {
        header("Location: venue.php?success=1");
        exit();
    } else {
        $error = "Error adding venue: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Add Venue</h3>

    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <div class="row g-3">
            <div class="col-md-6">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Cost</label>
                <input type="number" step="0.01" name="cost" class="form-control" required>
            </div>
            <div class="col-md-8">
                <label>Facilities</label>
                <input type="text" name="facilities" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Availability</label>
                <select name="availability" class="form-select" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Event ID</label>
                <input type="number" name="event_id" class="form-control">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Add</button>
            <a href="venue.php" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
</body>
</html>
