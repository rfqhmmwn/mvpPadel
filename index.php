<?php
session_start();

if (isset($_SESSION['user_id']) == false) 
    {
        header("Location: login.php");  
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Padel - the DRIP. PADEL</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Header Navigation -->
    <header class="main-header">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-wrapper">
                    <div class="logo-text-header">
                        <span class="logo-small-header">the</span>
                        <span class="logo-medium-header">DRIP.</span>
                        <span class="logo-large-header">PADEL</span>
                    </div>
                    <div class="padel-ball-small"></div>
                </div>
            </div>
            
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <span class="user-name"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></span>
                        <span class="user-role">Member</span>
                    </div>
                </div>
                
                <a href="logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="welcome-content">
            <h1 class="welcome-title">Selamat Datang di <span class="highlight">the DRIP. PADEL</span></h1>
            <p class="welcome-subtitle">Pilih lapangan favorit Anda dan nikmati permainan terbaik!</p>
        </div>
    </section>

    <div class="container">
        <!-- Court 1 -->
        <div class="court-card">
            <div class="court-image-section">
                <div class="court-logo">
                    <div class="logo-text">
                        <div class="logo-small">the</div>
                        <div class="logo-medium">KURM.</div>
                        <div class="logo-large">PADEL</div>
                    </div>
                </div>
                <div class="padel-ball-icon"></div>

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
                
                <a href="booking.php?court=1" class="schedule-btn">
                    <span>4 Jadwal Tersedia</span>
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
                        <div class="logo-medium">KURM.</div>
                        <div class="logo-large">PADEL</div>
                    </div>
                </div>
                <div class="padel-ball-icon"></div>
                
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
                
                <a href="booking.php?court=2" class="schedule-btn">
                    <span>5 Jadwal Tersedia</span>
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
                        <div class="logo-medium">KURM.</div>
                        <div class="logo-large">PADEL</div>
                    </div>
                </div>
                <div class="padel-ball-icon"></div>
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
                
                <a href="booking.php?court=3" class="schedule-btn">
                    <span>6 Jadwal Tersedia</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <p>&copy; 2024 the DRIP. PADEL. All rights reserved.</p>
            <div class="footer-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>
    
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

        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.court-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>
