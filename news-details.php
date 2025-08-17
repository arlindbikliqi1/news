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

        /* Ad Styles - Mobile-First Approach */
        .ad-container {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 1rem;
            margin: 1.5rem 0;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
            text-align: center;
            max-width: 100%;
        }

        .ad-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-gradient);
        }

        .ad-container iframe {
            max-width: 100% !important;
            height: auto !important;
        }

        .ad-label {
            font-size: 0.75rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .premium-ad-container {
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
            border: 2px solid var(--primary-color);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            max-width: 100%;
        }

        .premium-ad-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .premium-ad-label {
            background: var(--primary-gradient);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .sidebar-ad {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
            text-align: center;
            max-width: 100%;
        }

        .sidebar-ad iframe {
            max-width: 100% !important;
            height: auto !important;
        }

        .floating-ad {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-xl);
            padding: 1rem;
            z-index: 999;
            max-width: 280px;
            border: 2px solid var(--accent-color);
            display: none;
        }

        .floating-ad-close {
            position: absolute;
            top: 5px;
            right: 10px;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-size: 12px;
        }

        .direct-link-container {
            background: var(--accent-gradient);
            color: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin: 2rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            max-width: 100%;
        }

        .direct-link-container:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        .direct-link-container:before {
            content: '🎯';
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: 3rem;
            opacity: 0.3;
        }

        .direct-link-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .direct-link-subtitle {
            opacity: 0.9;
            font-size: 0.85rem;
        }

        .interstitial-trigger {
            background: var(--primary-gradient);
            color: white;
            padding: 0.875rem 1.5rem;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin: 1rem;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }

        .interstitial-trigger:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .inline-ad {
            margin: 1.5rem 0;
            padding: 1rem;
            background: var(--bg-light);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            text-align: center;
            max-width: 100%;
        }

        .inline-ad iframe {
            max-width: 100% !important;
            height: auto !important;
        }

        .content-break-ad {
            background: linear-gradient(135deg, #f093fb20 0%, #f5576c20 100%);
            border: 2px dashed var(--accent-color);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin: 2.5rem 0;
            text-align: center;
            position: relative;
            max-width: 100%;
        }

        .content-break-ad:before {
            content: '📢';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0 10px;
            font-size: 1.5rem;
        }

        .content-break-ad iframe {
            max-width: 100% !important;
            height: auto !important;
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
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .article-category {
            background: var(--accent-gradient);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .article-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--text-light);
            font-size: 0.85rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .article-meta i {
            margin-right: 0.4rem;
            color: var(--primary-color);
        }

        .article-share {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .share-label {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .share-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-gray);
            color: var(--text-dark);
            transition: var(--transition);
            text-decoration: none;
            font-size: 0.85rem;
        }

        .share-btn:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-3px);
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-bottom: 1px solid var(--border-color);
        }

        .article-content {
            padding: 1.5rem;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .article-content p {
            margin-bottom: 1.2rem;
        }

        .article-visits {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            background: var(--bg-gray);
            border-top: 1px solid var(--border-color);
            font-size: 0.85rem;
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
            padding: 1.5rem;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .comment {
            display: flex;
            gap: 1rem;
            padding: 1.2rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .comment-content {
            flex: 1;
        }

        .comment-author {
            font-weight: 700;
            margin-bottom: 0.4rem;
            font-size: 0.95rem;
        }

        .comment-date {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.8rem;
        }

        .comment-text {
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Comment Form */
        .comment-form {
            background: var(--bg-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 1.5rem;
        }

        .form-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius-sm);
            padding: 0.75rem 1rem;
            width: 100%;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.8rem;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Mobile-specific Ad Responsive Styles */
        @media (max-width: 768px) {
            .ad-container {
                margin: 1rem 0;
                padding: 0.8rem;
            }
            
            .premium-ad-container {
                padding: 1rem;
                margin: 1.5rem 0;
            }
            
            .sidebar-ad {
                padding: 0.8rem;
                margin-bottom: 1rem;
            }
            
            .inline-ad {
                margin: 1rem 0;
                padding: 0.8rem;
            }
            
            .content-break-ad {
                padding: 1rem;
                margin: 1.5rem 0;
            }
            
            .direct-link-container {
                padding: 1.2rem;
                margin: 1.5rem 0;
            }
            
            .direct-link-title {
                font-size: 1rem;
            }
            
            .direct-link-subtitle {
                font-size: 0.8rem;
            }
            
            .floating-ad {
                display: none !important;
            }
            
            .article-title {
                font-size: 1.6rem;
            }
            
            .article-image {
                height: 300px;
            }
            
            .article-header {
                padding: 1.2rem;
            }
            
            .article-content {
                padding: 1.2rem;
                font-size: 1rem;
            }
            
            .article-meta {
                gap: 0.8rem;
            }
            
            .share-btn {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }
            
            .comment {
                gap: 0.8rem;
            }
            
            .comment-avatar {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .article-title {
                font-size: 1.4rem;
            }
            
            .article-image {
                height: 250px;
            }
            
            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .article-share {
                gap: 0.5rem;
            }
            
            .comment {
                flex-direction: column;
            }
            
            .comment-avatar {
                align-self: flex-start;
            }
            
            .ad-container,
            .premium-ad-container,
            .sidebar-ad,
            .inline-ad,
            .content-break-ad {
                margin: 0.8rem 0;
                padding: 0.6rem;
            }
        }

        /* Responsive Ad Container Sizes */
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
                padding: 0 0.5rem;
            }
        }

        @media (max-width: 767px) {
            .sidebar-widgets .row > div {
                flex: 0 0 100%;
                max-width: 100%;
                padding: 0;
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
            transition: var(--transition);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
        }

        .scroll-top.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        /* Ensure ads don't break layout on mobile */
        .ad-responsive {
            max-width: 100%;
            overflow: hidden;
        }
        
        .ad-responsive iframe,
        .ad-responsive script,
        .ad-responsive div {
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>

    <!-- Ad Scripts -->
    <script type="text/javascript">
        atOptions = {
            'key' : 'cdf5eddb171fa0a9e01790ff8a001f23',
            'format' : 'iframe',
            'height' : 250,
            'width' : 300,
            'params' : {}
        };
    </script>
    <script type="text/javascript" src="//www.highperformanceformat.com/cdf5eddb171fa0a9e01790ff8a001f23/invoke.js"></script>

    <script type="text/javascript">
        atOptions = {
            'key' : '60a75c7cae1585cddedfdb4dc793e756',
            'format' : 'iframe',
            'height' : 90,
            'width' : 728,
            'params' : {}
        };
    </script>
    <script type="text/javascript" src="//www.highperformanceformat.com/60a75c7cae1585cddedfdb4dc793e756/invoke.js"></script>

    <script type="text/javascript">
        atOptions = {
            'key' : '473dbe0ba5e948b989fe71879b4a9faa',
            'format' : 'iframe',
            'height' : 600,
            'width' : 160,
            'params' : {}
        };
    </script>
    <script type="text/javascript" src="//www.highperformanceformat.com/473dbe0ba5e948b989fe71879b4a9faa/invoke.js"></script>

    <script type="text/javascript">
        atOptions = {
            'key' : '521e77e0c57d2c5a0e07ddb91c825ebb',
            'format' : 'iframe',
            'height' : 60,
            'width' : 468,
            'params' : {}
        };
    </script>
    <script type="text/javascript" src="//www.highperformanceformat.com/521e77e0c57d2c5a0e07ddb91c825ebb/invoke.js"></script>

    <script type='text/javascript' src='//pl27432355.profitableratecpm.com/cc/d2/ab/ccd2ab98de64c642a22b991d50b07112.js'></script>
    <script type='text/javascript' src='//pl27432873.profitableratecpm.com/b0/c9/22/b0c92206ec7bc13315cd757b3faa6ebf.js'></script>

    <script async="async" data-cfasync="false" src="//pl27432810.profitableratecpm.com/b2858f41c51f5ba6eabcf9f57fc86305/invoke.js"></script>
    
    <!-- PopCash Scripts -->
    <script type="text/javascript"> 
        var uid = '493916'; 
        var wid = '744646'; 
        var pop_fback = 'up'; 
        var pop_tag = document.createElement('script');
        pop_tag.src='//cdn.popcash.net/show.js';
        document.body.appendChild(pop_tag); 
        pop_tag.onerror = function() {
            pop_tag = document.createElement('script');
            pop_tag.src='//cdn2.popcash.net/show.js';
            document.body.appendChild(pop_tag)
        }; 
    </script>
    
    <script type="text/javascript"> 
        var uid = '493916'; 
        var wid = '744646'; 
        var pop_tag = document.createElement('script');
        pop_tag.src='//cdn.popcash.net/show.js';
        document.body.appendChild(pop_tag); 
        pop_tag.onerror = function() {
            pop_tag = document.createElement('script');
            pop_tag.src='//cdn2.popcash.net/show.js';
            document.body.appendChild(pop_tag)
        }; 
    </script>
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <?php include('includes/header.php');?>

    <!-- Top Banner Ad -->
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="premium-ad-container ad-responsive" data-aos="fade-down">
            <div class="premium-ad-label">Featured Sponsor</div>
            <div id="container-b2858f41c51f5ba6eabcf9f57fc86305"></div>
        </div>
    </div>

    <!-- Direct Link CTA -->
    <div class="container">
        <div class="direct-link-container" data-aos="zoom-in" onclick="window.open('https://otieu.com/4/9726604', '_blank')">
            <div class="direct-link-title">🔥 Breaking: Exclusive Content Available</div>
            <div class="direct-link-subtitle">Click to access premium news and special offers</div>
        </div>
    </div>

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
                        
                        <!-- Ad after image -->
                        <div class="inline-ad ad-responsive" data-aos="fade-up">
                            <div class="ad-label">Advertisement</div>
                            <script type="text/javascript">
                                atOptions = {
                                    'key' : '60a75c7cae1585cddedfdb4dc793e756',
                                    'format' : 'iframe',
                                    'height' : 90,
                                    'width' : 728,
                                    'params' : {}
                                };
                                document.write('<scr' + 'ipt type="text/javascript" src="//www.highperformanceformat.com/60a75c7cae1585cddedfdb4dc793e756/invoke.js"></scr' + 'ipt>');
                            </script>
                        </div>
                        
                        <div class="article-content">
                            <?php 
                            $pt = $row['postdetails'];
                            $content = substr($pt, 0);
                            
                            // Split content into paragraphs for ad insertion
                            $paragraphs = explode('</p>', $content);
                            $totalParagraphs = count($paragraphs);
                            $adInserted = false;
                            
                            foreach($paragraphs as $index => $paragraph) {
                                if (!empty(trim($paragraph))) {
                                    echo $paragraph . '</p>';
                                    
                                    // Insert ad in the middle of content
                                    if (!$adInserted && $index > $totalParagraphs / 2) {
                                        echo '<div class="content-break-ad ad-responsive" data-aos="fade-up">
                                                <div class="ad-label">Sponsored Content</div>
                                                <div class="direct-link-container" onclick="window.open(\'https://otieu.com/4/9724733\', \'_blank\')" style="margin: 1rem 0;">
                                                    <div class="direct-link-title">💎 Premium Access</div>
                                                    <div class="direct-link-subtitle">Unlock exclusive content and special features</div>
                                                </div>
                                                <div class="ad-responsive">
                                                    <script type="text/javascript">
                                                        atOptions = {
                                                            "key" : "521e77e0c57d2c5a0e07ddb91c825ebb",
                                                            "format" : "iframe",
                                                            "height" : 60,
                                                            "width" : 468,
                                                            "params" : {}
                                                        };
                                                        document.write("<scr" + "ipt type=\"text/javascript\" src=\"//www.highperformanceformat.com/521e77e0c57d2c5a0e07ddb91c825ebb/invoke.js\"></scr" + "ipt>");
                                                    </script>
                                                </div>
                                              </div>';
                                        $adInserted = true;
                                    }
                                }
                            }
                            ?>
                        </div>
                        
                        <div class="article-visits">
                            <i class="fas fa-eye"></i>
                            <span>Total Visits: <span class="visits-count"><?php print $visits; ?></span></span>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Post-Content Ad -->
                    <div class="ad-container ad-responsive" data-aos="fade-up">
                        <div class="ad-label">You Might Be Interested</div>
                        <div class="ad-responsive">
                            <script type="text/javascript">
                                atOptions = {
                                    'key' : '473dbe0ba5e948b989fe71879b4a9faa',
                                    'format' : 'iframe',
                                    'height' : 600,
                                    'width' : 160,
                                    'params' : {}
                                };
                                document.write('<scr' + 'ipt type="text/javascript" src="//www.highperformanceformat.com/473dbe0ba5e948b989fe71879b4a9faa/invoke.js"></scr' + 'ipt>');
                            </script>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h3 class="section-title">Comments</h3>
                        
                        <?php 
                        $sts = 1;
                        $query = mysqli_query($con, "select name,comment,postingDate from tblcomments where postId='$pid' and status='$sts'");
                        if(mysqli_num_rows($query) > 0) {
                            $commentCount = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                $commentCount++;
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
                        // Insert ad every 3 comments
                        if ($commentCount % 3 == 0) {
                            echo '<div class="inline-ad ad-responsive" data-aos="fade-up">
                                    <div class="ad-label">Advertisement</div>
                                    <a href="https://otieu.com/4/9726604" target="_blank" class="interstitial-trigger">
                                        <i class="fas fa-star me-2"></i>Discover Premium Features
                                    </a>
                                  </div>';
                        }
                        ?>

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
                        
                        <!-- Pre-form Ad -->
                        <div class="inline-ad ad-responsive" style="margin-bottom: 2rem;">
                            <div class="ad-label">Before You Comment</div>
                            <div class="direct-link-container" onclick="window.open('https://otieu.com/4/9724733', '_blank')" style="margin: 1rem 0;">
                                <div class="direct-link-title">🗨️ Join Our Community</div>
                                <div class="direct-link-subtitle">Get exclusive access to premium discussions and content</div>
                            </div>
                        </div>

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
                    <!-- Sidebar Ads -->
                    <div class="sidebar-ad ad-responsive" data-aos="fade-left">
                        <div class="ad-label">Recommended</div>
                        <div class="ad-responsive">
                            <script type="text/javascript">
                                atOptions = {
                                    'key' : 'cdf5eddb171fa0a9e01790ff8a001f23',
                                    'format' : 'iframe',
                                    'height' : 250,
                                    'width' : 300,
                                    'params' : {}
                                };
                                document.write('<scr' + 'ipt type="text/javascript" src="//www.highperformanceformat.com/cdf5eddb171fa0a9e01790ff8a001f23/invoke.js"></scr' + 'ipt>');
                            </script>
                        </div>
                    </div>

                    <!-- Direct Link in Sidebar -->
                    <div class="sidebar-ad ad-responsive" data-aos="fade-left" data-aos-delay="200">
                        <div class="ad-label">Special Offer</div>
                        <div class="direct-link-container" onclick="window.open('https://otieu.com/4/9726604', '_blank')" style="margin: 0;">
                            <div class="direct-link-title">🎁 Limited Time</div>
                            <div class="direct-link-subtitle">Exclusive deals available now</div>
                        </div>
                    </div>

                    <!-- Sidebar Content -->
                    <div class="sidebar-widgets">
                        <?php include('includes/sidebar.php');?>
                    </div>

                    <!-- Bottom Sidebar Ad -->
                    <div class="sidebar-ad ad-responsive" data-aos="fade-left" data-aos-delay="400">
                        <div class="ad-label">More Content</div>
                        <a href="https://otieu.com/4/9724733" target="_blank" class="interstitial-trigger" style="width: 100%; margin: 0;">
                            <i class="fas fa-plus-circle me-2"></i>Explore More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Ad (Desktop only) -->
    <div class="floating-ad" id="floatingAd">
        <button class="floating-ad-close" onclick="document.getElementById('floatingAd').style.display='none'">&times;</button>
        <div class="ad-label">Don't Miss Out</div>
        <div style="cursor: pointer;" onclick="window.open('https://otieu.com/4/9726604', '_blank')">
            <div style="padding: 15px; text-align: center; background: var(--primary-gradient); color: white; border-radius: 10px;">
                <div style="font-weight: bold; margin-bottom: 8px;">🚀 Premium Access</div>
                <div style="font-size: 12px;">Click for exclusive content</div>
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

        // Show floating ad after 8 seconds (desktop only)
        if (window.innerWidth > 992) {
            setTimeout(function() {
                $('#floatingAd').fadeIn();
            }, 8000);
        }

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

        // Add click tracking for direct links and ads
        $('.direct-link-container, .interstitial-trigger').on('click', function() {
            // Track clicks if you have analytics
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'advertisement',
                    'event_label': 'direct_link_click'
                });
            }
        });

        // Auto-hide floating ad after 30 seconds
        setTimeout(function() {
            $('#floatingAd').fadeOut();
        }, 30000);

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

        // Reading progress bar
        var progressBar = $('<div>', {
            css: {
                position: 'fixed',
                top: '0',
                left: '0',
                width: '0%',
                height: '3px',
                background: 'var(--accent-gradient)',
                zIndex: '9999',
                transition: 'width 0.3s ease'
            }
        }).appendTo('body');

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = (scroll / height) * 100;
            progressBar.css('width', progress + '%');
        });

        // Mobile-friendly ad adjustment
        function adjustAdsForMobile() {
            if (window.innerWidth <= 768) {
                $('.ad-responsive').each(function() {
                    $(this).find('iframe').css({
                        'max-width': '100%',
                        'width': '100%',
                        'height': 'auto'
                    });
                });
                
                // Adjust specific ad dimensions for mobile
                $('script').each(function() {
                    var scriptContent = $(this).html();
                    if (scriptContent && scriptContent.includes('atOptions')) {
                        // Force mobile-friendly ad sizes
                        if (scriptContent.includes('728')) {
                            scriptContent = scriptContent.replace('728', '320');
                            scriptContent = scriptContent.replace('90', '50');
                        }
                        if (scriptContent.includes('468')) {
                            scriptContent = scriptContent.replace('468', '320');
                            scriptContent = scriptContent.replace('60', '50');
                        }
                        if (scriptContent.includes('600')) {
                            scriptContent = scriptContent.replace('600', '320');
                            scriptContent = scriptContent.replace('160', '100');
                        }
                    }
                });
            }
        }

        // Run on load and resize
        adjustAdsForMobile();
        $(window).resize(adjustAdsForMobile);

        // Lazy loading for ads with Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const adContainer = entry.target;
                    if (!adContainer.classList.contains('loaded')) {
                        adContainer.classList.add('loaded');
                        // Add responsive class after loading
                        setTimeout(() => {
                            adjustAdsForMobile();
                        }, 1000);
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        // Observe all ad containers
        document.querySelectorAll('.ad-container, .sidebar-ad, .inline-ad, .content-break-ad').forEach(ad => {
            observer.observe(ad);
        });

        // Add hover effects to direct link containers
        $('.direct-link-container').hover(
            function() {
                if (window.innerWidth > 768) {
                    $(this).css('transform', 'translateY(-5px) scale(1.02)');
                }
            },
            function() {
                $(this).css('transform', 'translateY(0) scale(1)');
            }
        );

        // Social share tracking
        $('.share-btn').on('click', function() {
            var platform = $(this).find('i').attr('class').split('-')[1];
            if (typeof gtag !== 'undefined') {
                gtag('event', 'share', {
                    'event_category': 'social',
                    'event_label': platform
                });
            }
        });

        // Form submission enhancement
        $('form[name="Comment"]').on('submit', function(e) {
            var submitBtn = $(this).find('.submit-btn');
            submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Posting...');
            submitBtn.prop('disabled', true);
        });

        // Add entrance animations to comments
        $('.comment').each(function(index) {
            $(this).css({
                'opacity': '0',
                'transform': 'translateX(-30px)'
            }).delay(index * 100).animate({
                'opacity': '1'
            }, 500, function() {
                $(this).css('transform', 'translateX(0)');
            });
        });

        // Interactive elements
        $('.card-bookmark, .share-btn').hover(
            function() {
                if (window.innerWidth > 768) {
                    $(this).css('transform', 'scale(1.1)');
                }
            },
            function() {
                $(this).css('transform', 'scale(1)');
            }
        );

        // Prevent ad overflow on mobile
        function preventAdOverflow() {
            $('.ad-responsive').each(function() {
                var $this = $(this);
                var containerWidth = $this.width();
                
                $this.find('iframe, script + *, div').each(function() {
                    var $element = $(this);
                    if ($element.width() > containerWidth) {
                        $element.css({
                            'width': '100%',
                            'max-width': containerWidth + 'px'
                        });
                    }
                });
            });
        }

        // Run overflow prevention
        setTimeout(preventAdOverflow, 2000);
        setInterval(preventAdOverflow, 5000);

        // Auto-refresh ads every 5 minutes to increase impressions
        setInterval(function() {
            $('.ad-container, .sidebar-ad, .inline-ad').addClass('refreshing');
            setTimeout(function() {
                $('.ad-container, .sidebar-ad, .inline-ad').removeClass('refreshing');
                adjustAdsForMobile();
                preventAdOverflow();
            }, 1000);
        }, 300000); // 5 minutes
    });

    // Ad interaction tracking function
    function trackAdClick(adType, url) {
        // Track ad clicks for analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', 'ad_click', {
                'event_category': 'advertisement',
                'event_label': adType,
                'value': 1
            });
        }
        
        // Optional: Send to your own analytics
        if (typeof fetch !== 'undefined') {
            fetch('/track-ad-click.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    type: adType,
                    url: url,
                    page: window.location.href,
                    timestamp: Date.now()
                })
            }).catch(() => {
                // Ignore errors
            });
        }
        
        // Open URL
        window.open(url, '_blank');
    }

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

    // Rotate direct links for better CTR
    const directLinks = [
        {
            url: 'https://otieu.com/4/9726604',
            title: '🎯 Discover Amazing Offers',
            subtitle: 'Click here to explore exclusive deals and content'
        },
        {
            url: 'https://otieu.com/4/9724733',
            title: '💰 Exclusive Deals Await',
            subtitle: 'Don\'t miss out on limited-time offers and premium content'
        },
        {
            url: 'https://otieu.com/4/9726604',
            title: '🔥 Breaking: Premium Access',
            subtitle: 'Unlock exclusive content and special features'
        }
    ];

    // Rotate direct link content every 15 seconds
    let currentLinkIndex = 0;
    setInterval(function() {
        const containers = document.querySelectorAll('.direct-link-container');
        containers.forEach(container => {
            const title = container.querySelector('.direct-link-title');
            const subtitle = container.querySelector('.direct-link-subtitle');
            if (title && subtitle) {
                const link = directLinks[currentLinkIndex];
                title.textContent = link.title;
                subtitle.textContent = link.subtitle;
                container.onclick = function() { 
                    trackAdClick('direct_link', link.url); 
                };
            }
        });
        currentLinkIndex = (currentLinkIndex + 1) % directLinks.length;
    }, 15000);

    // Mobile viewport fix for ads
    function setMobileViewportForAds() {
        if (window.innerWidth <= 768) {
            var viewport = document.querySelector('meta[name=viewport]');
            if (viewport) {
                viewport.setAttribute('content', 'width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no');
            }
            
            // Add mobile-specific ad styles
            var style = document.createElement('style');
            style.textContent = `
                @media (max-width: 768px) {
                    .ad-responsive iframe {
                        max-width: 100% !important;
                        width: 100% !important;
                        height: auto !important;
                        transform: scale(1) !important;
                    }
                    .ad-responsive {
                        overflow: hidden !important;
                        max-width: 100% !important;
                    }
                    .ad-container, .sidebar-ad, .inline-ad, .content-break-ad {
                        box-sizing: border-box !important;
                        max-width: 100% !important;
                        overflow: hidden !important;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }

    // Run mobile viewport fix
    setMobileViewportForAds();
    window.addEventListener('orientationchange', function() {
        setTimeout(setMobileViewportForAds, 100);
    });
    </script>
</body>
</html>
