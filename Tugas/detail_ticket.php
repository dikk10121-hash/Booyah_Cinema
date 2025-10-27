<?php
session_start();
include 'sys_koneksi.php';

// Cek apakah user login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil parameter dari URL
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';
$seats_str = isset($_GET['seats']) ? $_GET['seats'] : '';
$price_total = isset($_GET['price']) ? (int)$_GET['price'] : 0;
$payment = isset($_GET['payment']) ? htmlspecialchars($_GET['payment']) : '';

// Split seats
$seats = explode(',', $seats_str);
$seats = array_map('trim', $seats);
$num_seats = count($seats);

// Hitung harga per kursi
$price_per_seat = $num_seats > 0 ? $price_total / $num_seats : 0;

// Ambil poster dari database berdasarkan judul
$result = $koneksi->query("SELECT poster FROM film WHERE title = '" . $koneksi->real_escape_string($title) . "'");
$poster_url = 'https://via.placeholder.com/150x225/2a2a2a/cccccc?text=No+Poster';
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $poster_url = $row['poster'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ticket Details</title>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/detail_ticket.css">
</head>
<body>
    <div class="header">
        <h1>Your Movie Tickets</h1>
        <p>Thank you for your purchase. Please present this ticket at the cinema.</p>
    </div>
    
    <div class="ticket-container">
        <?php foreach ($seats as $index => $seat): ?>
            <?php
            // Check if ticket already exists
            $checkQuery = "SELECT id FROM tickets WHERE username = ? AND title = ? AND seat = ?";
            $checkStmt = $koneksi->prepare($checkQuery);
            $checkStmt->bind_param("sss", $username, $title, $seat);
            $checkStmt->execute();
            $checkStmt->store_result();
            if ($checkStmt->num_rows == 0) {
                // Insert into database
                $insertQuery = "INSERT INTO tickets (username, title, seat, price, payment) VALUES (?, ?, ?, ?, ?)";
                $stmt = $koneksi->prepare($insertQuery);
                $stmt->bind_param("sssis", $username, $title, $seat, $price_per_seat, $payment);
                $stmt->execute();
                $ticket_id = $koneksi->insert_id;
                $stmt->close();
            } else {
                // Get existing ticket_id
                $checkStmt->bind_result($existing_id);
                $checkStmt->fetch();
                $ticket_id = $existing_id;
            }
            $checkStmt->close();
            ?>
            <div class="ticket">
                <div class="ticket-id">#<?= $ticket_id ?></div>
                <div class="ticket-info">
                    <h3>Seat <?= htmlspecialchars($seat) ?></h3>
                    <p><span class="label">Username:</span> <span class="value"><?= $username ?></span></p>
                    <p><span class="label">Movie Title:</span> <span class="value"><?= $title ?></span></p>
                    <p><span class="label">Seat Number:</span> <span class="value"><?= htmlspecialchars($seat) ?></span></p>
                    <p><span class="label">Price:</span> <span class="value">Rp. <?= number_format($price_per_seat, 0, ',', '.') ?></span></p>
                    <p><span class="label">Payment Method:</span> <span class="value"><?= $payment ?></span></p>
                </div>
                <div class="ticket-poster">
                    <img src="<?= $poster_url ?>" alt="Movie Poster" class="movie-poster">
                    <div class="poster-label"><?= $title ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="summary">
        <h3>Order Summary</h3>
        <div class="summary-row">
            <span>Number of Tickets:</span>
            <span><?= $num_seats ?></span>
        </div>
        <div class="summary-row">
            <span>Price per Ticket:</span>
            <span>Rp. <?= number_format($price_per_seat, 0, ',', '.') ?></span>
        </div>
        <div class="summary-row">
            <span>Total Amount:</span>
            <span>Rp. <?= number_format($price_total, 0, ',', '.') ?></span>
        </div>
    </div>
    
    <a href="index.php" class="back-btn">Back to Home</a>
</body>
</html>