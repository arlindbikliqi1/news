<!-- Newsletter CTA -->
<section class="newsletter-cta">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="newsletter-cta-content">
                    <h3 class="newsletter-cta-title">Stay Informed, Stay Ahead</h3>
                    <p class="newsletter-cta-text">Get breaking news, exclusive stories, and expert analysis delivered directly to your inbox. Join thousands of readers who trust us for reliable news.</p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="newsletter-cta-form">
                    <form class="cta-form" action="#" method="post">
                        <div class="cta-input-group">
                            <input type="email" class="cta-input" placeholder="Enter your email address" required>
                            <button type="submit" class="cta-btn">
                                Subscribe Now
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                        <div class="cta-features">
                            <div class="cta-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Daily Newsletter</span>
                            </div>
                            <div class="cta-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Breaking News Alerts</span>
                            </div>
                            <div class="cta-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Exclusive Content</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Footer -->
<footer class="main-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <!-- Brand Section -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="footer-brand">
                        <a href="index.php" class="footer-logo">
                            <i class="fas fa-newspaper"></i>
                            <span class="logo-text">NewsPortal</span>
                        </a>
                        <p class="footer-description">
                            Your trusted source for breaking news, in-depth analysis, and compelling stories from around the world. We deliver truth, transparency, and timely reporting.
                        </p>
                        <div class="footer-stats">
                            <div class="stat-item">
                                <div class="stat-number">2.5M+</div>
                                <div class="stat-label">Monthly Readers</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">50K+</div>
                                <div class="stat-label">Daily Visitors</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Countries</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="footer-section">
                        <h5 class="footer-section-title">Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="index.php"><i class="fas fa-home me-2"></i>Home</a></li>
                            <li><a href="about-us.php"><i class="fas fa-info-circle me-2"></i>About Us</a></li>
                            <li><a href="contact-us.php"><i class="fas fa-envelope me-2"></i>Contact</a></li>
                            <li><a href="archive.php"><i class="fas fa-archive me-2"></i>Archive</a></li>
                            <li><a href="team.php"><i class="fas fa-users me-2"></i>Our Team</a></li>
                            <li><a href="careers.php"><i class="fas fa-briefcase me-2"></i>Careers</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="footer-section">
                        <h5 class="footer-section-title">Categories</h5>
                        <ul class="footer-links">
                            <?php 
                            $footerQuery = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory LIMIT 6");
                            while($footerRow = mysqli_fetch_array($footerQuery)) {
                            ?>
                            <li>
                                <a href="category.php?catid=<?php echo htmlentities($footerRow['id'])?>">
                                    <i class="fas fa-chevron-right me-2"></i>
                                    <?php echo htmlentities($footerRow['CategoryName']);?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Resources -->
                <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="footer-section">
                        <h5 class="footer-section-title">Resources</h5>
                        <ul class="footer-links">
                            <li><a href="privacy-policy.php"><i class="fas fa-shield-alt me-2"></i>Privacy Policy</a></li>
                            <li><a href="terms-of-service.php"><i class="fas fa-file-contract me-2"></i>Terms of Service</a></li>
                            <li><a href="advertise.php"><i class="fas fa-bullhorn me-2"></i>Advertise</a></li>
                            <li><a href="admin/index.php"><i class="fas fa-bullhorn me-2"></i>Panel</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="footer-section">
                        <h5 class="footer-section-title">Contact Info</h5>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="contact-details">
                                    <strong>Address</strong>
                                    <span>123 News Street<br>Media City, MC 12345</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div class="contact-details">
                                    <strong>Phone</strong>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div class="contact-details">
                                    <strong>Email</strong>
                                    <span>info@newsportal.com</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div class="contact-details">
                                    <strong>Hours</strong>
                                    <span>24/7 News Coverage</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social & Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="footer-bottom-content">
                        <p class="copyright">
                            © <?php echo date('Y'); ?> NewsPortal. All rights reserved. 
                            <span class="separator">|</span>
                            Made with <i class="fas fa-heart text-danger"></i> for better journalism.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </div>
</footer>

        
    </div>
</div>

<style>
/* Newsletter CTA Section */
.newsletter-cta {
    background: var(--primary-gradient);
    padding: 4rem 0;
    color: white;
    position: relative;
    overflow: hidden;
}

.newsletter-cta:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.05)"><polygon points="0,0 1000,100 1000,0"/></svg>');
    background-size: cover;
}

