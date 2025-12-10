<?php
$conn = new mysqli("localhost", "root", "", "padel");

if (isset($_GET['court'])) {
    $courtId = intval($_GET['court']);
} else {
    $courtId = 0;
}

$query = $conn->query("SELECT * FROM lapangan WHERE id = $courtId");
$data = $query->fetch_assoc();

if (!$data) {
    die("Lapangan tidak ditemukan!");
}

$photos = [];
$index = 1;

while (file_exists("img/court{$courtId}-{$index}.jpg")) {
    $photos[] = "img/court{$courtId}-{$index}.jpg";
    $index++;
}

if (empty($photos)) {
    $photos[] = "img/lapangan.png"; 
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $data['lapangan'] ?> — Detail Lapangan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-white">

<div class="container py-5">
  <div class="row gx-5">
    <div class="col-lg-5 mb-4">

      <div class="position-relative rounded overflow-hidden">
        <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
          
          <div class="carousel-inner">
            <?php foreach ($photos as $i => $img): ?>
              <div class="carousel-item <?php echo $i == 0 ? 'active' : '' ?>">
                <img src="<?php echo $img ?>" class="d-block w-100" alt="photo">
              </div>
            <?php endforeach; ?>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>

        <div class="position-absolute bottom-0 end-0 m-3">
          <span class="badge bg-dark bg-opacity-75 text-white rounded-pill px-3 py-2">Lihat semua foto</span>
        </div>
      </div>

    </div>

    <div class="col-lg-7">
      <div class="d-flex justify-content-between mb-3">
        <div>
        <h4 class="mb-1">
            <?php echo $data['lapangan'] ?> <small class="text-muted">›</small>
        </h4>
          <p class="text-muted mb-0"><?php echo $data['deskripsi'] ?></p>
        </div>
      </div>

      <!-- ICON - STATIC -->
      <div class="mb-3">
        <div class="mb-2">
          <i class="bi bi-basket me-2 text-muted"></i> <span class="me-3">Padel</span>
          <i class="bi bi-house-door me-2 text-muted"></i> <span class="me-3">Indoor</span>
          <i class="bi bi-grid-3x3-gap me-2 text-muted"></i> <span>Premier Padel Grass</span>
        </div>
      </div>

      <!-- DATE + JADWAL -->
      <div class="mb-4 d-flex align-items-center gap-3">
        <input type="date" class="form-control rounded-3 px-3 py-2">
        <button class="btn btn-danger rounded-3 px-4 py-2">
          2 Jadwal Tersedia <i class="bi bi-chevron-down ms-2"></i>
        </button>
      </div>

      <!-- SLOT JAM (STATIC) -->
      <div class="row g-3">

        <?php
        $slots = [
          ["11:00 - 12:00", true],
          ["12:00 - 13:00", true],
          ["13:00 - 14:00", true],
          ["15:00 - 16:00", true],
          ["16:00 - 17:00", true],
          ["17:00 - 18:00", true],
          ["19:00 - 20:00", true],
          ["22:00 - 23:00", false],
          ["23:00 - 00:00", false],
        ];

        foreach ($slots as $slot):
        ?>
        <div class="col-12 col-md-4">
          
          <?php if ($slot[1]): ?>
            <div class="card border-0 text-center py-3 opacity-50">
              <div class="card-body p-2">
                <div class="small text-muted">60 Menit</div>
                <div class="h6 mt-2"><?php echo $slot[0] ?></div>
                <div class="text-muted">Booked</div>
              </div>
            </div>
          <?php else: ?>
            <div class="card shadow-sm text-center py-3">
              <div class="card-body p-3">
                <div class="small text-muted">60 Menit</div>
                <div class="h6 mt-2"><?php echo $slot[0] ?></div>
                <div class="mt-2">
                  <div class="text-muted"><s>Rp<?php echo number_format($data['harga'],0,',','.') ?></s></div>
                  <div class="h6 text-danger m-0">Rp110.000</div>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
        <?php endforeach; ?>

      </div>

    </div>
  </div>

  <div class="mt-4 d-flex justify-content-end">
    <button class="btn btn-success w-50 py-3 rounded-3 fw-semibold">
      Booking Sekarang <i class="bi bi-arrow-right-circle ms-2"></i>
    </button>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
