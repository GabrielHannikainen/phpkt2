<?php

$banners = glob("reklaam/*.{jpg,png}", GLOB_BRACE);

shuffle($banners);
?>
<!DOCTYPE html>
<html lang="et">
<head>
<meta charset="UTF-8">
<title>EHITUS+ | Avaleht</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
.carousel-item img {
    height: 420px;
    object-fit: cover;
}
.hero-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.45);
}
.carousel-caption {
    bottom: 30%;
}
.section-title {
    font-weight: 600;
}
</style>
</head>

<body>

<?php include "navbar.php"; ?>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php foreach ($banners as $i => $img): ?>
      <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
        <img src="<?= $img ?>" class="d-block w-100">
        <div class="hero-overlay"></div>
        <div class="carousel-caption">
          <h1 class="fw-bold">Kvaliteetsed ehitusmaterjalid</h1>
          <p class="lead">Usaldusväärne partner sinu ehitusprojektis</p>
          <a href="products.php" class="btn btn-warning btn-lg mt-2">
            Vaata tooteid
          </a>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<section class="container py-5 text-center">
  <h2 class="section-title">Kõik ehituseks ühest kohast</h2>
  <p class="text-muted mt-3">
    Pakume laia valikut ehitusmaterjale nii professionaalidele kui koduehitajatele.
  </p>
</section>
<section class="bg-light py-5">
  <div class="container">
    <h3 class="text-center mb-4 section-title">Populaarsed tooted</h3>

    <div class="row g-4">

      <?php
      $featuredProducts = [
        ["Kipsplaat", "8.50 € / tk", "toode1.jpg"],
        ["OSB plaat", "15.90 € / tk", "toode2.jpg"],
        ["Puitpruss", "4.20 € / m", "toode3.jpg"],
        ["Betoonsegu", "6.80 € / kott", "toode4.jpg"]
      ];

      foreach ($featuredProducts as $p):
      ?>
      <div class="col-md-3 col-sm-6">
        <div class="card h-100 shadow-sm border-0">
          <img src="pildid/<?= $p[2] ?>" class="card-img-top" style="height:180px;object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="card-title"><?= $p[0] ?></h5>
            <p class="text-muted"><?= $p[1] ?></p>
            <a href="products.php" class="btn btn-outline-warning btn-sm">
              Vaata toodet
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<section class="container py-5 text-center">
  <h3 class="section-title">Vajad abi materjalide valikul?</h3>
  <p class="text-muted">Kasuta meie kalkulaatorit või võta meiega ühendust.</p>
  <a href="calculator.php" class="btn btn-success me-2">Kalkulaator</a>
  <a href="contact.php" class="btn btn-outline-secondary">Kontakt</a>
</section>

<footer class="bg-dark text-light text-center py-3">
  <small>© <?= date("Y") ?> EHITUS+. Kõik õigused kaitstud.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

