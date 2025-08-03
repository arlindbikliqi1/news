<?php
// category.php
session_start();
include('includes/config.php');
if($_GET['catid']!=''){
    $_SESSION['catid']=intval($_GET['catid']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Live News Portal | Category</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    
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

        /* Category Page Styles */
        .category-section {
            padding-top: 120px;
            padding-bottom: 4rem;
        }

        .category-header {
            margin-bottom: 3rem;
            text-align: center;
        }

        .category-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .category-description {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
        }

        /* News Grid */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .news-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            height: 100%;
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
            height: 200px;
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

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
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

        .card-footer {
            padding: 1rem 1.5rem;
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

        /* Categories Sidebar */
        .categories-sidebar {
            position: sticky;
            top: 120px;
        }

        .category-card {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .category-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-item {
            margin-bottom: 0.75rem;
        }

        .category-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            background: var(--bg-gray);
        }

        .category-link:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateX(5px);
        }

        .category-link i {
            margin-right: 0.75rem;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .category-title {
                font-size: 2rem;
            }
            
            .categories-sidebar {
                position: static;
                margin-top: 3rem;
            }
        }

        @media (max-width: 768px) {
            .category-title {
                font-size: 1.75rem;
            }
            
            .news-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 576px) {
            .category-title {
                font-size: 1.5rem;
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

    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <!-- Categories Sidebar -->
                <div class="col-lg-3">
                    <div class="categories-sidebar">
                        <div class="category-card" data-aos="fade-right">
                            <h5 class="category-card-title">
                                <i class="fas fa-list-ul me-2"></i>All Categories
                            </h5>
                            <ul class="category-list">
                                <?php 
                                $query = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory");
                                while($row = mysqli_fetch_array($query)) {
                                ?>
                                <li class="category-item">
                                    <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" class="category-link">
                                        <i class="fas fa-chevron-right"></i>
                                        <?php echo htmlentities($row['CategoryName']);?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <?php 
                    $catid = $_SESSION['catid'];
                    $catQuery = mysqli_query($con, "SELECT CategoryName FROM tblcategory WHERE id = '$catid'");
                    $catRow = mysqli_fetch_array($catQuery);
                    $categoryName = $catRow['CategoryName'];
                    ?>
                    <div class="category-header" data-aos="fade-up">
                        <h1 class="category-title"><?php echo htmlentities($categoryName); ?> News</h1>
                        <p class="category-description">Stay updated with the latest news and stories in the <?php echo htmlentities($categoryName); ?> category.</p>
                    </div>
                    
                    <?php 
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 6;
                    $offset = ($pageno-1) * $no_of_records_per_page;
                    
                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts WHERE CategoryId='$catid' AND Is_Active=1";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);
                    
                    $query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, 
                                                tblposts.PostImage, tblcategory.CategoryName as category, 
                                                tblcategory.id as cid, tblsubcategory.Subcategory as subcategory, 
                                                tblposts.PostingDate as postingdate
                                                FROM tblposts 
                                                LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                                LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId 
                                                WHERE tblposts.CategoryId = '$catid' 
                                                AND tblposts.Is_Active = 1 
                                                ORDER BY tblposts.id DESC  
                                                LIMIT $offset, $no_of_records_per_page");
                    
                    $rowcount = mysqli_num_rows($query);
                    if($rowcount == 0) {
                        echo '<div class="alert alert-info text-center">No news found in this category.</div>';
                    } else {
                    ?>
                    
                    <div class="news-grid">
                        <?php
                        $delay = 0;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="news-card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card-img-wrapper">
                                <img class="card-img-top" 
                                    src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" 
                                    alt="<?php echo htmlentities($row['posttitle']);?>">
                                <div class="card-img-overlay">
                                    <span class="card-category">
                                        <?php echo htmlentities($row['category']);?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">
                                    <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                                        <?php echo htmlentities($row['posttitle']);?>
                                    </a>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="card-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <?php echo date('M d, Y', strtotime($row['postingdate'])); ?>
                                </div>
                                <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" 
                                class="read-more-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                        <?php 
                        $delay += 50;
                        } ?>
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
                    <?php } ?>
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

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Scroll to Top Button -->
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
    </script>
</body>
</html>