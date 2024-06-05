<?php
session_start();

if (!isset($_SESSION['booking'])) {
    header("Location: index.php");
    exit;
}

$booking = $_SESSION['booking'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Riwayat Bookingan Tiket</h2>
    <p>Terima Kasih Telah Menggunakan Layanan Kami! Ini Detail Reservasi Paket Wisata Anda:</p>
    <ul>
        <li>Paket: <?php echo htmlspecialchars($booking['packageName']); ?></li>
        <li>Nama: <?php echo htmlspecialchars($booking['name']); ?></li>
        <li>Email: <?php echo htmlspecialchars($booking['email']); ?></li>
        <li>Tanggal: <?php echo htmlspecialchars($booking['tanggal']); ?></li>
        <li>Jumlah Hari : <?php echo htmlspecialchars($booking['hari']); ?></li>
        <li>Jumlah Partisipan: <?php echo htmlspecialchars($booking['partisipan']); ?></li>
        <li>Total Harga: <?php echo htmlspecialchars($booking['totalHarga']); ?></li>
    </ul>
    <a href="index.php" class="btn btn-primary">Selesai</a>
    <a href="packages.php" class="btn btn-primary">Pesan Lagi</a>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
