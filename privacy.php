<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Privacy Policy for News Portal - Understand how we collect, use, and protect your data.">
    <meta name="author" content="News Portal">
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">
    <title>News Portal - Privacy Policy</title>

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
                        <h1 class="content-title">Privacy Policy</h1>

                        <p class="content-text">
                            This Privacy Policy describes how News Portal ("we," "us," or "our") collects, uses, and discloses your information when you visit our website (the "Service").
                            By accessing or using the Service, you agree to the collection and use of information in accordance with this policy.
                        </p>

                        <h2 class="content-subtitle">1. Information We Collect</h2>
                        <p class="content-text">
                            We collect several types of information for various purposes to provide and improve our Service to you.
                        </p>
                        <h3 class="content-subtitle">1.1. Personal Data</h3>
                        <p class="content-text">
                            While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). Personally identifiable information may include, but is not limited to:
                        </p>
                        <ul class="content-text">
                            <li>Email address</li>
                            <li>First name and last name</li>
                            <li>Cookies and Usage Data</li>
                        </ul>

                        <h3 class="content-subtitle">1.2. Usage Data</h3>
                        <p class="content-text">
                            We may also collect information how the Service is accessed and used ("Usage Data"). This Usage Data may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.
                        </p>

                        <h3 class="content-subtitle">1.3. Tracking & Cookies Data</h3>
                        <p class="content-text">
                            We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.
                            Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.
                            You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.
                        </p>
                        <p class="content-text">Examples of Cookies we use:</p>
                        <ul class="content-text">
                            <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>
                            <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>
                            <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>
                        </ul>

                        <h2 class="content-subtitle">2. Use of Data</h2>
                        <p class="content-text">News Portal uses the collected data for various purposes:</p>
                        <ul class="content-text">
                            <li>To provide and maintain the Service</li>
                            <li>To notify you about changes to our Service</li>
                            <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                            <li>To provide customer care and support</li>
                            <li>To provide analysis or valuable information so that we can improve the Service</li>
                            <li>To monitor the usage of the Service</li>
                            <li>To detect, prevent and address technical issues</li>
                        </ul>

                        <h2 class="content-subtitle">3. Transfer Of Data</h2>
                        <p class="content-text">
                            Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.
                            If you are located outside [Your Country] and choose to provide information to us, please note that we transfer the data, including Personal Data, to [Your Country] and process it there.
                            Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.
                        </p>
                        <p class="content-text">
                            News Portal will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.
                        </p>

                        <h2 class="content-subtitle">4. Disclosure Of Data</h2>
                        <h3 class="content-subtitle">4.1. Legal Requirements</h3>
                        <p class="content-text">
                            News Portal may disclose your Personal Data in the good faith belief that such action is necessary to:
                        </p>
                        <ul class="content-text">
                            <li>To comply with a legal obligation</li>
                            <li>To protect and defend the rights or property of News Portal</li>
                            <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
                            <li>To protect the personal safety of users of the Service or the public</li>
                            <li>To protect against legal liability</li>
                        </ul>

                        <h2 class="content-subtitle">5. Security Of Data</h2>
                        <p class="content-text">
                            The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.
                        </p>

                        <h2 class="content-subtitle">6. Service Providers</h2>
                        <p class="content-text">
                            We may employ third party companies and individuals to facilitate our Service ("Service Providers"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.
                            These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.
                        </p>

                        <h2 class="content-subtitle">7. Links To Other Sites</h2>
                        <p class="content-text">
                            Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.
                            We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.
                        </p>

                        <h2 class="content-subtitle">8. Children's Privacy</h2>
                        <p class="content-text">
                            Our Service does not address anyone under the age of 18 ("Children").
                            We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.
                        </p>

                        <h2 class="content-subtitle">9. Changes To This Privacy Policy</h2>
                        <p class="content-text">
                            We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
                            We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.
                            You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
                        </p>

                        <h2 class="content-subtitle">10. Contact Us</h2>
                        <p class="content-text">
                            If you have any questions about this Privacy Policy, please contact us:
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
