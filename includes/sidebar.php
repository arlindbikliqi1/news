<div class="sidebar-widgets">
    <div class="row">
        <!-- Search Widget -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="widget-card" data-aos="fade-up" data-aos-delay="100">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fas fa-search me-2"></i>Search News
                    </h5>
                </div>
                <div class="widget-body">
                    <form name="search" action="search.php" method="post" class="search-form">
                        <div class="search-input-group">
                            <input type="text" name="searchtitle" class="form-control search-input" 
                                   placeholder="Enter keywords..." required>
                            <button class="search-btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="search-suggestions mt-3">
                            <span class="suggestion-label">Popular searches:</span>
                            <div class="suggestion-tags">
                                <span class="suggestion-tag">Politics</span>
                                <span class="suggestion-tag">Technology</span>
                                <span class="suggestion-tag">Sports</span>
                                <span class="suggestion-tag">Business</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Recent News Widget -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="widget-card" data-aos="fade-up" data-aos-delay="200">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fas fa-clock me-2"></i>Recent News
                    </h5>
                </div>
                <div class="widget-body">
                    <div class="recent-news-list">
                        <?php
                        $recentQuery = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostImage, 
                                                          tblposts.PostTitle AS posttitle, tblposts.PostingDate,
                                                          tblcategory.CategoryName
                                                          FROM tblposts 
                                                          LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                                          WHERE tblposts.Is_Active = 1 
                                                          ORDER BY tblposts.id DESC 
                                                          LIMIT 6");
                        while ($recent = mysqli_fetch_array($recentQuery)) {
                        ?>
                        <div class="recent-news-item">
                            <div class="recent-news-image">
                                <img src="admin/postimages/<?php echo htmlentities($recent['PostImage']);?>" 
                                     alt="<?php echo htmlentities($recent['posttitle']);?>" 
                                     class="recent-img">
                                <div class="recent-overlay">
                                    <span class="recent-category"><?php echo htmlentities($recent['CategoryName']);?></span>
                                </div>
                            </div>
                            <div class="recent-news-content">
                                <a href="news-details.php?nid=<?php echo htmlentities($recent['pid'])?>" 
                                   class="recent-title"><?php echo htmlentities($recent['posttitle']);?></a>
                                <div class="recent-date">
                                    <i class="far fa-clock me-1"></i>
                                    <?php echo date('M d, Y', strtotime($recent['PostingDate'])); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular News Widget -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="widget-card" data-aos="fade-up" data-aos-delay="300">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fas fa-fire me-2"></i>Popular News
                    </h5>
                </div>
                <div class="widget-body">
                    <div class="popular-news-list">
                        <?php
                        $popularQuery = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostTitle AS posttitle,
                                                           tblposts.viewCounter, tblcategory.CategoryName,
                                                           tblposts.PostingDate
                                                           FROM tblposts 
                                                           LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                                           WHERE tblposts.Is_Active = 1 
                                                           ORDER BY viewCounter DESC 
                                                           LIMIT 8");
                        $rank = 1;
                        while ($popular = mysqli_fetch_array($popularQuery)) {
                        ?>
                        <div class="popular-news-item">
                            <div class="popular-rank">
                                <span class="rank-number"><?php echo $rank; ?></span>
                            </div>
                            <div class="popular-content">
                                <a href="news-details.php?nid=<?php echo htmlentities($popular['pid'])?>" 
                                   class="popular-title"><?php echo htmlentities($popular['posttitle']);?></a>
                                <div class="popular-meta">
                                    <span class="popular-category"><?php echo htmlentities($popular['CategoryName']);?></span>
                                    <span class="popular-views">
                                        <i class="fas fa-eye me-1"></i><?php echo number_format($popular['viewCounter']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $rank++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trending Topics Widget -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="widget-card" data-aos="fade-up" data-aos-delay="400">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fas fa-trending-up me-2"></i>Trending Topics
                    </h5>
                </div>
                <div class="widget-body">
                    <div class="trending-topics">
                        <?php
                        $trendingQuery = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostTitle AS posttitle,
                                                            tblposts.PostImage, tblcategory.CategoryName
                                                            FROM tblposts 
                                                            LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                                            WHERE tblposts.Is_Active = 1 
                                                            ORDER BY viewCounter DESC 
                                                            LIMIT 6");
                        $trendIndex = 1;
                        while ($trending = mysqli_fetch_array($trendingQuery)) {
                        ?>
                        <div class="trending-item">
                            <div class="trending-image">
                                <img src="admin/postimages/<?php echo htmlentities($trending['PostImage']);?>" 
                                     alt="<?php echo htmlentities($trending['posttitle']);?>" 
                                     class="trending-img">
                                <div class="trending-badge">
                                    <i class="fas fa-bolt"></i>
                                </div>
                            </div>
                            <div class="trending-content">
                                <span class="trending-category"><?php echo htmlentities($trending['CategoryName']);?></span>
                                <a href="news-details.php?nid=<?php echo htmlentities($trending['pid'])?>" 
                                   class="trending-title"><?php echo htmlentities($trending['posttitle']);?></a>
                            </div>
                        </div>
                        <?php 
                        $trendIndex++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter & Social Section -->
    <div class="row mt-4">
        <!-- Newsletter Widget -->
        <div class="col-lg-6 mb-4">
            <div class="widget-card newsletter-widget" data-aos="fade-up" data-aos-delay="500">
                <div class="newsletter-content">
                    <div class="newsletter-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <h5 class="newsletter-title">Stay Updated</h5>
                    <p class="newsletter-text">Get the latest news delivered directly to your inbox.</p>
                    <form class="newsletter-form" action="#" method="post">
                        <div class="newsletter-input-group">
                            <input type="email" class="newsletter-input" placeholder="Enter your email" required>
                            <button type="submit" class="newsletter-btn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="newsletter-privacy">
                            <small>We respect your privacy. Unsubscribe at any time.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Social Media Widget -->
        <div class="col-lg-6 mb-4">
            <div class="widget-card social-widget" data-aos="fade-up" data-aos-delay="600">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fas fa-share-alt me-2"></i>Follow Us
                    </h5>
                </div>
                <div class="widget-body">
                    <div class="social-links-grid">
                        <a href="#" class="social-link facebook">
                            <div class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <div class="social-info">
                                <span class="social-name">Facebook</span>
                                <span class="social-count">125K Followers</span>
                            </div>
                        </a>
                        <a href="#" class="social-link twitter">
                            <div class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div class="social-info">
                                <span class="social-name">Twitter</span>
                                <span class="social-count">89K Followers</span>
                            </div>
                        </a>
                        <a href="#" class="social-link instagram">
                            <div class="social-icon">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="social-info">
                                <span class="social-name">Instagram</span>
                                <span class="social-count">156K Followers</span>
                            </div>
                        </a>
                        <a href="#" class="social-link youtube">
                            <div class="social-icon">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <div class="social-info">
                                <span class="social-name">YouTube</span>
                                <span class="social-count">98K Subscribers</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Widget -->
    <div class="row">
        <div class="col-12">
            <div class="widget-card video-widget" data-aos="fade-up" data-aos-delay="700">
                <div class="widget-header">
                    <h5 class="widget-title">
                        <i class="fas fa-play-circle me-2"></i>Featured Videos
                    </h5>
                </div>
                <div class="widget-body">
                    <div class="video-grid">
                        <?php
                        $videoQuery = mysqli_query($con, "SELECT * FROM tblvideos WHERE is_active=1 ORDER BY id DESC LIMIT 4");
                        while($video = mysqli_fetch_array($videoQuery)) {
                            // Extract YouTube video ID
                            parse_str(parse_url($video['url'], PHP_URL_QUERY), $params);
                            $videoId = isset($params['v']) ? $params['v'] : '';
                            
                            if($videoId) {
                        ?>
                        <div class="video-item">
                            <div class="video-thumbnail">
                                <img src="https://img.youtube.com/vi/<?php echo $videoId; ?>/maxresdefault.jpg" 
                                     alt="<?php echo htmlentities($video['title']); ?>" class="video-img">
                                <div class="video-play-btn" data-video-id="<?php echo $videoId; ?>">
                                    <i class="fas fa-play"></i>
                                </div>
                                <div class="video-duration">5:30</div>
                            </div>
                            <div class="video-info">
                                <h6 class="video-title"><?php echo htmlentities($video['title']); ?></h6>
                                <div class="video-meta">
                                    <span class="video-views">
                                        <i class="fas fa-eye me-1"></i>
                                    </span>
                                    <span class="video-date"></span>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Featured Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="video-wrapper">
                    <iframe id="videoFrame" width="100%" height="400" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Sidebar Widgets Styles */
.sidebar-widgets {
    padding: 2rem 0;
}

.widget-card {
    background: var(--bg-light);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    height: 100%;
    border: 1px solid var(--border-color);
    transition: var(--transition);
    position: relative;
}

.widget-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.widget-card:before {
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

.widget-card:hover:before {
    transform: scaleX(1);
}

.widget-header {
    padding: 1.5rem 1.5rem 1rem;
    border-bottom: 1px solid var(--border-color);
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
}

.widget-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin: 0;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.widget-body {
    padding: 1.5rem;
}


/* Search Widget */
.search-form {
    position: relative;
}

.search-input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.search-input {
    border: 2px solid var(--border-color);
    border-radius: 50px;
    padding: 0.875rem 1.25rem;
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

.search-btn {
    position: absolute;
    right: 4px;
    top: 50%;
    transform: translateY(-50%);
    background: var(--primary-gradient);
    color: white;
    border: none;
    border-radius: 50px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.search-btn:hover {
    transform: translateY(-50%) scale(1.05);
    box-shadow: var(--shadow-md);
}

.search-suggestions {
    margin-top: 1rem;
}

.suggestion-label {
    font-size: 0.8rem;
    color: var(--text-light);
    margin-bottom: 0.5rem;
    display: block;
}

.suggestion-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.suggestion-tag {
    background: var(--bg-gray);
    color: var(--text-dark);
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.8rem;
    cursor: pointer;
    transition: var(--transition);
}

.suggestion-tag:hover {
    background: var(--primary-gradient);
    color: white;
}

/* Recent News Widget */
.recent-news-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.recent-news-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: var(--bg-gray);
    border-radius: var(--border-radius-sm);
    transition: var(--transition);
}

.recent-news-item:hover {
    background: white;
    box-shadow: var(--shadow-sm);
}

.recent-news-image {
    position: relative;
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    border-radius: var(--border-radius-sm);
    overflow: hidden;
}

.recent-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.recent-news-item:hover .recent-img {
    transform: scale(1.1);
}

.recent-overlay {
    position: absolute;
    top: 0.5rem;
    left: 0.5rem;
}

.recent-category {
    background: var(--accent-gradient);
    color: white;
    padding: 0.2rem 0.5rem;
    border-radius: 50px;
    font-size: 0.6rem;
    font-weight: 600;
    text-transform: uppercase;
}

.recent-news-content {
    flex: 1;
    min-width: 0;
}

.recent-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    text-decoration: none;
    line-height: 1.3;
    margin-bottom: 0.5rem;
    display: block;
    transition: var(--transition);
}

.recent-title:hover {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.recent-date {
    font-size: 0.75rem;
    color: var(--text-light);
}

/* Popular News Widget */
.popular-news-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.popular-news-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 0.75rem;
    border-radius: var(--border-radius-sm);
    transition: var(--transition);
}

.popular-news-item:hover {
    background: var(--bg-gray);
}

.popular-rank {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.rank-number {
    color: white;
    font-weight: 700;
    font-size: 0.8rem;
}

.popular-content {
    flex: 1;
    min-width: 0;
}

.popular-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    text-decoration: none;
    line-height: 1.3;
    margin-bottom: 0.5rem;
    display: block;
    transition: var(--transition);
}

.popular-title:hover {
    color: var(--primary-color);
}

.popular-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.75rem;
}

.popular-category {
    color: var(--primary-color);
    font-weight: 600;
}

.popular-views {
    color: var(--text-light);
}

/* Trending Topics Widget */
.trending-topics {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.trending-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: var(--bg-gray);
    border-radius: var(--border-radius-sm);
    transition: var(--transition);
}

.trending-item:hover {
    background: white;
    box-shadow: var(--shadow-sm);
}

.trending-image {
    position: relative;
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    border-radius: var(--border-radius-sm);
    overflow: hidden;
}

.trending-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.trending-badge {
    position: absolute;
    top: 0.25rem;
    right: 0.25rem;
    background: var(--accent-gradient);
    color: white;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.6rem;
}

.trending-content {
    flex: 1;
    min-width: 0;
}

.trending-category {
    background: var(--secondary-gradient);
    color: white;
    padding: 0.2rem 0.5rem;
    border-radius: 50px;
    font-size: 0.6rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
    display: inline-block;
}

.trending-title {
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-dark);
    text-decoration: none;
    line-height: 1.3;
    transition: var(--transition);
}

.trending-title:hover {
    color: var(--primary-color);
}

/* Newsletter Widget */
.newsletter-widget {
    background: var(--primary-gradient);
    color: white;
}

.newsletter-widget .widget-header {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.2);
}

.newsletter-widget .widget-title {
    color: white;
    background: none;
    -webkit-background-clip: initial;
    -webkit-text-fill-color: initial;
}

.newsletter-content {
    text-align: center;
}

.newsletter-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.8;
}

.newsletter-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.newsletter-text {
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.newsletter-input-group {
    position: relative;
    margin-bottom: 1rem;
}

.newsletter-input {
    width: 100%;
    padding: 0.875rem 3.5rem 0.875rem 1rem;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transition: var(--transition);
}

.newsletter-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.newsletter-input:focus {
    outline: none;
    border-color: rgba(255, 255, 255, 0.6);
    background: rgba(255, 255, 255, 0.2);
}

.newsletter-btn {
    position: absolute;
    right: 4px;
    top: 50%;
    transform: translateY(-50%);
    background: white;
    color: var(--primary-color);
    border: none;
    border-radius: 50px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.newsletter-btn:hover {
    transform: translateY(-50%) scale(1.05);
    box-shadow: var(--shadow-md);
}

.newsletter-privacy {
    opacity: 0.8;
    font-size: 0.75rem;
}

/* Social Media Widget */
.social-links-grid {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.social-link {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--bg-gray);
    border-radius: var(--border-radius-sm);
    text-decoration: none;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.social-link:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    transition: var(--transition);
}

.social-link.facebook:before {
    background: #1877f2;
}

.social-link.twitter:before {
    background: #1da1f2;
}

.social-link.instagram:before {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
}

.social-link.youtube:before {
    background: #ff0000;
}

.social-link:hover {
    background: white;
    box-shadow: var(--shadow-sm);
    transform: translateY(-2px);
}

.social-link:hover:before {
    width: 8px;
}

.social-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    flex-shrink: 0;
}

.facebook .social-icon {
    background: #1877f2;
}

.twitter .social-icon {
    background: #1da1f2;
}

.instagram .social-icon {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
}

.youtube .social-icon {
    background: #ff0000;
}

.social-info {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.social-name {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.social-count {
    font-size: 0.85rem;
    color: var(--text-light);
}

/* Video Widget */
.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
}

.video-item {
    border-radius: var(--border-radius-sm);
    overflow: hidden;
    background: var(--bg-gray);
    transition: var(--transition);
}

.video-item:hover {
    background: white;
    box-shadow: var(--shadow-sm);
}

.video-thumbnail {
    position: relative;
    height: 140px;
    overflow: hidden;
}

.video-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.video-item:hover .video-img {
    transform: scale(1.05);
}

.video-play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    transition: var(--transition);
}

.video-play-btn:hover {
    background: var(--primary-color);
    transform: translate(-50%, -50%) scale(1.1);
}

.video-duration {
    position: absolute;
    bottom: 0.5rem;
    right: 0.5rem;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
}

.video-info {
    padding: 1rem;
}

.video-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.video-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.75rem;
    color: var(--text-light);
}

/* Responsive Design */
@media (max-width: 992px) {
    .sidebar-widgets {
        padding: 1rem 0;
    }
    
    .widget-card {
        margin-bottom: 1.5rem;
    }
    
    .video-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .widget-header {
        padding: 1rem;
    }
    
    .widget-body {
        padding: 1rem;
    }
    
    .recent-news-item,
    .trending-item {
        padding: 0.75rem;
    }
    
    .social-links-grid {
        gap: 0.75rem;
    }
    
    .social-link {
        padding: 0.75rem;
    }
}

/* Dark mode styles */
[data-theme="dark"] .widget-card {
    background: var(--bg-dark);
    border-color: rgba(255, 255, 255, 0.1);
    color: white;
}

[data-theme="dark"] .widget-header {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.1);
}

[data-theme="dark"] .search-input,
[data-theme="dark"] .newsletter-input {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.2);
    color: white;
}

[data-theme="dark"] .recent-news-item,
[data-theme="dark"] .trending-item,
[data-theme="dark"] .video-item {
    background: rgba(255, 255, 255, 0.05);
}

[data-theme="dark"] .recent-news-item:hover,
[data-theme="dark"] .trending-item:hover,
[data-theme="dark"] .video-item:hover {
    background: rgba(255, 255, 255, 0.1);
}

[data-theme="dark"] .social-link {
    background: rgba(255, 255, 255, 0.05);
    color: white;
}

[data-theme="dark"] .social-link:hover {
    background: rgba(255, 255, 255, 0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Video modal functionality
    const videoPlayBtns = document.querySelectorAll('.video-play-btn');
    const videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
    const videoFrame = document.getElementById('videoFrame');
    
    videoPlayBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const videoId = this.getAttribute('data-video-id');
            if (videoId) {
                videoFrame.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                videoModal.show();
            }
        });
    });
    
    // Clear video when modal closes
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
        videoFrame.src = '';
    });
    
    // Search suggestions functionality
    const suggestionTags = document.querySelectorAll('.suggestion-tag');
    const searchInput = document.querySelector('.search-input');
    
    suggestionTags.forEach(tag => {
        tag.addEventListener('click', function() {
            if (searchInput) {
                searchInput.value = this.textContent;
                searchInput.focus();
            }
        });
    });
    
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    const newsletterInput = document.querySelector('.newsletter-input');
    const newsletterBtn = document.querySelector('.newsletter-btn');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple validation
            const email = newsletterInput.value.trim();
            if (!email || !isValidEmail(email)) {
                showNotification('Please enter a valid email address', 'error');
                return;
            }
            
            // Show loading state
            newsletterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            newsletterBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                newsletterBtn.innerHTML = '<i class="fas fa-check"></i>';
                showNotification('Successfully subscribed to newsletter!', 'success');
                newsletterInput.value = '';
                
                // Reset button after 2 seconds
                setTimeout(() => {
                    newsletterBtn.innerHTML = '<i class="fas fa-paper-plane"></i>';
                    newsletterBtn.disabled = false;
                }, 2000);
            }, 1500);
        });
    }
    
    // Social media click tracking
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.classList.contains('facebook') ? 'Facebook' :
                           this.classList.contains('twitter') ? 'Twitter' :
                           this.classList.contains('instagram') ? 'Instagram' :
                           this.classList.contains('youtube') ? 'YouTube' : 'Unknown';
            
            showNotification(`Opening ${platform} in new window`, 'info');
            
            // In a real application, you would open the actual social media link
            // window.open('https://facebook.com/yourpage', '_blank');
        });
    });
    
    // Lazy loading for widget images
    const widgetImages = document.querySelectorAll('.recent-img, .trending-img, .video-img');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });
    
    widgetImages.forEach(img => {
        imageObserver.observe(img);
    });
    
    // Popular news hover effects
    const popularItems = document.querySelectorAll('.popular-news-item');
    popularItems.forEach((item, index) => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Trending topics animation
    const trendingItems = document.querySelectorAll('.trending-item');
    trendingItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
});

