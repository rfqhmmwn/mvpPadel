<?php 
error_reporting(E_ALL);   
ini_set('display_errors', 1);   
ini_set('display_startup_errors', 1);
session_start();
require 'function/function_booking.php'; 
require 'inc/config.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$messages = [];
$courtId = isset($_GET['court']) ? intval($_GET['court']) : 0;
$tanggal_dipilih = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d', strtotime('+1 day'));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking'])) {
    $result = processBooking(
        $_SESSION['user_id'],
        $_POST['lapangan_id'],
        $_POST['tanggal'],
        $_POST['jam_mulai']
    );
    
    if ($result['success']) {
        $messages[] = ['type' => 'success', 'text' => $result['message']];
    } else {
        $messages[] = ['type' => 'danger', 'text' => $result['message']];
    }
}

$courtData = getCourtData($courtId);
if (!$courtData) {
    die("Lapangan tidak ditemukan!");
}

$photos = getCourtPhotos($courtId);
$availableSlots = getAvailableSlots($courtId, $tanggal_dipilih);

$available_count = 0;
foreach($availableSlots as $slot) {
    if (!$slot['booked']) $available_count++;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $courtData['lapangan'] ?> — Detail Lapangan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-white">

<div class="container py-5">
  
  <div class="d-flex justify-content-between align-items-center mb-4">
    <a href="index.php" class="btn btn-outline-secondary">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <div class="text-end">
      <span class="me-3">Login sebagai: <strong><?php echo $_SESSION['username']; ?></strong></span>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>

  <?php foreach ($messages as $msg): ?>
    <div class="alert alert-<?php echo $msg['type']; ?> alert-dismissible fade show" role="alert">
      <?php echo $msg['text']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endforeach; ?>

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
      </div>
    </div>

    <div class="col-lg-7">
      <div class="mb-3">
        <h4 class="mb-1">
          <?php echo $courtData['lapangan'] ?> <small class="text-muted">›</small>
        </h4>
        <p class="text-muted mb-0"><?php echo $courtData['deskripsi'] ?></p>
      </div>

      <div class="mb-3">
        <div class="mb-2">
          <i class="bi bi-basket me-2 text-muted"></i> <span class="me-3">Padel</span>
          <i class="bi bi-house-door me-2 text-muted"></i> <span class="me-3">Indoor</span>
          <i class="bi bi-grid-3x3-gap me-2 text-muted"></i> <span>Premier Padel Grass</span>
        </div>
      </div>

      <form method="GET" class="mb-4 d-flex align-items-center gap-3">
        <input type="hidden" name="court" value="<?php echo $courtId; ?>">
        <input type="date" name="tanggal" class="form-control rounded-3 px-3 py-2" 
               value="<?php echo $tanggal_dipilih; ?>" 
               min="<?php echo date('Y-m-d'); ?>" required>
        <button type="submit" class="btn btn-danger rounded-3 px-4 py-2">
          Cek Jadwal <i class="bi bi-chevron-down ms-2"></i>
        </button>
      </form>

      <div class="mb-3">
        <h5>Jadwal untuk: <span class="text-primary"><?php echo date('d F Y', strtotime($tanggal_dipilih)); ?></span></h5>
        <p class="text-muted">Tersedia: <strong><?php echo $available_count; ?></strong> slot dari <?php echo count($availableSlots); ?> total jam</p>
      </div>

      <form method="POST" id="bookingForm">
        <input type="hidden" name="booking" value="1">
        <input type="hidden" name="lapangan_id" value="<?php echo $courtId; ?>">
        <input type="hidden" name="tanggal" value="<?php echo $tanggal_dipilih; ?>">
        
        <div class="row g-3">
          <?php foreach ($availableSlots as $slot): ?>
          <div class="col-12 col-md-4">
            <?php if ($slot['booked']): ?>
              <div class="card border-0 text-center py-3 opacity-50">
                <div class="card-body p-2">
                  <div class="small text-muted">60 Menit</div>
                  <div class="h6 mt-2"><?php echo $slot['text']; ?></div>
                  <div class="text-muted">Booked</div>
                </div>
              </div>
            <?php else: ?>
              <div class="card shadow-sm text-center py-3">
                <div class="card-body p-3">
                  <input type="radio" name="jam_mulai" id="jam_<?php echo str_replace(':', '', $slot['jam_mulai']); ?>" 
                         value="<?php echo $slot['text']; ?>" 
                         class="form-check-input" style="float: left; margin-top: 0;">
                  <div class="small text-muted">60 Menit</div>
                  <div class="h6 mt-2"><?php echo $slot['text']; ?></div>
                  <div class="mt-2">
                    <div class="text-muted"><s>Rp<?php echo number_format($courtData['harga'],0,',','.') ?></s></div>
                    <div class="h6 text-danger m-0">Rp<?php echo number_format($courtData['harga'],0,',','.'); ?></div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>

        <div class="mt-4 d-flex justify-content-end">
          <button type="submit" class="btn btn-success w-50 py-3 rounded-3 fw-semibold">
            Booking Sekarang <i class="bi bi-arrow-right-circle ms-2"></i>
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
