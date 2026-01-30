<?php
$result = "";

if ($_POST) {
    $area = $_POST['area'];
    $material = $_POST['material'];
    $discount = isset($_POST['discount']);

    if ($material == "krohv") {
        $pricePerM2 = 8;
    } elseif ($material == "varv") {
        $pricePerM2 = 5;
    } elseif ($material == "plaat") {
        $pricePerM2 = 18;
    } else {
        $pricePerM2 = 0;
    }

    $total = $area * $pricePerM2;

    if ($discount) {
        $total = $total * 0.9;
    }

    $result = "Materjal: $material | Pindala: $area m² | Hind: " . number_format($total, 2) . " €";

    file_put_contents(
        "orders.txt",
        date("Y-m-d H:i") . " | " . $result . "\n",
        FILE_APPEND
    );
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
<meta charset="UTF-8">
<title>EHITUS+ | Kalkulaator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
.hero-section {
    position: relative;
    background: url('reklaam/hero.jpg') center/cover no-repeat;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
}
.hero-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.45);
}
.section-title {
    font-weight: 600;
}
</style>
</head>
<body>

<?php include "navbar.php"; ?>

<div class="hero-section mb-5">
    <div class="hero-overlay"></div>
    <div class="position-relative">
        <h1 class="fw-bold">Ehituskalkulaator</h1>
        <p class="lead">Arvuta materjali hind kiiresti ja mugavalt</p>
    </div>
</div>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Pindala (m²)</label>
                    <input type="number" name="area" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Materjal</label>
                    <select name="material" class="form-select" required>
                        <option value="krohv">Krohvimine (8 € / m²)</option>
                        <option value="varv">Värvimine (5 € / m²)</option>
                        <option value="plaat">Plaatimine (18 € / m²)</option>
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="discount" id="discount">
                    <label class="form-check-label" for="discount">
                        Püsikliendi soodustus –10%
                    </label>
                </div>

                <button class="btn btn-success w-100">Arvuta hind</button>

                <?php if ($result): ?>
                <div class="alert alert-info mt-4">
                    <?= $result ?>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<!-- ⚫ FOOTER -->
<footer class="bg-dark text-light text-center py-3">
  <small>© <?= date("Y") ?> EHITUS+. Kõik õigused kaitstud.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

