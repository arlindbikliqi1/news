<?php include('includes/config.php'); ?>
<!-- CSS Variables and Global Styles -->
<style>
:root {
    --primary-color: #667eea;
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --accent-color: #f093fb;
    --accent-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --text-dark: #2d3748;
    --text-light: #718096;
    --bg-light: #f7fafc;
    --bg-dark: #1a202c;
    --border-color: #e2e8f0;
    --border-radius: 12px;
    --border-radius-sm: 8px;
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Top Bar Styles */
.top-bar {
    font-size: 0.85rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    background: #2d3748 !important;
}

.social-links-top a {
    display: inline-block;
    width: 28px;
    height: 28px;
    line-height: 28px;
    text-align: center;
    border-radius: 50%;
    transition: var(--transition);
    font-size: 0.8rem;
    color: white !important;
    text-decoration: none;
}

.social-links-top a:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
    color: white !important;
}

/* Navigation Styles */
.navbar {
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(20px);
    border-bottom: 1px solid var(--border-color);
    padding: 1rem 0;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
    position: sticky;
    top: 0;
    z-index: 1030;
}

.navbar.scrolled {
    background: rgba(255, 255, 255, 0.98) !important;
    box-shadow: var(--shadow-lg);
    padding: 0.5rem 0;
}

.navbar-brand {
    font-family: 'Inter', sans-serif;
    font-weight: 900;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-decoration: none !important;
    transition: var(--transition);
}

.navbar-brand:hover {
    transform: scale(1.05);
    text-decoration: none !important;
}

.navbar-toggler {
    padding: 0.5rem;
    font-size: 1.25rem;
    border: 2px solid var(--primary-color) !important;
    border-radius: var(--border-radius-sm);
    box-shadow: none !important;
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25) !important;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23667eea' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
}

.nav-link {
    font-weight: 500;
    color: var(--text-dark) !important;
    padding: 0.75rem 1.25rem !important;
    border-radius: var(--border-radius-sm);
    transition: var(--transition);
    position: relative;
    text-decoration: none;
}

.nav-link:hover, .nav-link.active {
    background: var(--primary-gradient) !important;
    color: white !important;
    transform: translateY(-2px);
}

.nav-link i {
    font-size: 0.9rem;
}

/* Dropdown Styles */
.dropdown-menu {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    padding: 0.5rem 0;
    margin-top: 0.5rem;
    min-width: 250px;
}

.dropdown-item {
    padding: 0.75rem 1.5rem;
    color: var(--text-dark);
    transition: var(--transition);
    font-weight: 500;
    text-decoration: none;
}

.dropdown-item:hover, .dropdown-item:focus {
    background: var(--primary-gradient) !important;
    color: white !important;
}

.dropdown-item i {
    font-size: 0.8rem;
    opacity: 0.7;
}

.dropdown-divider {
    margin: 0.5rem 0;
    border-top: 1px solid var(--border-color);
}

/* Search Styles */
.search-box {
    position: relative;
    max-width: 280px;
}

.search-input {
    border: 2px solid var(--border-color);
    border-radius: 50px;
    padding: 0.75rem 1.25rem 0.75rem 3rem;
    width: 100%;
    transition: var(--transition);
    background: var(--bg-light);
    font-size: 0.9rem;
}

.search-input:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    font-size: 0.9rem;
    pointer-events: none;
}

.btn-search {
    background: var(--primary-gradient);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 0.75rem 1rem;
    transition: var(--transition);
}

.btn-search:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    color: white;
}

/* Utility Buttons */
.btn-outline-secondary, .btn-outline-danger {
    border-radius: 50px;
    padding: 0.6rem 1rem;
    font-weight: 500;
    transition: var(--transition);
}

.btn-outline-secondary:hover {
    background: var(--text-dark) !important;
    border-color: var(--text-dark) !important;
    color: white !important;
    transform: translateY(-2px);
}

.btn-outline-danger:hover {
    background: var(--accent-color) !important;
    border-color: var(--accent-color) !important;
    color: white !important;
    transform: translateY(-2px);
}

