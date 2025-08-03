<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="About Live News Portal">
    <meta name="author" content="News Portal">
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">
    
    <title>News Portal | About Us</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #232526 0%, #414345 100%);
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f5576c;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #ffffff;
            --bg-gray: #f8fafc;
            --bg-dark: #1a202c;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --border-radius: 16px;
            --border-radius-sm: 8px;
            --border-radius-lg: 24px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-gray);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }

        /* Header Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            transition: var(--transition);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-lg);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 2rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            padding: 0.75rem 1.25rem !important;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--primary-gradient);
            color: white !important;
            transform: translateY(-2px);
        }

        .search-box {
            position: relative;
            max-width: 300px;
        }

        .search-input {
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 0.75rem 1.25rem 0.75rem 3rem;
            width: 100%;
            transition: var(--transition);
            background: var(--bg-light);
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
        }

        /* Hero Section */
        .hero-section {
            margin-top: 100px;
            padding: 4rem 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        }

        /* About Section */
        .about-section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 3rem;
            position: relative;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .about-content {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 3rem;
            margin-bottom: 3rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .about-content:hover {
            box-shadow: var(--shadow-xl);
            transform: translateY(-5px);
        }

        .about-text {
            font-size: 1.1rem;
            color: var(--text-light);
            line-height: 1.8;
        }

        .values-section {
            margin: 4rem 0;
        }

        .value-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 2.5rem 1.5rem;
            text-align: center;
            transition: var(--transition);
            height: 100%;
            border: 1px solid var(--border-color);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .value-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .team-section {
            margin: 4rem 0;
        }

        .team-member {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            text-align: center;
            transition: var(--transition);
            border: 1px solid var(--border-color);
            height: 100%;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .team-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--bg-gray);
            margin: 0 auto 1.5rem;
            display: block;
        }

        .team-name {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .team-position {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .mission-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .mission-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .category-sidebar {
            position: sticky;
            top: 120px;
        }

        .category-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .category-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .category-link {
            display: block;
            padding: 0.75rem 0;
            color: var(--text-dark);
            text-decoration: none;
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
        }

        .category-link:last-child {
            border-bottom: none;
        }

        .category-link:hover {
            color: var(--primary-color);
            padding-left: 1rem;
        }

        .category-link:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: var(--transition);
        }

        .category-link:hover:before {
            width: 20px;
        }

        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 3rem;
        }

        .page-link {
            border: 2px solid var(--border-color);
            color: var(--text-dark);
            padding: 0.75rem 1.25rem;
            margin: 0 0.25rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            text-decoration: none;
            font-weight: 500;
        }

        .page-link:hover, .page-item.active .page-link {
            background: var(--primary-gradient);
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .section-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 992px) {
            .category-sidebar {
                position: static;
                margin-top: 3rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .about-content {
                padding: 2rem;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
            
            .value-icon {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s, visibility 0.5s;
        }

        .loading.hide {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 999;
        }

        .scroll-top.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }
    </style>
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <?php include('includes/header.php');?>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="section-title" data-aos="fade-up">
                About <span style="background: var(--accent-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Us</span>
            </h1>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="about-content" data-aos="fade-up">
                        <?php 
                        $pagetype = 'aboutus';
                        $query = mysqli_query($con, "SELECT PageTitle, Description FROM tblpages WHERE PageName='$pagetype'");
                        while($row = mysqli_fetch_array($query)): 
                        ?>
                        <h2 class="mb-4"><?php echo htmlentities($row['PageTitle']) ?></h2>
                        <div class="about-text">
                            <?php echo $row['Description']; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <!-- Values Section -->
                    <div class="values-section">
                        <h2 class="section-title" data-aos="fade-up">
                            Our Core <span style="background: var(--accent-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Values</span>
                        </h2>
                        <div class="row">
                            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="value-card">
                                    <div class="value-icon">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                    <h3 class="value-title">Timeliness</h3>
                                    <p class="text-muted">Delivering news as it happens with real-time updates and breaking news alerts.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="value-card">
                                    <div class="value-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <h3 class="value-title">Accuracy</h3>
                                    <p class="text-muted">Fact-checked information from trusted sources with multiple verifications.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="value-card">
                                    <div class="value-icon">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <h3 class="value-title">Integrity</h3>
                                    <p class="text-muted">Unbiased reporting with ethical journalism standards and transparency.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Section -->
                    <div class="team-section">
                        <h2 class="section-title" data-aos="fade-up">
                            What we <span style="background: var(--accent-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">do</span>
                        </h2>
                       <div class="row">
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
                <img src="https://img.icons8.com/ios-filled/100/news.png" alt="Latest News" class="team-img" />
                <h3 class="team-name">Deliver the Latest</h3>
                <p class="team-position">News & Updates</p>
                <p class="text-muted">We bring you real-time updates on breaking news from across the globe, 24/7.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
                <img src="https://img.icons8.com/ios-filled/100/online-support.png" alt="Inform the People" class="team-img" />
                <h3 class="team-name">Inform the Public</h3>
                <p class="team-position">Accurate & Reliable</p>
                <p class="text-muted">We prioritize truth and transparency to keep our readers informed with verified facts.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
                <img src="https://img.icons8.com/ios-filled/100/conference-background-selected.png" alt="Share Stories" class="team-img" />
                <h3 class="team-name">Share Stories</h3>
                <p class="team-position">Across All Categories</p>
                <p class="text-muted">From politics to sports, entertainment to technology—we cover the stories that matter.</p>
            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="category-sidebar">
                        <!-- Mission Card -->
                        <div class="mission-card" data-aos="fade-left">
                            <h5 class="category-title">
                                <i class="fas fa-bullseye me-2"></i>Our Mission
                            </h5>
                            <p>To deliver accurate, timely news with integrity while maintaining the highest journalistic standards. We believe in the power of information to create positive change in society.</p>
                        </div>

                        <!-- Advertisement Widget -->
                        <div class="mission-card" data-aos="fade-left" data-aos-delay="100">
                            <h5 class="category-title">
                                <i class="fas fa-ad me-2"></i>Advertisement
                            </h5>
                            <div class="text-center mt-3">
                                <a href="#">
                                    <img src="https://via.placeholder.com/300x250" alt="Advertisement" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="category-card" data-aos="fade-left" data-aos-delay="200">
                            <h5 class="category-title">
                                <i class="fas fa-list-ul me-2"></i>Categories
                            </h5>
                            <div class="category-list">
                                <?php 
                                $query = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory");
                                while($row = mysqli_fetch_array($query)) {
                                ?>
                                <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" class="category-link">
                                    <?php echo htmlentities($row['CategoryName']);?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    
    <!-- Scroll to top button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
    $(document).ready(function() {
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            mirror: false
        });

        // Hide loading screen
        setTimeout(function() {
            $('#loading').addClass('hide');
        }, 1000);

        // Navbar scroll effect
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.navbar').addClass('scrolled');
                $('#scrollTop').addClass('show');
            } else {
                $('.navbar').removeClass('scrolled');
                $('#scrollTop').removeClass('show');
            }
        });

        // Scroll to top
        $('#scrollTop').click(function() {
            $('html, body').animate({scrollTop: 0}, 600);
        });

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    });

    // Progressive Web App features
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('ServiceWorker registration successful');
            }, function(err) {
                console.log('ServiceWorker registration failed');
            });
        });
    }
    </script>
</body>
</html>