<?php
session_start();
include 'sys_koneksi.php';

// Cek apakah user login
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login terlebih dahulu'); window.location.href='login.php';</script>";
    exit();
}

// Pastikan ada parameter id film
if (!isset($_GET['id'])) {
    die("Film not selected.");
}

$username = $_SESSION['username'];
$film_id  = intval($_GET['id']);

// Ambil data film dari database
$result = $koneksi->query("SELECT * FROM film WHERE id = $film_id");
if ($result && $result->num_rows > 0) {
    $film = $result->fetch_assoc();
    $film_title = $film['title'];
} else {
    $film_title = "Unknown Film";
}

// Total baris dan kolom
$rows = range('A', 'J');
$cols = 14;

// Acak kursi yang sudah dibooking
$bookedSeats = [];
$totalBooked = rand(15, 30); // random 15-30 kursi
while (count($bookedSeats) < $totalBooked) {
    $randomRow = $rows[array_rand($rows)];
    $randomCol = rand(1, $cols);
    $seat = $randomRow . $randomCol;
    if (!in_array($seat, $bookedSeats)) {
        $bookedSeats[] = $seat;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Ticket Booking - <?= htmlspecialchars($film_title) ?></title>
    <link rel="stylesheet" href="css/ticket.css">
</head>

<body>
    <h1>Booking for <?php echo htmlspecialchars($film['title']); ?></h1>

    <div class="screen-container">
        <div class="screen">SCREEN</div>
    </div>

    <div class="container">
        <div class="seats-container">
            <?php foreach ($rows as $r): ?>
                <div class="seat-row">
                    <div class="row-label"><?= $r ?></div>
                    <div class="seats-grid">
                        <?php for ($c = 1; $c <= $cols; $c++): ?>
                            <?php
                            $seatId = $r . $c;
                            $isGap = ($r >= 'A' && $r <= 'J' && $c >= 7 && $c <= 8);
                            $class = "seat";

                            if ($isGap) {
                                $class .= " empty";
                            } elseif (in_array($seatId, $bookedSeats)) {
                                $class .= " booked";
                            }
                            ?>
                            <div class="<?= $class ?>"
                                data-seat="<?= $seatId ?>"
                                data-row="<?= $r ?>"
                                <?= $isGap ? 'style="visibility: hidden;"' : '' ?>>
                                <?= $isGap ? '' : $c ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="legend">
                <div class="legend-item">
                    <div class="legend-color available"></div>
                    <span>Available</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color selected-legend"></div>
                    <span>Selected</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color booked-legend"></div>
                    <span>Booked</span>
                </div>
            </div>
        </div>

        <div class="side">
            <div class="card">
                <h3>Selected Seats</h3>
                <p id="selectedSeats">None</p>
                <p>Total Price: Rp. <span id="totalPrice">0</span></p>
            </div>

            <div class="card">
                <h3>Film Details</h3>
                <p><strong>Title:</strong> <?= htmlspecialchars($film['title']) ?></p>
                <?php if (isset($film['duration'])): ?>
                    <p><strong>Duration:</strong> <?= htmlspecialchars($film['duration']) ?> minutes</p>
                <?php endif; ?>
            </div>

            <div class="card">
                <h3>Payment Method</h3>
                <select id="paymentMethod">
                    <option value="Cash">Cash</option>
                    <option value="Dana">Dana</option>
                    <option value="Gopay">Gopay</option>
                    <option value="OVO">OVO</option>
                    <option value="ShopeePay">ShopeePay</option>
                </select>
                <br><br>
                <button class="btn" onclick="buyNow()">Buy Now</button>
            </div>
        </div>
    </div>

    <script>
        let selectedSeats = [];
        let totalPrice = 0;

        document.querySelectorAll('.seat').forEach(seat => {
            seat.addEventListener('click', () => {
                if (seat.classList.contains('booked') || seat.classList.contains('empty')) return;

                let seatId = seat.dataset.seat;
                let row = seat.dataset.row;
                let price = 45000;

                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeats = selectedSeats.filter(s => s.seatId !== seatId);
                    totalPrice -= price;
                } else {
                    seat.classList.add('selected');
                    selectedSeats.push({
                        seatId,
                        price
                    });
                    totalPrice += price;
                }

                document.getElementById('selectedSeats').innerText = selectedSeats.map(s => s.seatId).join(', ') || "None";
                document.getElementById('totalPrice').innerText = totalPrice.toLocaleString();
            });
        });

        function buyNow() {
            if (selectedSeats.length === 0) {
                alert("Please select at least one seat!");
                return;
            }

            let payment = document.getElementById('paymentMethod').value;
            let seats = selectedSeats.map(s => s.seatId).join(',');
            let price = totalPrice;

            window.location.href = `detail_ticket.php?username=<?= $username ?>&title=<?= urlencode($film_title) ?>&seats=${seats}&price=${price}&payment=${payment}`;
        }
    </script>
</body>

</html>