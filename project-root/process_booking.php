<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package = $_POST['package'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tanggal = $_POST['date'];
    $hari = $_POST['days'];
    $partisipan = $_POST['participants'];
    $services = isset($_POST['services']) ? $_POST['services'] : [];
    $totalHarga = $_POST['totalPrice'];

    if (empty($name) || empty($email) || empty($tanggal) || empty($hari) || empty($partisipan) || empty($services)) {
        echo "All fields must be filled out.";
        return;
    }

    $packageName = '';
    switch ($package) {
        case 'borobudur':
            $packageName = 'Borobudur Temple';
            break;
        case 'prambanan':
            $packageName = 'Prambanan Temple';
            break;
        case 'merapi':
            $packageName = 'Mount Merapi';
            break;
        default:
            $packageName = 'Unknown Package';
            break;
    }

    // Convert totalPrice to a number for storage
    $totalHargaNumber = floatval(str_replace(',', '', str_replace('Rp ', '', $totalHarga)));

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, tanggal, hari, partisipan, total_harga, paket) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiis", $name, $email, $tanggal, $hari, $partisipan, $totalHargaNumber, $packageName);

    if ($stmt->execute()) {
        // Store booking information in the session
        $_SESSION['booking'] = [
            'packageName' => $packageName,
            'name' => $name,
            'email' => $email,
            'tanggal' => $tanggal,
            'hari' => $hari,
            'partisipan' => $partisipan,
            'totalHarga' => $totalHarga
        ];

        header("Location: booking_summary.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