.newsletter-cta-content {
    position: relative;
    z-index: 2;
}

.newsletter-cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.newsletter-cta-text {
    font-size: 1.125rem;
    opacity: 0.9;
    line-height: 1.6;
    margin-bottom: 0;
}

.newsletter-cta-form {
    position: relative;
    z-index: 2;
}

.cta-input-group {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 60px;
    padding: 0.5rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.cta-input {
    flex: 1;
    background: transparent;
    border: none;
    padding: 1rem 1.5rem;
    color: white;
    font-size: 1rem;
    outline: none;
}

.cta-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.cta-btn {
    background: white;
    color: var(--primary-color);
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    transition: var(--transition);
    white-space: nowrap;
}

.cta-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    color: var(--primary-color);
}

.cta-features {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
}

.cta-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
}

.cta-feature i {
    color: #10b981;
    font-size: 1rem;
}

/* Main Footer */
.main-footer {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    color: rgba(255, 255, 255, 0.8);
    position: relative;
}

.main-footer:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.2) 50%, transparent 100%);
}

.footer-content {
    padding: 4rem 0 2rem;
}

/* Footer Brand */
.footer-brand {
    margin-bottom: 2rem;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 1rem;
    text-decoration: none;
    margin-bottom: 1.5rem;
}

.footer-logo i {
    font-size: 3rem;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.logo-text {
    font-family: 'Inter', sans-serif;
    font-size: 2rem;
    font-weight: 900;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.footer-description {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.footer-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 800;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.8rem;
    opacity: 0.7;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Footer Sections */
.footer-section {
    height: 100%;
}

.footer-section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.75rem;
}

.footer-section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--accent-gradient);
    border-radius: 2px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: var(--transition);
    display: flex;
    align-items: center;
    font-size: 0.9rem;
}

.footer-links a:hover {
    color: white;
    transform: translateX(5px);
}

.footer-links a i {
    font-size: 0.8rem;
    opacity: 0.6;
}

