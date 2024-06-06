<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function calculateTotalPrice() {
            const servicePrices = {
                'penginapan': 1000000,
                'transportasi': 1200000,
                'makanan': 500000
            };

            let selectedServices = document.querySelectorAll('input[name="services[]"]:checked');
            let totalServicePrice = 0;
            selectedServices.forEach(service => {
                totalServicePrice += servicePrices[service.value];
            });

            const days = parseInt(document.getElementById('days').value) || 0;
            const participants = parseInt(document.getElementById('participants').value) || 0;

            const totalPrice = days * participants * totalServicePrice;

            document.getElementById('totalPrice').value = 'Rp ' + totalPrice.toLocaleString('id-ID');
        }
    </script>
</head>
<body>

<?php include 'layout/header.php'; ?>

<div class="container mt-5">
    <?php
    $package = isset($_GET['package']) ? $_GET['package'] : 'unknown';
    $packageDetails = [
        'borobudur' => 'Borobudur Temple',
        'prambanan' => 'Prambanan Temple',
        'merapi' => 'Mount Merapi'
    ];

    if (!array_key_exists($package, $packageDetails)) {
        echo "<h2>Invalid Package Selected</h2>";
    } else {
        echo "<h2>Package Details: " . $packageDetails[$package] . "</h2>";
    }
    ?>
    <form action="process_booking.php" method="post">
        <input type="hidden" name="package" value="<?php echo htmlspecialchars($package); ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date">Tanggal Yang Diinginkan</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="days">Jumlah Hari</label>
            <input type="number" class="form-control" id="days" name="days" required oninput="calculateTotalPrice()">
        </div>
        <div class="form-group">
            <label for="participants">Jumlah Partisipan</label>
            <input type="number" class="form-control" id="participants" name="participants" required oninput="calculateTotalPrice()">
        </div>
        <div class="form-group">
            <label for="services">Services</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" id="service1" value="penginapan" onclick="calculateTotalPrice()">
                <label class="form-check-label" for="service1">Penginapan (Rp 1.000.000)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" id="service2" value="transportasi" onclick="calculateTotalPrice()">
                <label class="form-check-label" for="service2">Transportasi (Rp 1.200.000)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" id="service3" value="makanan" onclick="calculateTotalPrice()">
                <label class="form-check-label" for="service3">Makanan (Rp 500.000)</label>
            </div>
        </div>
        <div class="form-group">
            <label for="totalPrice">Total Price</label>
            <input type="text" class="form-control" id="totalPrice" name="totalPrice" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
