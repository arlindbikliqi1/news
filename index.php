<?php 
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Stay informed with breaking news, latest updates, and in-depth analysis from around the world">
    <meta name="author" content="News Portal">
    <link rel="shortcut icon" href="images/logo.webp" type="image/x-icon">
    <title>TopCentral.news - Breaking News & Latest Updates</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Adsterra Scripts -->
    <script type='text/javascript' src='//pl27432355.profitableratecpm.com/cc/d2/ab/ccd2ab98de64c642a22b991d50b07112.js'></script>
    <script type='text/javascript' src='//pl27432873.profitableratecpm.com/b0/c9/22/b0c92206ec7bc13315cd757b3faa6ebf.js'></script>
    
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

        .hero-slider {
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            margin-bottom: 4rem;
            position: relative;
        }

        .carousel-item {
            height: 600px;
            position: relative;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 3rem;
            color: white;
        }

        .carousel-badge {
            display: inline-block;
            background: var(--accent-gradient);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .carousel-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .carousel-text {
            font-size: 1.125rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .carousel-btn {
            background: var(--primary-gradient);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
        }

        .carousel-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        /* Categories Sidebar */
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

        /* News Grid */
        .news-section {
            padding: 2rem 0;
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

        .news-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            height: 100%;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            position: relative;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .news-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: var(--transition);
        }

        .news-card:hover:before {
            transform: scaleX(1);
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .news-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-img-overlay {
            position: absolute;
            top: 1rem;
            left: 1rem;
            right: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .card-category {
            background: var(--accent-gradient);
            color: white;
            padding: 0.375rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-bookmark {
            background: rgba(255, 255, 255, 0.9);
            color: var(--text-dark);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .card-bookmark:hover {
            background: var(--primary-color);
            color: white;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.375rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .card-title a {
            color: inherit;
            text-decoration: none;
            transition: var(--transition);
        }

        .card-title a:hover {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-text {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .card-footer {
            padding: 1.5rem 2rem;
            background: var(--bg-gray);
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-date {
            color: var(--text-light);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
        }

        .card-date i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        .read-more-btn {
            background: var(--primary-gradient);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .read-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            color: white;
        }

        /* Ad Styles */
        .ad-container {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: 1rem;
            margin: 2rem 0;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .ad-label {
            font-size: 0.75rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .direct-link-banner {
            background: var(--primary-gradient);
            color: white;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            margin: 2rem 0;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: block;
        }

        .direct-link-banner:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .direct-link-banner h4 {
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .direct-link-banner p {
            margin: 0;
            opacity: 0.9;
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
            .carousel-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 992px) {
            .carousel-item {
                height: 500px;
            }
            
            .carousel-title {
                font-size: 1.75rem;
            }
            
            .carousel-overlay {
                padding: 2rem;
            }
            
            .category-sidebar {
                position: static;
                margin-top: 3rem;
            }
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .carousel-item {
                height: 400px;
            }
            
            .carousel-title {
                font-size: 1.5rem;
            }
            
            .carousel-text {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .search-box {
                max-width: 100%;
                margin-top: 1rem;
            }
        }

        @media (max-width: 576px) {
            .carousel-item {
                height: 350px;
            }
            
            .carousel-overlay {
                padding: 1.5rem;
            }
            
            .carousel-title {
                font-size: 1.25rem;
            }
            
            .carousel-text {
                display: none;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .card-footer {
                padding: 1rem 1.5rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
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
    
    <!-- Top Banner Ad - First View -->
    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col-12">
                <div class="ad-container">
                    <div class="ad-label">Advertisement</div>
                    <script type="text/javascript"> atOptions = { 'key' : '60a75c7cae1585cddedfdb4dc793e756', 'format' : 'iframe', 'height' : 90, 'width' : 728, 'params' : {} }; </script> 
                    <script type="text/javascript" src="//www.highperformanceformat.com/60a75c7cae1585cddedfdb4dc793e756/invoke.js"></script>
                </div>
            </div>
        </div>
    </div>

    <!-- Direct Link Banner - First View -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="https://www.profitableratecpm.com/x1f39mnu?key=921207a921570605f990dc76ed566614" target="_blank" class="direct-link-banner">
                    <h4><i class="fas fa-gift me-2"></i>🎉 Special Offer - Limited Time!</h4>
                    <p>Click here for exclusive deals and amazing offers you don't want to miss!</p>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <!-- Categories Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <div class="category-card" data-aos="fade-right">
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

                        <!-- Sidebar Ad -->
                        <div class="ad-container">
                            <div class="ad-label">Advertisement</div>
                            <script type="text/javascript"> atOptions = { 'key' : 'cdf5eddb171fa0a9e01790ff8a001f23', 'format' : 'iframe', 'height' : 250, 'width' : 300, 'params' : {} }; </script> 
                            <script type="text/javascript" src="//www.highperformanceformat.com/cdf5eddb171fa0a9e01790ff8a001f23/invoke.js"></script>
                        </div>

                        <!-- Sidebar Skyscraper Ad -->
                        <div class="ad-container">
                            <div class="ad-label">Advertisement</div>
                            <script type="text/javascript"> atOptions = { 'key' : '473dbe0ba5e948b989fe71879b4a9faa', 'format' : 'iframe', 'height' : 600, 'width' : 160, 'params' : {} }; </script> 
                            <script type="text/javascript" src="//www.highperformanceformat.com/473dbe0ba5e948b989fe71879b4a9faa/invoke.js"></script>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9 col-md-8">
                    <!-- Hero Slider -->
                    <div class="hero-slider" data-aos="fade-up">
                        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php
                                $sliderQuery = mysqli_query($con, "SELECT COUNT(*) as count FROM tblslider sl 
                                                              JOIN tblposts p ON sl.post_id = p.id 
                                                              WHERE p.Is_Active = 1");
                                $sliderCount = mysqli_fetch_array($sliderQuery)['count'];
                                for($i = 0; $i < $sliderCount; $i++) {
                                ?>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $i; ?>" 
                                        <?php echo $i == 0 ? 'class="active"' : ''; ?>></button>
                                <?php } ?>
                            </div>
                            <div class="carousel-inner">
                                <?php
                                $sliderQuery = mysqli_query($con, "SELECT p.*, c.CategoryName, s.Subcategory 
                                                              FROM tblslider sl 
                                                              JOIN tblposts p ON sl.post_id = p.id 
                                                              LEFT JOIN tblcategory c ON c.id = p.CategoryId 
                                                              LEFT JOIN tblsubcategory s ON s.SubCategoryId = p.SubCategoryId 
                                                              WHERE p.Is_Active = 1");
                                $isFirst = true;
                                while($sliderPost = mysqli_fetch_array($sliderQuery)) {
                                ?>
                                <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
                                    <img src="admin/postimages/<?php echo htmlentities($sliderPost['PostImage']); ?>" 
                                         alt="<?php echo htmlentities($sliderPost['PostTitle']); ?>">
                                    <div class="carousel-overlay">
                                        <div class="carousel-badge">
                                            <?php echo htmlentities($sliderPost['CategoryName']); ?>
                                        </div>
                                        <h2 class="carousel-title">
                                            <?php echo htmlentities($sliderPost['PostTitle']); ?>
                                        </h2>
                                        <p class="carousel-text">
                                            <?php echo substr(strip_tags($sliderPost['PostDetails']), 0, 200) . '...'; ?>
                                        </p>
                                        <a href="news-details.php?nid=<?php echo htmlentities($sliderPost['id']); ?>" 
                                           class="carousel-btn">
                                            Read Full Story <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php 
                                $isFirst = false;
                                } ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Ad Below Slider -->
                    <div class="ad-container">
                        <div class="ad-label">Advertisement</div>
                        <script type="text/javascript"> atOptions = { 'key' : '521e77e0c57d2c5a0e07ddb91c825ebb', 'format' : 'iframe', 'height' : 60, 'width' : 468, 'params' : {} }; </script> 
                        <script type="text/javascript" src="//www.highperformanceformat.com/521e77e0c57d2c5a0e07ddb91c825ebb/invoke.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                Latest <span style="background: var(--accent-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">News</span>
            </h2>
            
            <div class="row">
                <?php 
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 8;
                $offset = ($pageno-1) * $no_of_records_per_page;
                
                $total_pages_sql = "SELECT COUNT(*) FROM tblposts WHERE Is_Active = 1";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                
                $query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, 
                                            tblposts.PostImage, tblcategory.CategoryName as category, 
                                            tblcategory.id as cid, tblsubcategory.Subcategory as subcategory, 
                                            tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, 
                                            tblposts.PostUrl as url 
                                            FROM tblposts 
                                            LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                            LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId 
                                            WHERE tblposts.Is_Active = 1 
                                            ORDER BY tblposts.id DESC  
                                            LIMIT $offset, $no_of_records_per_page");
                
                $delay = 0;
                $counter = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $counter++;
                ?>
                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <article class="news-card">
                        <div class="card-img-wrapper">
                            <img class="card-img-top" 
                                 src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" 
                                 alt="<?php echo htmlentities($row['posttitle']);?>">
                            <div class="card-img-overlay">
                                <span class="card-category">
                                    <?php echo htmlentities($row['category']);?>
                                </span>
                                <div class="card-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                                    <?php echo htmlentities($row['posttitle']);?>
                                </a>
                            </h3>
                            <p class="card-text">
                                <?php echo substr(strip_tags($row['postdetails']), 0, 150) . '...'; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="card-date">
                                <i class="far fa-calendar-alt"></i>
                                <?php echo date('M d, Y', strtotime($row['postingdate'])); ?>
                            </div>
                            <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" 
                               class="read-more-btn">
                                Read More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </article>
                </div>
                <?php 
                // Add ads after every 4 news cards
                if ($counter % 4 == 0 && $counter < 8) {
                ?>
                <div class="col-12 mb-4">
                    <div class="ad-container">
                        <div class="ad-label">Advertisement</div>
                        <script type="text/javascript"> atOptions = { 'key' : '60a75c7cae1585cddedfdb4dc793e756', 'format' : 'iframe', 'height' : 90, 'width' : 728, 'params' : {} }; </script> 
                        <script type="text/javascript" src="//www.highperformanceformat.com/60a75c7cae1585cddedfdb4dc793e756/invoke.js"></script>
                    </div>
                </div>
                <?php
                }
                
                // Add direct link banner after 6 news cards
                if ($counter % 6 == 0) {
                ?>
                <div class="col-12 mb-4">
                    <a href="https://www.profitableratecpm.com/x1f39mnu?key=921207a921570605f990dc76ed566614" target="_blank" class="direct-link-banner">
                        <h4><i class="fas fa-star me-2"></i>💎 Premium Content Unlocked!</h4>
                        <p>Discover exclusive content and premium features - Click now!</p>
                    </a>
                </div>
                <?php
                }
                
                $delay += 100;
                } ?>
            </div>

            <!-- Middle Ad Section -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="ad-container">
                        <div class="ad-label">Advertisement</div>
                        <script type="text/javascript"> atOptions = { 'key' : 'cdf5eddb171fa0a9e01790ff8a001f23', 'format' : 'iframe', 'height' : 250, 'width' : 300, 'params' : {} }; </script> 
                        <script type="text/javascript" src="//www.highperformanceformat.com/cdf5eddb171fa0a9e01790ff8a001f23/invoke.js"></script>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="ad-container">
                        <div class="ad-label">Advertisement</div>
                        <script type="text/javascript"> atOptions = { 'key' : 'cdf5eddb171fa0a9e01790ff8a001f23', 'format' : 'iframe', 'height' : 250, 'width' : 300, 'params' : {} }; </script> 
                        <script type="text/javascript" src="//www.highperformanceformat.com/cdf5eddb171fa0a9e01790ff8a001f23/invoke.js"></script>
                    </div>
                </div>
            </div>

            <!-- Native Ad Container -->
            <div class="row">
                <div class="col-12">
                    <div class="ad-container">
                        <div class="ad-label">Sponsored Content</div>
                        <script async="async" data-cfasync="false" src="//pl27432810.profitableratecpm.com/b2858f41c51f5ba6eabcf9f57fc86305/invoke.js"></script> 
                        <div id="container-b2858f41c51f5ba6eabcf9f57fc86305"></div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <?php if($total_pages > 1) { ?>
            <nav aria-label="News pagination" data-aos="fade-up">
                <ul class="pagination">
                    <li class="page-item <?php if($pageno <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php echo ($pageno <= 1) ? '#' : '?pageno=1'; ?>">
                            <i class="fas fa-angle-double-left me-1"></i>First
                        </a>
                    </li>
                    <li class="page-item <?php if($pageno <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php echo ($pageno <= 1) ? '#' : '?pageno='.($pageno - 1); ?>">
                            <i class="fas fa-chevron-left me-1"></i>Prev
                        </a>
                    </li>
                    
                    <?php 
                    $start = max(1, $pageno - 2);
                    $end = min($total_pages, $pageno + 2);
                    
                    for($i = $start; $i <= $end; $i++) {
                    ?>
                    <li class="page-item <?php if($pageno == $i) echo 'active'; ?>">
                        <a class="page-link" href="?pageno=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php } ?>
                    
                    <li class="page-item <?php if($pageno >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php echo ($pageno >= $total_pages) ? '#' : '?pageno='.($pageno + 1); ?>">
                            Next<i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </li>
                    <li class="page-item <?php if($pageno >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php echo ($pageno >= $total_pages) ? '#' : '?pageno='.$total_pages; ?>">
                            Last<i class="fas fa-angle-double-right ms-1"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php } ?>

            <!-- Bottom Direct Link Banner -->
            <div class="row">
                <div class="col-12">
                    <a href="https://www.profitableratecpm.com/x1f39mnu?key=921207a921570605f990dc76ed566614" target="_blank" class="direct-link-banner">
                        <h4><i class="fas fa-rocket me-2"></i>🚀 Don't Miss Out!</h4>
                        <p>Join thousands who discovered amazing opportunities - Click to explore!</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sidebar Widget Column -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php include('includes/sidebar.php');?>
            </div>
        </div>
    </div>

    <!-- Bottom Banner Ad -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ad-container">
                    <div class="ad-label">Advertisement</div>
                    <script type="text/javascript"> atOptions = { 'key' : '60a75c7cae1585cddedfdb4dc793e756', 'format' : 'iframe', 'height' : 90, 'width' : 728, 'params' : {} }; </script> 
                    <script type="text/javascript" src="//www.highperformanceformat.com/60a75c7cae1585cddedfdb4dc793e756/invoke.js"></script>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Scroll to top button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
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

        // Bookmark functionality
        $('.card-bookmark').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('bookmarked');
            const icon = $(this).find('i');
            if ($(this).hasClass('bookmarked')) {
                icon.removeClass('far').addClass('fas');
                $(this).css('background', 'var(--accent-color)');
                $(this).css('color', 'white');
            } else {
                icon.removeClass('fas').addClass('far');
                $(this).css('background', 'rgba(255, 255, 255, 0.9)');
                $(this).css('color', 'var(--text-dark)');
            }
        });

        // Search functionality
        $('.search-input').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
        });

        // Lazy loading for images
        $('img').each(function() {
            $(this).on('load', function() {
                $(this).addClass('loaded');
            });
        });

        // Auto-advance carousel
        $('.carousel').carousel({
            interval: 5000,
            wrap: true
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

        // Direct link banner click tracking
        $('.direct-link-banner').on('click', function() {
            // Add click tracking if needed
            console.log('Direct link clicked');
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