/* Contact Info */
.contact-info {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.contact-item i {
    font-size: 1.25rem;
    color: var(--accent-color);
    margin-top: 0.25rem;
    flex-shrink: 0;
}

.contact-details strong {
    display: block;
    color: white;
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.contact-details span {
    font-size: 0.9rem;
    opacity: 0.8;
    line-height: 1.4;
}

/* Footer Bottom */
.footer-bottom {
    background: rgba(0, 0, 0, 0.2);
    padding: 2rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-bottom-content {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.copyright {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.8;
}

.separator {
    margin: 0 0.5rem;
    opacity: 0.5;
}

.footer-social {
    display: flex;
    align-items: center;
    gap: 1rem;
    justify-content: flex-end;
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

.social-link.linkedin:before {
    background: #0077b5;
}

.social-link:hover:before {
    opacity: 1;
}

.social-link i {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.8);
    transition: var(--transition);
    position: relative;
    z-index: 2;
}

.social-link:hover i {
    color: white;
    transform: scale(1.1);
}

.social-count {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.6);
    font-weight: 600;
    position: relative;
    z-index: 2;
}

.social-link:hover .social-count {
    color: white;
}

/* Back to Top Button */
.back-to-top {
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
    box-shadow: var(--shadow-lg);
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
}

.back-to-top i {
    font-size: 1.25rem;
}

/* Breaking News Notification */
.breaking-news-notification {
    position: fixed;
    bottom: -100px;
    left: 2rem;
    right: 2rem;
    max-width: 600px;
    margin: 0 auto;
    background: var(--accent-gradient);
    color: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-xl);
    z-index: 1000;
    transition: var(--transition);
    overflow: hidden;
}

.breaking-news-notification.show {
    bottom: 2rem;
}

.breaking-news-notification:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #ffd700, #ff6b6b, #4ecdc4, #45b7d1);
    animation: breakingGlow 2s linear infinite;
}

@keyframes breakingGlow {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.breaking-news-content {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.5rem;
}

.breaking-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 1px;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breaking-badge i {
    animation: pulse 1s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.breaking-text {
    flex: 1;
    font-size: 0.95rem;
    line-height: 1.4;
}

.breaking-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breaking-read-more {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    white-space: nowrap;
}

.breaking-read-more:hover {
    background: rgba(255, 255, 255, 0.3);
}

.breaking-close {
    background: none;
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
}

.breaking-close:hover {
    background: rgba(255, 255, 255, 0.2);
}

/* Responsive Design */
@media (max-width: 992px) {
    .newsletter-cta {
        padding: 3rem 0;
    }
    
    .newsletter-cta-title {
        font-size: 2rem;
    }
    
    .cta-input-group {
        flex-direction: column;
        gap: 0.5rem;
        padding: 1rem;
    }
    
    .cta-input {
        text-align: center;
    }
    
    .cta-btn {
        width: 100%;
    }
    
    .cta-features {
        justify-content: center;
        gap: 1rem;
    }
    
    .footer-stats {
        justify-content: center;
    }
    
    .footer-social {
        justify-content: flex-start;
        margin-top: 1rem;
    }
}

@media (max-width: 768px) {
    .newsletter-cta-title {
        font-size: 1.75rem;
    }
    
    .newsletter-cta-text {
        font-size: 1rem;
    }
    
    .footer-content {
        padding: 3rem 0 2rem;
    }
    
    .footer-stats {
        gap: 1rem;
    }
    
    .stat-number {
        font-size: 1.25rem;
    }
    
    .contact-info {
        gap: 1rem;
    }
    
    .footer-bottom {
        text-align: center;
    }
    
    .footer-bottom-content {
        justify-content: center;
        margin-bottom: 1rem;
    }
    
    .footer-social {
        justify-content: center;
    }
    
    .breaking-news-notification {
        left: 1rem;
        right: 1rem;
    }
    
    .breaking-news-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }
    
    .breaking-actions {
        width: 100%;
        justify-content: space-between;
    }
}

@media (max-width: 576px) {
    .newsletter-cta {
        padding: 2rem 0;
    }
    
    .newsletter-cta-title {
        font-size: 1.5rem;
    }
    
    .cta-features {
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }
    
    .footer-brand {
        text-align: center;
    }
    
    .footer-stats {
        justify-content: center;
        gap: 1.5rem;
    }
    
    .social-links {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .back-to-top {
        width: 45px;
        height: 45px;
        bottom: 1rem;
        right: 1rem;
    }
}

/* Dark theme adjustments */
[data-theme="dark"] .main-footer {
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
}

[data-theme="dark"] .newsletter-cta {
    background: var(--dark-gradient);
}

[data-theme="dark"] .cta-input-group {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.1);
}

[data-theme="dark"] .cta-btn {
    background: white;
    color: var(--text-dark);
}

[data-theme="dark"] .footer-bottom {
    background: rgba(255, 255, 255, 0.02);
}

/* Print styles */
@media print {
    .newsletter-cta,
    .main-footer,
    .back-to-top,
    .breaking-news-notification {
        display: none !important;
    }
}

/* High contrast mode */
@media (prefers-contrast: high) {
    .footer-links a {
        color: white;
    }
    
    .social-link {
        border: 2px solid white;
    }
    
    .breaking-news-notification {
        border: 2px solid white;
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .breaking-badge i,
    .breaking-news-notification:before {
        animation: none;
    }
    
    .social-link:hover i {
        transform: none;
    }
    
    .back-to-top:hover {
        transform: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Back to top functionality
    const backToTop = document.getElementById('backToTop');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Newsletter CTA form
    const ctaForm = document.querySelector('.cta-form');
    const ctaInput = document.querySelector('.cta-input');
    const ctaBtn = document.querySelector('.cta-btn');
    
    if (ctaForm) {
        ctaForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = ctaInput.value.trim();
            if (!email || !isValidEmail(email)) {
                showNotification('Please enter a valid email address', 'error');
                return;
            }
            
            // Show loading state
            const originalText = ctaBtn.innerHTML;
            ctaBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...';
            ctaBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                ctaBtn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                showNotification('Welcome to our newsletter! Check your email for confirmation.', 'success');
                ctaInput.value = '';
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    ctaBtn.innerHTML = originalText;
                    ctaBtn.disabled = false;
                }, 3000);
            }, 2000);
        });
    }
    
    // Breaking news notification
    const breakingNotification = document.getElementById('breakingNewsNotification');
    const breakingClose = document.getElementById('breakingClose');
    const breakingReadMore = document.getElementById('breakingReadMore');
    
    // Show breaking news after page load
    setTimeout(() => {
        if (breakingNotification && !sessionStorage.getItem('breakingNewsClosed')) {
            breakingNotification.classList.add('show');
        }
    }, 3000);
    
    // Close breaking news
    if (breakingClose) {
        breakingClose.addEventListener('click', function() {
            breakingNotification.classList.remove('show');
            sessionStorage.setItem('breakingNewsClosed', 'true');
        });
    }
    
    // Read more functionality
    if (breakingReadMore) {
        breakingReadMore.addEventListener('click', function() {
            // In a real application, this would navigate to the breaking news article
            showNotification('Redirecting to breaking news article...', 'info');
            breakingNotification.classList.remove('show');
        });
    }
    
    // Social media analytics
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const platform = this.classList.contains('facebook') ? 'Facebook' :
                           this.classList.contains('twitter') ? 'Twitter' :
                           this.classList.contains('instagram') ? 'Instagram' :
                           this.classList.contains('youtube') ? 'YouTube' :
                           this.classList.contains('linkedin') ? 'LinkedIn' : 'Social';
            
            // Track social media clicks (analytics)
            if (typeof gtag !== 'undefined') {
                gtag('event', 'social_click', {
                    'platform': platform,
                    'location': 'footer'
                });
            }
            
            showNotification(`Opening ${platform} in new window`, 'info');
            // window.open('https://socialmedia.com/newsportal', '_blank');
        });
    });
    
    // Footer link tracking
    const footerLinks = document.querySelectorAll('.footer-links a');
    footerLinks.forEach(link => {
        link.addEventListener('click', function() {
            const linkText = this.textContent.trim();
            
            // Track footer link clicks
            if (typeof gtag !== 'undefined') {
                gtag('event', 'footer_link_click', {
                    'link_text': linkText,
                    'link_url': this.href
                });
            }
        });
    });
    
    // Contact info click to copy
    const contactItems = document.querySelectorAll('.contact-item');
    contactItems.forEach(item => {
        item.addEventListener('click', function() {
            const contactText = this.querySelector('.contact-details span').textContent.trim();
            
            if (navigator.clipboard) {
                navigator.clipboard.writeText(contactText).then(() => {
                    showNotification('Contact info copied to clipboard!', 'success');
                });
            }
        });
    });
    
    // Auto-update footer statistics
    updateFooterStats();
    setInterval(updateFooterStats, 300000); // Update every 5 minutes
    
    // Newsletter popup (if user hasn't subscribed)
    setTimeout(() => {
        if (!localStorage.getItem('newsletterSubscribed') && 
            !sessionStorage.getItem('newsletterPopupShown')) {
            showNewsletterPopup();
            sessionStorage.setItem('newsletterPopupShown', 'true');
        }
    }, 30000); // Show after 30 seconds
});