// Utility functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add notification styles if not already present
    if (!document.querySelector('#notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'notification-styles';
        styles.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                padding: 1rem;
                display: flex;
                align-items: center;
                justify-content: space-between;
                min-width: 300px;
                z-index: 9999;
                animation: slideInRight 0.3s ease-out;
            }
            
            .notification-success {
                border-left: 4px solid #10b981;
            }
            
            .notification-error {
                border-left: 4px solid #ef4444;
            }
            
            .notification-info {
                border-left: 4px solid #3b82f6;
            }
            
            .notification-content {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .notification-content i {
                font-size: 1.25rem;
            }
            
            .notification-success .notification-content i {
                color: #10b981;
            }
            
            .notification-error .notification-content i {
                color: #ef4444;
            }
            
            .notification-info .notification-content i {
                color: #3b82f6;
            }
            
            .notification-close {
                background: none;
                border: none;
                color: #6b7280;
                cursor: pointer;
                padding: 0.25rem;
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(styles);
    }
    
    // Add to DOM
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

// Widget refresh functionality
function refreshWidget(widgetType) {
    const widget = document.querySelector(`.${widgetType}-widget`);
    if (widget) {
        widget.style.opacity = '0.6';
        widget.style.pointerEvents = 'none';
        
        // Simulate refresh
        setTimeout(() => {
            widget.style.opacity = '1';
            widget.style.pointerEvents = 'auto';
            showNotification(`${widgetType} widget refreshed`, 'success');
        }, 1000);
    }
}

// Real-time updates (simulated)
setInterval(() => {
    const popularCounts = document.querySelectorAll('.popular-views');
    popularCounts.forEach(count => {
        const currentCount = parseInt(count.textContent.replace(/[^\d]/g, ''));
        const newCount = currentCount + Math.floor(Math.random() * 5);
        count.innerHTML = `<i class="fas fa-eye me-1"></i>${newCount.toLocaleString()}`;
    });
}, 30000); // Update every 30 seconds
</script>