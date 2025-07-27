<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="News Portal - Your daily news source">
    <meta name="author" content="News Portal">
    <title>News Portal</title>
    
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<!-- Header/Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-newspaper mr-2"></i>
            <strong>News Portal</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact</a>
                </li>
            </ul>
            <form class="form-inline ml-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>

<style>
/* Custom header styles */
.navbar {
    padding: 15px 0;
    transition: all 0.3s;
}

.bg-primary {
    background-color: #2c3e50!important;
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
}

.nav-link {
    font-weight: 500;
    padding: 8px 15px!important;
}

@media (max-width: 991.98px) {
    .navbar-collapse {
        padding: 15px 0;
    }
    .form-inline {
        margin-top: 10px;
    }
}

.nav-item.active .nav-link {
    color: #fff!important;
    font-weight: 600;
}

.nav-link:hover {
    color: rgba(255,255,255,0.85)!important;
}

</style>