// Utility functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `footer-notification footer-notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add notification styles
    if (!document.querySelector('#footer-notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'footer-notification-styles';
        styles.textContent = `
            .footer-notification {
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
            
            .footer-notification-success { border-left: 4px solid #10b981; }
            .footer-notification-error { border-left: 4px solid #ef4444; }
            .footer-notification-info { border-left: 4px solid #3b82f6; }
            
            .notification-content {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .notification-content i {
                font-size: 1.25rem;
            }
            
            .footer-notification-success .notification-content i { color: #10b981; }
            .footer-notification-error .notification-content i { color: #ef4444; }
            .footer-notification-info .notification-content i { color: #3b82f6; }
            
            .notification-close {
                background: none;
                border: none;
                color: #6b7280;
                cursor: pointer;
                padding: 0.25rem;
            }
            
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
        `;
        document.head.appendChild(styles);
    }
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

function updateFooterStats() {
    const stats = {
        readers: Math.floor(2500000 + Math.random() * 10000),
        visitors: Math.floor(50000 + Math.random() * 1000),
        countries: 15 + Math.floor(Math.random() * 5)
    };
    
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length >= 3) {
        statNumbers[0].textContent = (stats.readers / 1000000).toFixed(1) + 'M+';
        statNumbers[1].textContent = (stats.visitors / 1000).toFixed(0) + 'K+';
        statNumbers[2].textContent = stats.countries + '+';
    }
}

