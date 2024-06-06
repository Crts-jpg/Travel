<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function calculatehargaTotal() {
            const hargaService = {
                'penginapan': 1000000,
                'transportasi': 1200000,
                'makanan': 500000
            };

            let selectedServices = document.querySelectorAll('input[name="services[]"]:checked');
            let totalHargaServis = 0;
            selectedServices.forEach(service => {
                totalHargaServis += hargaService[service.value];
            });

            const hari = parseInt(document.getElementById('hari').value) || 0;
            const participants = parseInt(document.getElementById('participants').value) || 0;

            const hargaTotal = hari * participants * totalHargaServis;

            document.getElementById('hargaTotal').value = 'Rp ' + hargaTotal.toLocaleString('id-ID');
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
            <label for="hari">Jumlah Hari</label>
            <input type="number" class="form-control" id="hari" name="hari" required oninput="calculatehargaTotal()">
        </div>
        <div class="form-group">
            <label for="participants">Jumlah Partisipan</label>
            <input type="number" class="form-control" id="participants" name="participants" required oninput="calculatehargaTotal()">
        </div>
        <div class="form-group">
            <label for="services">Services</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" id="service1" value="penginapan" onclick="calculatehargaTotal()">
                <label class="form-check-label" for="service1">Penginapan (Rp 1.000.000)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" id="service2" value="transportasi" onclick="calculatehargaTotal()">
                <label class="form-check-label" for="service2">Transportasi (Rp 1.200.000)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" id="service3" value="makanan" onclick="calculatehargaTotal()">
                <label class="form-check-label" for="service3">Makanan (Rp 500.000)</label>
            </div>
        </div>
        <div class="form-group">
            <label for="hargaTotal">Harga Total</label>
            <input type="text" class="form-control" id="hargaTotal" name="hargaTotal" readonly>
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
