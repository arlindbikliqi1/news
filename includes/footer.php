<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="font-weight-bold mb-4">About News Portal</h5>
                <p>News Portal is your trusted source for breaking news, investigative reports, global events and engaging stories.</p>
                <div class="social-links mt-4">
                    <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in fa-lg"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h5 class="font-weight-bold mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
                    <li class="mb-2"><a href="about-us.php" class="text-white">About Us</a></li>
                    <li class="mb-2"><a href="contact-us.php" class="text-white">Contact</a></li>
                    <li class="mb-2"><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="font-weight-bold mb-4">Categories</h5>
                <ul class="list-unstyled">
                    <?php 
                    $query=mysqli_query($con,"select id,CategoryName from tblcategory limit 4");
                    while($row=mysqli_fetch_array($query)) {
                    ?>
                    <li class="mb-2"><a href="category.php?catid=<?php echo htmlentities($row['id'])?>" class="text-white"><?php echo htmlentities($row['CategoryName']);?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="font-weight-bold mb-4">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fas fa-map-marker-alt mr-2"></i> 123 Main Street, City, Country</li>
                    <li class="mb-3"><i class="fas fa-phone mr-2"></i> (123) 456-7890</li>
                    <li class="mb-3"><i class="fas fa-envelope mr-2"></i> info@newsportal.com</li>
                </ul>
            </div>
        </div>
        <hr class="bg-light">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="mb-0">© <?php echo date('Y'); ?> News Portal. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<style>
/* Footer styles */
footer a {
    color: rgba(255,255,255,0.7);
    transition: all 0.3s;
}

footer a:hover {
    color: white;
    text-decoration: none;
}

.social-links a {
    display: inline-block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    margin-right: 10px;
    transition: all 0.3s;
}

.social-links a:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-3px);
}

hr {
    margin: 15px 0;
    border-top: 1px solid rgba(255,255,255,0.1);
}

</style>

