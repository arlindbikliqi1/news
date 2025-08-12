<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Terms of Service for News Portal - Read our terms and conditions for using our website.">
    <meta name="author" content="News Portal">
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">
    <title>TopCentral.news - Terms of Service</title>

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
                        <h1 class="content-title">Terms of Service</h1>

                        <p class="content-text">
                            Welcome to News Portal! These Terms of Service ("Terms") govern your access to and use of the News Portal website (the "Service").
                            By accessing or using the Service, you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.
                        </p>

                        <h2 class="content-subtitle">1. Acceptance of Terms</h2>
                        <p class="content-text">
                            By accessing and using our Service, you acknowledge that you have read, understood, and agree to be bound by these Terms, as well as our Privacy Policy. If you do not agree with these Terms, you must not use our Service.
                        </p>

                        <h2 class="content-subtitle">2. Changes to Terms</h2>
                        <p class="content-text">
                            We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.
                            By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.
                        </p>

                        <h2 class="content-subtitle">3. Access to the Service</h2>
                        <p class="content-text">
                            We grant you a limited, non-exclusive, non-transferable, and revocable license to use our Service for your personal, non-commercial use, subject to these Terms.
                        </p>

                        <h2 class="content-subtitle">4. User Conduct</h2>
                        <p class="content-text">
                            You agree not to use the Service for any unlawful purpose or in any way that might harm, disrupt, or impair the Service or its users. Prohibited activities include, but are not limited to:
                        </p>
                        <ul class="content-text">
                            <li>Violating any applicable local, national, or international law or regulation.</li>
                            <li>Infringing upon or violating our intellectual property rights or the intellectual property rights of others.</li>
                            <li>Transmitting any unsolicited or unauthorized advertising or promotional material.</li>
                            <li>Transmitting any data that contains viruses or any other harmful programs.</li>
                            <li>Collecting or tracking the personal information of others.</li>
                        </ul>

                        <h2 class="content-subtitle">5. Intellectual Property</h2>
                        <p class="content-text">
                            The Service and its original content (excluding content provided by users), features, and functionality are and will remain the exclusive property of News Portal and its licensors. The Service is protected by copyright, trademark, and other laws of both [Your Country] and foreign countries. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of News Portal.
                        </p>

                        <h2 class="content-subtitle">6. Links to Other Websites</h2>
                        <p class="content-text">
                            Our Service may contain links to third-party websites or services that are not owned or controlled by News Portal.
                            News Portal has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party websites or services. You further acknowledge and agree that News Portal shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.
                            We strongly advise you to read the terms and conditions and privacy policies of any third-party websites or services that you visit.
                        </p>

                        <h2 class="content-subtitle">7. Termination</h2>
                        <p class="content-text">
                            We may terminate or suspend your access immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
                            Upon termination, your right to use the Service will immediately cease.
                        </p>

                        <h2 class="content-subtitle">8. Disclaimer</h2>
                        <p class="content-text">
                            Your use of the Service is at your sole risk. The Service is provided on an "AS IS" and "AS AVAILABLE" basis. The Service is provided without warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, non-infringement or course of performance.
                        </p>
                        <p class="content-text">
                            News Portal does not warrant that a) the Service will function uninterrupted, secure or available at any particular time or location; b) any errors or defects will be corrected; c) the Service is free of viruses or other harmful components; or d) the results of using the Service will meet your requirements.
                        </p>

                        <h2 class="content-subtitle">9. Governing Law</h2>
                        <p class="content-text">
                            These Terms shall be governed and construed in accordance with the laws of [Your Country], without regard to its conflict of law provisions.
                            Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.
                        </p>

                        <h2 class="content-subtitle">10. Contact Us</h2>
                        <p class="content-text">
                            If you have any questions about these Terms, please contact us:
                        </p>
                        <ul class="content-text">
                            <li>By email: <a href="mailto:info@newsportal.com">info@newsportal.com</a></li>
                            <li>By visiting this page on our website: <a href="contact.php">Contact Us</a></li>
                        </ul>
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