/* Breaking News Bar */
.breaking-news-bar {
    background: var(--accent-gradient);
    color: white;
    padding: 0.75rem 0;
    display: none;
    position: relative;
    overflow: hidden;
    z-index: 1025;
}

.breaking-news-bar.show {
    display: block;
}

.breaking-label {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 1px;
    white-space: nowrap;
    margin-right: 1rem;
}

.breaking-content {
    flex: 1;
    overflow: hidden;
}

.news-ticker {
    position: relative;
    height: 1.5rem;
    line-height: 1.5rem;
}

.ticker-item {
    position: absolute;
    left: 100%;
    white-space: nowrap;
    opacity: 0;
    transform: translateX(0);
    transition: var(--transition);
    top: 0;
}

.ticker-item a {
    color: white !important;
    text-decoration: none;
}

.ticker-item a:hover {
    text-decoration: underline;
}

.ticker-item.active {
    opacity: 1;
    animation: tickerSlide 15s linear infinite;
}

@keyframes tickerSlide {
    0% {
        transform: translateX(100%);
        opacity: 1;
    }
    10%, 90% {
        transform: translateX(-100%);
        opacity: 1;
    }
    100% {
        transform: translateX(-200%);
        opacity: 0;
    }
}

/* Responsive Design */
@media (max-width: 992px) {
    .navbar-brand div:first-child {
        font-size: 1.5rem;
    }
    
    .navbar-brand div:last-child {
        font-size: 0.6rem;
    }
    
    .search-box {
        max-width: 100%;
        margin-top: 1rem;
    }
    
    .breaking-news-bar {
        padding: 0.5rem 0;
    }
    
    .breaking-label {
        font-size: 0.7rem;
        padding: 0.4rem 0.8rem;
    }
}

@media (max-width: 768px) {
    .navbar-collapse {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-lg);
        padding: 1rem;
        margin-top: 1rem;
    }
    
    .nav-link {
        margin-bottom: 0.5rem;
    }
    
    .search-box {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    
    .dropdown-menu {
        position: static !important;
        float: none;
        width: auto;
        margin-top: 0;
        background-color: #f8f9fa;
        border: 0;
        border-radius: 0;
        box-shadow: none;
    }
    
    .top-bar .col-md-6:last-child {
        text-align: center;
        margin-top: 10px;
    }
}

/* Dark mode styles */
[data-theme="dark"] .navbar {
    background: rgba(26, 32, 44, 0.95) !important;
    border-bottom-color: rgba(255, 255, 255, 0.1);
}

[data-theme="dark"] .nav-link {
    color: rgba(255, 255, 255, 0.8) !important;
}

[data-theme="dark"] .search-input {
    background: var(--bg-dark);
    color: white;
    border-color: rgba(255, 255, 255, 0.2);
}

[data-theme="dark"] .dropdown-menu {
    background: var(--bg-dark);
    border-color: rgba(255, 255, 255, 0.1);
}

[data-theme="dark"] .dropdown-item {
    color: rgba(255, 255, 255, 0.8);
}

[data-theme="dark"] .dropdown-item:hover {
    background: var(--primary-gradient) !important;
    color: white !important;
}

[data-theme="dark"] .navbar-collapse {
    background: var(--bg-dark) !important;
}
</style>

<!-- Top Bar -->
<div class="top-bar bg-dark text-white py-2 d-none d-md-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="me-3">
                        <i class="fas fa-calendar-alt me-1"></i>
                        <span id="current-date"></span>
                    </span>
                    <span class="me-3">
                        <i class="fas fa-clock me-1"></i>
                        <span id="current-time"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-end">
                    <span class="me-3">Follow us:</span>
                    <div class="social-links-top">
                        <a href="#" class="text-white me-2" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-2" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-white" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Breaking News Ticker -->
