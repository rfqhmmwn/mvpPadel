
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Padel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Court 1 -->
        <div class="court-card">
            <div class="court-image-section">
                <div class="court-logo">
                    <div class="logo-text">
                        <div class="logo-small">the</div>
                        <div class="logo-medium">DRIP.</div>
                        <div class="logo-large">PADEL</div>
                    </div>
                </div>
                <div class="padel-ball-icon"></div>
                
                <button class="nav-arrow nav-arrow-left" onclick="changeCourtImage(1, -1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="nav-arrow nav-arrow-right" onclick="changeCourtImage(1, 1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <button class="view-photos-btn" onclick="viewAllPhotos(1)">
                    Lihat semua foto
                </button>
            </div>
            
            <div class="court-info-section">
                <h3 class="court-title">
                    Court 1
                    <i class="fas fa-chevron-right"></i>
                </h3>
                <p class="court-subtitle">Padel Court</p>
                
                <div class="court-features">
                    <div class="feature-item">
                        <i class="fas fa-table-tennis"></i>
                        <span>Padel</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-home"></i>
                        <span>indoor</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Court</span>
                    </div>
                </div>
                
                <a href="schedule.php?court=1" class="schedule-btn">
                    4 Jadwal Tersedia
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
        
        <!-- Court 2 -->
        <div class="court-card">
            <div class="court-image-section">
                <div class="court-logo">
                    <div class="logo-text">
                        <div class="logo-small">the</div>
                        <div class="logo-medium">DRIP.</div>
                        <div class="logo-large">PADEL</div>
                    </div>
                </div>
                <div class="padel-ball-icon"></div>
                
                <button class="nav-arrow nav-arrow-left" onclick="changeCourtImage(2, -1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="nav-arrow nav-arrow-right" onclick="changeCourtImage(2, 1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <button class="view-photos-btn" onclick="viewAllPhotos(2)">
                    Lihat semua foto
                </button>
            </div>
            
            <div class="court-info-section">
                <h3 class="court-title">
                    Court 2
                    <i class="fas fa-chevron-right"></i>
                </h3>
                <p class="court-subtitle">Padel Court</p>
                
                <div class="court-features">
                    <div class="feature-item">
                        <i class="fas fa-table-tennis"></i>
                        <span>Padel</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-home"></i>
                        <span>indoor</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Court</span>
                    </div>
                </div>
                
                <a href="schedule.php?court=2" class="schedule-btn">
                    5 Jadwal Tersedia
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
        
        <!-- Court 3 -->
        <div class="court-card">
            <div class="court-image-section">
                <div class="court-logo">
                    <div class="logo-text">
                        <div class="logo-small">the</div>
                        <div class="logo-medium">DRIP.</div>
                        <div class="logo-large">PADEL</div>
                    </div>
                </div>
                <div class="padel-ball-icon"></div>
                
                <button class="nav-arrow nav-arrow-left" onclick="changeCourtImage(3, -1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="nav-arrow nav-arrow-right" onclick="changeCourtImage(3, 1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <button class="view-photos-btn" onclick="viewAllPhotos(3)">
                    Lihat semua foto
                </button>
            </div>
            
            <div class="court-info-section">
                <h3 class="court-title">
                    Court 3
                    <i class="fas fa-chevron-right"></i>
                </h3>
                <p class="court-subtitle">Padel Court</p>
                
                <div class="court-features">
                    <div class="feature-item">
                        <i class="fas fa-table-tennis"></i>
                        <span>Padel</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-home"></i>
                        <span>indoor</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Court</span>
                    </div>
                </div>
                
                <a href="schedule.php?court=3" class="schedule-btn">
                    6 Jadwal Tersedia
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </div>
    
    <script>
        // Change court image (for navigation arrows)
        function changeCourtImage(courtId, direction) {
            console.log('Changing image for court ' + courtId + ' direction: ' + direction);
            // Implement image carousel logic here
        }
        
        // View all photos
        function viewAllPhotos(courtId) {
            console.log('Viewing all photos for court ' + courtId);
        }
    </script>
</body>
</html>