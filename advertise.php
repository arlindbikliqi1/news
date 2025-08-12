<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Advertise with News Portal - Reach a wide audience with your brand.">
    <meta name="author" content="News Portal">
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">
    <title>News Portal - Advertise With Us</title>

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

        /* Content Section */
        .content-section {
            margin-top: 100px; /* Adjust based on header height */
            padding: 4rem 0;
            background: var(--bg-gray);
        }

        .content-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            padding: 3rem;
            border: 1px solid var(--border-color);
        }

        .content-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 2rem;
            text-align: center;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .content-subtitle {
            font-size: 1.75rem;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .content-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .content-text ul {
            list-style: disc;
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .content-text ol {
            list-style: decimal;
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .content-text li {
            margin-bottom: 0.5rem;
        }

        .contact-btn {
            display: inline-block;
            background: var(--accent-gradient);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            margin-top: 1.5rem;
        }

        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-card {
                padding: 2rem;
            }
            .content-title {
                font-size: 2rem;
            }
            .content-subtitle {
                font-size: 1.5rem;
            }
            .content-text {
                font-size: 1rem;
            }
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

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-card" data-aos="fade-up">
                        <h1 class="content-title">Advertise With Us</h1>

                        <p class="content-text">
                            News Portal offers a unique opportunity to reach a diverse and engaged audience interested in breaking news, in-depth analysis, and various topics. Partner with us to elevate your brand's visibility and connect with potential customers.
                        </p>

                        <h2 class="content-subtitle">Why Advertise with News Portal?</h2>
                        <ul class="content-text">
                            <li><strong>Targeted Audience:</strong> Reach readers actively seeking information across various categories.</li>
                            <li><strong>High Engagement:</strong> Our readers are highly engaged with our content, leading to better ad performance.</li>
                            <li><strong>Brand Visibility:</strong> Position your brand alongside credible and timely news content.</li>
                            <li><strong>Flexible Options:</strong> We offer a range of advertising formats to suit your needs and budget.</li>
                        </ul>

                        <h2 class="content-subtitle">Advertising Opportunities:</h2>
                        <p class="content-text">We offer various advertising solutions, including:</p>
                        <ul class="content-text">
                            <li><strong>Banner Ads:</strong> Prominently displayed banners across our website.</li>
                            <li><strong>Sponsored Content:</strong> Native advertising that blends seamlessly with our editorial content.</li>
                            <li><strong>Newsletter Sponsorships:</strong> Reach our subscribers directly through our daily or weekly newsletters.</li>
                            <li><strong>Custom Campaigns:</strong> Tailored solutions to meet your specific marketing objectives.</li>
                        </ul>

                        <h2 class="content-subtitle">Our Audience Demographics:</h2>
                        <p class="content-text">
                            Our readership consists of individuals from diverse backgrounds, with a strong interest in current events, technology, business, lifestyle, and more. We can provide detailed analytics and audience insights upon request.
                        </p>

                        <h2 class="content-subtitle">Get in Touch!</h2>
                        <p class="content-text">
                            Ready to discuss your advertising needs? Contact our advertising team today to learn more about our rates, audience, and custom solutions. We look forward to helping you achieve your marketing goals.
                        </p>
                        <div class="text-center">
                            <a href="mailto:advertise@newsportal.com" class="contact-btn">
                                <i class="fas fa-envelope me-2"></i>Contact Our Advertising Team
                            </a>
                            <a href="contact-us.php" class="contact-btn ms-3">
                                <i class="fas fa-phone me-2"></i>General Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sidebar Widget Column (Optional, can be removed if not needed for static pages) -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php include('includes/sidebar.php');?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Scroll to top button -->
    <button id="scrollTop" class="scroll-top">
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

        // Search functionality (if search bar is included in header)
        $('.search-input').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
        });

        // Lazy loading for images (if any static images are added)
        $('img').each(function() {
            $(this).on('load', function() {
                $(this).addClass('loaded');
            });
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
