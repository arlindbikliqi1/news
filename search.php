<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Search results for news articles">
    <meta name="author" content="News Portal">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>TopCentral.news | Search Results</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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

        .search-section {
            margin-top: 100px;
            padding: 4rem 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
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

        .search-box {
            max-width: 700px;
            margin: 0 auto 3rem;
        }

        .search-input {
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 0.75rem 1.25rem 0.75rem 3rem;
            width: 100%;
            transition: var(--transition);
            background: var(--bg-light);
            font-size: 1.1rem;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .search-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1.2rem;
        }

        .btn-search {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            transition: var(--transition);
            font-size: 1.1rem;
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
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

        .no-results {
            text-align: center;
            padding: 5rem 0;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
        }

        .no-results i {
            font-size: 5rem;
            margin-bottom: 2rem;
            color: #e2e8f0;
        }

        .no-results h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .no-results p {
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto 2rem;
        }

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

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .search-input {
                padding: 0.65rem 1rem 0.65rem 2.5rem;
                font-size: 1rem;
            }
            
            .search-icon {
                left: 1rem;
            }
            
            .btn-search {
                padding: 0.75rem 1.5rem;
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
    </style>
</head>

<body>
    <!-- Header -->
    <?php include('includes/header.php');?>
    
    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                Search <span style="background: var(--accent-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Results</span>
            </h2>
            
            <div class="search-box">
                <form action="search.php" method="post" class="d-flex align-items-center">
                    <div class="position-relative flex-grow-1 me-2">
                        <input type="text" name="searchtitle" class="search-input" 
                               placeholder="Search news..." required autocomplete="off"
                               value="<?php echo isset($_POST['searchtitle']) ? htmlentities($_POST['searchtitle']) : ''; ?>">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                    <button type="submit" class="btn btn-search" title="Search">
                        <i class="fas fa-search me-2"></i>Search
                    </button>
                </form>
            </div>
            
            <div class="row">
                <?php 
                // Handle search term
                $st = '';
                if(isset($_POST['searchtitle']) && !empty($_POST['searchtitle'])) {
                    $st = $_SESSION['searchtitle'] = trim($_POST['searchtitle']);
                } elseif(isset($_SESSION['searchtitle'])) {
                    $st = $_SESSION['searchtitle'];
                }
                
                if(!empty($st)): 
                    // Pagination setup
                    $pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
                    $no_of_records_per_page = 8;
                    $offset = ($pageno-1) * $no_of_records_per_page;
                    
                    // Total records count
                    $count_query = "SELECT COUNT(*) as total 
                                    FROM tblposts 
                                    WHERE PostTitle LIKE '%$st%' AND Is_Active = 1";
                    $count_result = mysqli_query($con, $count_query);
                    $total_data = mysqli_fetch_assoc($count_result)['total'];
                    $total_pages = ceil($total_data / $no_of_records_per_page);
                    
                    // Get search results
                    $query = mysqli_query($con, "SELECT tblposts.id as pid, 
                                                tblposts.PostTitle as posttitle, 
                                                tblposts.PostImage, 
                                                tblcategory.CategoryName as category, 
                                                tblposts.PostDetails as postdetails, 
                                                tblposts.PostingDate as postingdate, 
                                                tblposts.PostUrl as url 
                                            FROM tblposts 
                                            LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                            WHERE tblposts.PostTitle LIKE '%$st%' 
                                            AND tblposts.Is_Active = 1 
                                            ORDER BY tblposts.id DESC  
                                            LIMIT $offset, $no_of_records_per_page");
                    
                    $rowcount = mysqli_num_rows($query);
                    
                    if($rowcount == 0):
                ?>
                <div class="col-12" data-aos="fade-up">
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3>No Results Found</h3>
                        <p>We couldn't find any news articles matching "<?php echo htmlentities($st); ?>"</p>
                        <a href="index.php" class="btn btn-search">
                            <i class="fas fa-arrow-left me-2"></i>Back to Home
                        </a>
                    </div>
                </div>
                <?php else: 
                    $delay = 0;
                    while($row = mysqli_fetch_array($query)):
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
                    $delay += 100;
                    endwhile; 
                endif; 
                ?>
            </div>
            
            <!-- Pagination -->
            <?php if($total_pages > 1 && $rowcount > 0): ?>
            <nav aria-label="Search pagination" data-aos="fade-up">
                <ul class="pagination">
                    <li class="page-item <?php if($pageno <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="?pageno=1<?php echo !empty($st) ? '&query='.urlencode($st) : ''; ?>">
                            <i class="fas fa-angle-double-left me-1"></i>First
                        </a>
                    </li>
                    <li class="page-item <?php if($pageno <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php if($pageno <= 1) echo '#'; else echo '?pageno='.($pageno - 1).(!empty($st) ? '&query='.urlencode($st) : ''); ?>">
                            <i class="fas fa-chevron-left me-1"></i>Prev
                        </a>
                    </li>
                    
                    <?php 
                    $start = max(1, $pageno - 2);
                    $end = min($total_pages, $pageno + 2);
                    
                    for($i = $start; $i <= $end; $i++):
                    ?>
                    <li class="page-item <?php if($pageno == $i) echo 'active'; ?>">
                        <a class="page-link" href="?pageno=<?php echo $i; ?><?php echo !empty($st) ? '&query='.urlencode($st) : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                    
                    <li class="page-item <?php if($pageno >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="<?php if($pageno >= $total_pages) echo '#'; else echo '?pageno='.($pageno + 1).(!empty($st) ? '&query='.urlencode($st) : ''); ?>">
                            Next<i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </li>
                    <li class="page-item <?php if($pageno >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="?pageno=<?php echo $total_pages; ?><?php echo !empty($st) ? '&query='.urlencode($st) : ''; ?>">
                            Last<i class="fas fa-angle-double-right ms-1"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; 
            endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php');?>

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

        // Search form focus
        $('.search-input').focus();
    });
    </script>
</body>
</html>