function showNewsletterPopup() {
    // Create newsletter popup modal
    const popup = document.createElement('div');
    popup.className = 'newsletter-popup-modal';
    popup.innerHTML = `
        <div class="newsletter-popup-backdrop"></div>
        <div class="newsletter-popup-content">
            <div class="newsletter-popup-header">
                <h4>Don't Miss Out!</h4>
                <button class="newsletter-popup-close">&times;</button>
            </div>
            <div class="newsletter-popup-body">
                <p>Get the latest news and exclusive content delivered to your inbox.</p>
                <form class="newsletter-popup-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe Now</button>
                </form>
                <small>You can unsubscribe at any time.</small>
            </div>
        </div>
    `;
    
    // Add popup styles
    const popupStyles = `
        .newsletter-popup-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .newsletter-popup-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }
        
        .newsletter-popup-content {
            background: white;
            border-radius: 12px;
            max-width: 400px;
            width: 90%;
            position: relative;
            z-index: 2;
            animation: popupSlideIn 0.3s ease-out;
        }
        
        .newsletter-popup-header {
            padding: 1.5rem 1.5rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .newsletter-popup-header h4 {
            margin: 0;
            color: var(--primary-color);
        }
        
        .newsletter-popup-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #999;
        }
        
        .newsletter-popup-body {
            padding: 1.5rem;
            text-align: center;
        }
        
        .newsletter-popup-form {
            margin: 1rem 0;
        }
        
        .newsletter-popup-form input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #ddd;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        
        .newsletter-popup-form button {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }
        
        @keyframes popupSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
    `;
    
    if (!document.querySelector('#newsletter-popup-styles')) {
        const styleSheet = document.createElement('style');
        styleSheet.id = 'newsletter-popup-styles';
        styleSheet.textContent = popupStyles;
        document.head.appendChild(styleSheet);
    }
    
    document.body.appendChild(popup);
    
    // Close popup functionality
    const closeBtn = popup.querySelector('.newsletter-popup-close');
    const backdrop = popup.querySelector('.newsletter-popup-backdrop');
    
    function closePopup() {
        popup.remove();
    }
    
    closeBtn.addEventListener('click', closePopup);
    backdrop.addEventListener('click', closePopup);
    
    // Form submission
    const form = popup.querySelector('.newsletter-popup-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('input').value;
        
        if (isValidEmail(email)) {
            localStorage.setItem('newsletterSubscribed', 'true');
            showNotification('Thank you for subscribing!', 'success');
            closePopup();
        } else {
            showNotification('Please enter a valid email address', 'error');
        }
    });
}

// Service Worker registration
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js')
            .then(function(registration) {
                console.log('ServiceWorker registration successful');
            })
            .catch(function(err) {
                console.log('ServiceWorker registration failed');
            });
    });
}
</script>

<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<style>
label {
    font-weight: 600;
    color: white;
    font-size: 0.9rem;
}

.social-links {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.social-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
    text-decoration: none;
    padding: 0.75rem;
    border-radius: var(--border-radius-sm);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.social-link:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    transition: var(--transition);
}

</style>