<div class="breaking-news-bar" id="breakingNewsBar">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="breaking-label">
                <i class="fas fa-bolt me-2"></i>
                BREAKING NEWS
            </div>
            <div class="breaking-content">
                <div class="news-ticker" id="newsTicker">
                    <?php
                    if (isset($con) && $con) {
                        $breakingQuery = mysqli_query($con, "SELECT PostTitle, id FROM tblposts 
                                                        WHERE Is_Active = 1 
                                                        ORDER BY PostingDate DESC 
                                                        LIMIT 5");
                        if ($breakingQuery && mysqli_num_rows($breakingQuery) > 0) {
                            $breakingNews = [];
                            while($breaking = mysqli_fetch_array($breakingQuery)) {
                                $breakingNews[] = $breaking;
                            }
                            foreach($breakingNews as $index => $news) {
                    ?>
                    <span class="ticker-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <a href="news-details.php?nid=<?php echo htmlentities($news['id']); ?>">
                            <?php echo htmlentities($news['PostTitle']); ?>
                        </a>
                    </span>
                    <?php 
                            }
                        } else {
                    ?>
                    <span class="ticker-item active">
                        <a href="#">Welcome to NewsPortal - Stay updated with latest news!</a>
                    </span>
                    <?php 
                        }
                    } else {
                    ?>
                    <span class="ticker-item active">
                        <a href="#">Welcome to NewsPortal - Stay updated with latest news!</a>
                    </span>
                    <?php } ?>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-light ms-auto" id="closeBreakingNews" title="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg" id="mainNavbar">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <i class="fas fa-newspaper me-2" style="font-size: 2rem;"></i>
            <div>
                <div style="font-size: 1.8rem; font-weight: 900;">NewsPortal</div>
                <div style="font-size: 0.7rem; letter-spacing: 2px; text-transform: uppercase; opacity: 0.8;">Breaking News & Updates</div>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarCategoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-th-large me-1"></i>Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarCategoriesDropdown">
                        <?php 
                        if (isset($con) && $con) {
                            $headerQuery = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory WHERE Is_Active = 1 LIMIT 8");
                            if ($headerQuery && mysqli_num_rows($headerQuery) > 0) {
                                while($headerRow = mysqli_fetch_array($headerQuery)) {
                        ?>
                        <li>
                            <a class="dropdown-item" href="category.php?catid=<?php echo htmlentities($headerRow['id'])?>">
                                <i class="fas fa-chevron-right me-2"></i>
                                <?php echo htmlentities($headerRow['CategoryName']);?>
                            </a>
                        </li>
                        <?php 
                                }
                            } else {
                        ?>
                        <li>
                            <a class="dropdown-item" href="category.php">
                                <i class="fas fa-chevron-right me-2"></i>
                                General News
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="category.php">
                                <i class="fas fa-chevron-right me-2"></i>
                                Sports
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="category.php">
                                <i class="fas fa-chevron-right me-2"></i>
                                Technology
                            </a>
                        </li>
                        <?php 
                            }
                        } else {
                        ?>
                        <li>
                            <a class="dropdown-item" href="category.php">
                                <i class="fas fa-chevron-right me-2"></i>
                                General News
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="category.php">
                                <i class="fas fa-chevron-right me-2"></i>
                                Sports
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="category.php">
                                <i class="fas fa-chevron-right me-2"></i>
                                Technology
                            </a>
                        </li>
                        <?php } ?>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="categories.php"><i class="fas fa-list me-2"></i>View All Categories</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about-us.php' ? 'active' : ''; ?>" href="about-us.php">
                        <i class="fas fa-info-circle me-1"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact-us.php' ? 'active' : ''; ?>" href="contact-us.php">
                        <i class="fas fa-envelope me-1"></i>Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'archive.php' ? 'active' : ''; ?>" href="archive.php">
                        <i class="fas fa-archive me-1"></i>Archive
                    </a>
                </li>
            </ul>

            <!-- Search & Utilities -->
            <div class="d-flex align-items-center">
                <!-- Search -->
                <div class="search-box me-3">
                    <form action="search.php" method="post" class="d-flex align-items-center">
                        <div class="position-relative flex-grow-1">
                            <input type="text" name="searchtitle" class="search-input" 
                                   placeholder="Search news..." required autocomplete="off">
                            <i class="fas fa-search search-icon"></i>
                        </div>
                        <button type="submit" class="btn btn-search ms-2" title="Search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Breaking News Toggle -->
                <button class="btn btn-outline-danger" id="breakingNewsToggle" title="Breaking News">
                    <i class="fas fa-bolt"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update current time and date
    function updateDateTime() {
        const now = new Date();
        
        // Update time
        const timeString = now.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        });
        const timeElement = document.getElementById('current-time');
        if (timeElement) {
            timeElement.textContent = timeString;
        }
        
        // Update date
        const dateString = now.toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        const dateElement = document.getElementById('current-date');
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }
    
    // Initialize date and time
    updateDateTime();
    setInterval(updateDateTime, 1000);

    // Breaking news functionality
    const breakingNewsToggle = document.getElementById('breakingNewsToggle');
    const breakingNewsBar = document.getElementById('breakingNewsBar');
    const closeBreakingNews = document.getElementById('closeBreakingNews');
    let tickerInterval;
    
    if (breakingNewsToggle) {
        breakingNewsToggle.addEventListener('click', function() {
            breakingNewsBar.classList.toggle('show');
            if (breakingNewsBar.classList.contains('show')) {
                startTicker();
            } else {
                stopTicker();
            }
        });
    }
    
    if (closeBreakingNews) {
        closeBreakingNews.addEventListener('click', function() {
            breakingNewsBar.classList.remove('show');
            stopTicker();
        });
    }

    // News ticker animation
    function startTicker() {
        const items = document.querySelectorAll('.ticker-item');
        if (items.length === 0) return;
        
        let current = 0;
        
        function showNext() {
            // Remove active class from all items
            items.forEach(item => item.classList.remove('active'));
            
            // Add active class to current item
            if (items[current]) {
                items[current].classList.add('active');
            }
            
            // Move to next item
            current = (current + 1) % items.length;
        }
        
        // Show first item immediately
        showNext();
        
        // Set interval for cycling through items
        tickerInterval = setInterval(showNext, 6000);
    }
    
    function stopTicker() {
        if (tickerInterval) {
            clearInterval(tickerInterval);
        }
    }

    // Dark mode toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Set initial theme
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'dark') {
        const icon = darkModeToggle.querySelector('i');
        if (icon) {
            icon.className = 'fas fa-sun';
        }
    }
    
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            const icon = this.querySelector('i');
            if (newTheme === 'dark') {
                icon.className = 'fas fa-sun';
            } else {
                icon.className = 'fas fa-moon';
            }
        });
    }

    // Navbar scroll effect
    let lastScrollTop = 0;
    const navbar = document.getElementById('mainNavbar');
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add scrolled class for styling
        if (scrollTop > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        // Hide/show navbar on scroll
        if (scrollTop > lastScrollTop && scrollTop > 200) {
            navbar.style.transform = 'translateY(-100%)';
        } else {
            navbar.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    // Search form validation and handling
    const searchForm = document.querySelector('.search-box form');
    const searchInput = document.querySelector('.search-input[name="searchtitle"]');
    
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const searchTerm = searchInput.value.trim();
            if (searchTerm.length < 2) {
                e.preventDefault();
                alert('Please enter at least 2 characters to search.');
                searchInput.focus();
                return false;
            }
            
            // Clear any existing session search data
            fetch('clear_search_session.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                }
            }).catch(function(error) {
                console.log('Error clearing session:', error);
            });
        });
    }

    // Mobile menu handling - FIXED VERSION
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.getElementById('navbarNav');
    
    // Proper Bootstrap collapse toggle handling
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            const isExpanded = navbarToggler.getAttribute('aria-expanded') === 'true';
            navbarToggler.setAttribute('aria-expanded', !isExpanded);
            navbarCollapse.classList.toggle('show');
        });
        
        // Close menu when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 991) {
                const isClickInsideNavbar = navbar.contains(e.target);
                if (!isClickInsideNavbar && navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            }
        });
        
        // Close mobile menu when clicking on nav links
        const navLinks = document.querySelectorAll('.nav-link, .dropdown-item');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    navbarCollapse.classList.remove('show');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

    // Auto-show breaking news on page load
    setTimeout(function() {
        if (breakingNewsBar && !breakingNewsBar.classList.contains('show')) {
            breakingNewsBar.classList.add('show');
            startTicker();
        }
    }, 2000);
});
</script>