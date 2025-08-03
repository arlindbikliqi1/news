<?php
// news-details.php
session_start();
include('includes/config.php');
$postid = intval($_GET['nid']);
$ip = $_SERVER['REMOTE_ADDR'];
$visitQuery = mysqli_query($con, "INSERT INTO tblvisits (post_id, ip_address) VALUES ('$postid', '$ip')");

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit'])) {
    if (!empty($_POST['csrftoken'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $comment = mysqli_real_escape_string($con, $_POST['comment']);
            $postid = intval($_GET['nid']);
            $st1 = '0';
            $stmt = $con->prepare("INSERT INTO tblcomments (postId, name, email, comment, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $postid, $name, $email, $comment, $st1);
            if($stmt->execute()):
                echo "<script>alert('Comment submitted successfully. It will be displayed after admin review.');</script>";
                unset($_SESSION['token']);
            else:
                echo "<script>alert('Something went wrong. Please try again.');</script>";  
            endif;
            $stmt->close();
        }
    }
}

$postid = intval($_GET['nid']);
$sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $visits = $row["viewCounter"];
        $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
        $con->query($sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Live News Portal | News Details</title>
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

        /* News Details Styles */
        .news-details-section {
            padding-top: 120px;
            padding-bottom: 4rem;
        }

        .news-article {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .article-header {
            padding: 2rem 2rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .article-category {
            background: var(--accent-gradient);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .article-meta i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        .article-share {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .share-label {
            font-weight: 600;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-gray);
            color: var(--text-dark);
            transition: var(--transition);
        }

        .share-btn:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-3px);
        }

        .article-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-bottom: 1px solid var(--border-color);
        }

        .article-content {
            padding: 2rem;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-visits {
            display: flex;
            align-items: center;
            padding: 1.5rem 2rem;
            background: var(--bg-gray);
            border-top: 1px solid var(--border-color);
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .visits-count {
            font-weight: 600;
            color: var(--primary-color);
            margin-left: 0.5rem;
        }

        /* Comments Section */
        .comments-section {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .comment {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .comment-content {
            flex: 1;
        }

        .comment-author {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .comment-date {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .comment-text {
            line-height: 1.6;
        }

        /* Comment Form */
        .comment-form {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 2rem;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius-sm);
            padding: 0.875rem 1.25rem;
            width: 100%;
            transition: var(--transition);
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .article-title {
                font-size: 2rem;
            }
            
            .article-image {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .article-title {
                font-size: 1.75rem;
            }
            
            .article-image {
                height: 300px;
            }
            
            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .comment {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .article-title {
                font-size: 1.5rem;
            }
            
            .article-image {
                height: 250px;
            }
        }
        /* Add this to your existing CSS */
@media (min-width: 992px) {
    .sidebar-widgets .row > div {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

@media (max-width: 991px) {
    .sidebar-widgets .row {
        display: flex;
        flex-wrap: wrap;
    }
    
    .sidebar-widgets .row > div {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (max-width: 767px) {
    .sidebar-widgets .row > div {
        flex: 0 0 100%;
        max-width: 100%;
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

    <!-- News Details Section -->
    <section class="news-details-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="news-article">
                        <?php
                        $pid = intval($_GET['nid']);
                        $currenturl = "http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="article-header">
                            <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>" class="article-category">
                                <?php echo htmlentities($row['category']);?>
                            </a>
                            <?php if(!empty($row['subcategory'])): ?>
                            <span class="article-category bg-warning">
                                <?php echo htmlentities($row['subcategory']);?>
                            </span>
                            <?php endif; ?>
                            <h1 class="article-title"><?php echo htmlentities($row['posttitle']);?></h1>
                            
                            <div class="article-meta">
                                <span>
                                    <i class="fas fa-user"></i>
                                    by <?php echo htmlentities($row['postedBy']);?>
                                </span>
                                <span>
                                    <i class="fas fa-calendar-alt"></i>
                                    <?php echo htmlentities($row['postingdate']);?>
                                </span>
                                <?php if($row['lastUpdatedBy'] != ''): ?>
                                <span>
                                    <i class="fas fa-edit"></i>
                                    Updated by <?php echo htmlentities($row['lastUpdatedBy']);?> on <?php echo htmlentities($row['UpdationDate']);?>
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="article-share">
                                <span class="share-label">Share:</span>
                                <a href="http://www.facebook.com/share.php?u=<?php echo $currenturl;?>" target="_blank" class="share-btn">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/share?url=<?php echo $currenturl;?>" target="_blank" class="share-btn">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://web.whatsapp.com/send?text=<?php echo $currenturl;?>" target="_blank" class="share-btn">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $currenturl;?>" target="_blank" class="share-btn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                        
                        <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" class="article-image">
                        
                        <div class="article-content">
                            <?php 
                            $pt = $row['postdetails'];
                            echo (substr($pt, 0));
                            ?>
                        </div>
                        
                        <div class="article-visits">
                            <i class="fas fa-eye"></i>
                            <span>Total Visits: <span class="visits-count"><?php print $visits; ?></span></span>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h3 class="section-title">Comments</h3>
                        
                        <?php 
                        $sts = 1;
                        $query = mysqli_query($con, "select name,comment,postingDate from tblcomments where postId='$pid' and status='$sts'");
                        if(mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="comment">
                            <div class="comment-avatar">
                                <?php echo substr(htmlentities($row['name']), 0, 1); ?>
                            </div>
                            <div class="comment-content">
                                <h4 class="comment-author"><?php echo htmlentities($row['name']);?></h4>
                                <div class="comment-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <?php echo htmlentities($row['postingDate']);?>
                                </div>
                                <p class="comment-text"><?php echo htmlentities($row['comment']);?></p>
                            </div>
                        </div>
                        <?php 
                            }
                        } else {
                            echo '<p class="text-center py-4">No comments yet. Be the first to comment!</p>';
                        }
                        ?>
                    </div>
                    
                    <!-- Comment Form -->
                    <div class="comment-form">
                        <h3 class="form-title">Leave a Comment</h3>
                        <form name="Comment" method="post">
                            <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="5" placeholder="Your Comment" required></textarea>
                            </div>
                            
                            <button type="submit" class="submit-btn" name="submit">Post Comment</button>
                        </form>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <?php include('includes/sidebar.php');?>
                </div>
            </div>
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