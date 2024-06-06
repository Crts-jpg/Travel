<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liburan ke Yogyakarta</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
        }
        .carousel-item img {
            max-height: 500px;
            object-fit: cover;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<?php include 'layout/header.php'; ?>

<div class="container">
    <!--Bagian Image Slider -->
    <div id="tourCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#tourCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#tourCarousel" data-slide-to="1"></li>
            <li data-target="#tourCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/borobudurSlide.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Borobudur Temple</h5>
                    <p>Rasakan keindahan dari candi Buddha terbesar di dunia</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/perambananSlide.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Prambanan Temple</h5>
                    <p>Jelajahi kompleks candi Hindu yang megah.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/merapiSlide.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Gunung Merapi</h5>
                    <p>Petualangan menanti di salah satu gunung berapi paling aktif di Indonesia.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Paket Card -->
    <div class="row mt-4" id="paket">
        <div class="col-md-4">
            <div class="card">
                <img src="./assets/images/boro.jpg" class="card-img-top" alt="Borobudur Temple">
                <div class="card-body">
                    <h5 class="card-title">Borobudur Temple</h5>
                    <p class="card-text">Rasakan keindahan dari candi Buddha terbesar di dunia.</p>
                    <a href="package_details.php?package=borobudur" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="./assets/images/perambanan.jpg" class="card-img-top" alt="Prambanan Temple">
                <div class="card-body">
                    <h5 class="card-title">Prambanan Temple</h5>
                    <p class="card-text">Jelajahi kompleks candi Hindu yang megah.</p>
                    <a href="package_details.php?package=prambanan" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="./assets/images/merapi.jpg" class="card-img-top" alt="Mount Merapi">
                <div class="card-body">
                    <h5 class="card-title">Gunung Merapi</h5>
                    <p class="card-text">Petualangan menanti di salah satu gunung berapi paling aktif di Indonesia.</p>
                    <a href="package_details.php?package=merapi" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- YouTube Video -->
    <div class="row mt-4">
        <div class="col-12">
            <h3>Temukan Selengkapnya</h3>
            <div class="embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/FB0lGcA2aFg?si=cb29Lco3vXscnr0n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
