<?php
$rows = array_map('str_getcsv', file('materials.csv'), array_fill(0, 100, ';'));
$header = array_shift($rows);
?>
<!DOCTYPE html>
<html lang="et">
<head>
<meta charset="UTF-8">
<title>EHITUS+ | Ehitusmaterjalid</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body { font-family: 'Inter', sans-serif; }
.section-title { font-weight: 600; }
.product-card img { height: 180px; object-fit: cover; }
.product-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
.product-card:hover { transform: translateY(-5px); box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.15); }
.price { font-size: 1.1rem; font-weight: 600; }
</style>
</head>
<body>

<?php include "navbar.php"; ?>

<section class="bg-light py-5 text-center">
  <div class="container">
    <h1 class="fw-bold">Ehitusmaterjalid kõikidest kategooriatest</h1>
    <p class="lead text-muted mt-3">Leia kvaliteetsed materjalid oma ehitusprojekti jaoks</p>
    <a href="calculator.php" class="btn btn-success btn-lg mt-3">Kalkulaator</a>
  </div>
</section>

<section class="container py-5">
  <h2 class="text-center mb-5 section-title">Kõik materjalid</h2>

  <div class="row g-4">
    <?php foreach ($rows as $row):
      $data = array_combine($header, $row);
    ?>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card product-card h-100 shadow-sm border-0">
          <img src="pildid/<?= $data['image'] ?>" class="card-img-top">

          <div class="card-body d-flex flex-column text-center">
            <h5 class="card-title mb-2"><?= $data['name'] ?></h5>

            <div class="price text-warning mb-2">
              <?= $data['price'] ?> € / <?= $data['unit'] ?>
            </div>

            <p class="text-muted small mb-3">
              Kvaliteetne ehitusmaterjal professionaalseks kasutamiseks.
            </p>

            <a href="add_to_cart.php?name=<?= urlencode($data['name']) ?>&price=<?= $data['price'] ?>&unit=<?= $data['unit'] ?>&image=<?= $data['image'] ?>" class="btn btn-warning mt-auto">
              Lisa ostukorvi
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
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
