<?php
include 'db.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Event Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="ui.css" rel="stylesheet">
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2">
    <a class="navbar-brand" href="#">EventSpace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse align-items-center" id="navbarContent">
        <!-- Left Links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
            <li class="nav-item"><a class="nav-link" href="pages/events.php">Events</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/venue.php">Venues</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/attendee.php">Attendees</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/organiser.php">Organisers</a></li>
        </ul>

        <!-- Search -->
        <form class="d-flex me-3" method="GET" action="search.php">
            <input class="form-control me-2" type="search" name="query" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>

        <!-- Profile -->
        <div class="d-flex align-items-center">
            <img src="PP.jpeg" alt="Profile" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
            <div class="dropdown">
                <a class="text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <?php echo $_SESSION['username']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                    <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>



<!-- Dashboard Content -->
<div class="container mt-4">
    <h3 class="text-center mb-4">Welcome, <?php echo $_SESSION['username']; ?></h3>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="pages/events.php" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">📅 Events</h5>
                        <p class="card-text">Manage your events here.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pages/venue.php" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-success">🏟 Venues</h5>
                        <p class="card-text">View and edit venue details.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pages/attendee.php" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">👥 Attendees</h5>
                        <p class="card-text">Monitor all attendees.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pages/organiser.php" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title text-warning">🧑‍💼 Organisers</h5>
                        <p class="card-text">Manage event organisers.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
