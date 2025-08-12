<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Live News Portal Admin Dashboard">
    <meta name="author" content="Arlind Bikliqi">

    <title>Live News Portal Arlind</title>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.webp">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'username=' + $("#sadminusername").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
    <style>
        /* Custom styles for top header */
        .topbar {
            background-color: #34495e; /* Darker, modern header background */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .topbar .topbar-left {
            background-color: #2c3e50; /* Even darker for logo area */
        }
        .topbar .logo span img {
            height: 50px; /* Slightly smaller logo for better fit */
            width: auto;
        }
        .topbar .navbar-default {
            background-color: transparent;
            border: none;
        }
        .topbar .navbar-nav > li > a {
            color: #ecf0f1; /* Light text color */
        }
        .topbar .navbar-nav > li > a:hover,
        .topbar .navbar-nav > li > a:focus {
            color: #fff;
            background-color: rgba(255,255,255,0.1);
        }
        .topbar .button-menu-mobile {
            color: #ecf0f1;
        }
        .topbar .user-box .user-link {
            padding: 10px 15px;
        }
        .topbar .user-box .user-img {
            border: 2px solid rgba(255,255,255,0.5);
        }
        .topbar .dropdown-menu {
            background-color: #fff;
            border: 1px solid rgba(0,0,0,0.1);
            box-shadow: 0 6px 12px rgba(0,0,0,0.175);
        }
        .topbar .dropdown-menu li h5 {
            color: #333;
            padding: 10px 20px;
            margin: 0;
            font-weight: 600;
        }
        .topbar .dropdown-menu li a {
            color: #555;
            padding: 8px 20px;
        }
        .topbar .dropdown-menu li a:hover {
            background-color: #f5f5f5;
            color: #333;
        }

        /* Google Translate specific styles for responsiveness */
        #google_translate_element {
            position: static; /* Remove absolute positioning */
            padding-top: 0;
            right: auto;
            float: right; /* Float it to the right */
            margin-top: 15px; /* Adjust vertical alignment */
            margin-right: 15px;
        }
        .goog-te-gadget {
            font-size: 0; /* Hide default text */
        }
        .goog-te-gadget .goog-te-combo {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px 10px;
            background-color: #f8f8f8;
            color: #333;
            font-size: 14px; /* Make font size visible */
            height: auto; /* Allow height to adjust */
        }
        .goog-logo-link {
            display: none !important;
        }
        .goog-te-gadget {
            color: transparent;
        }

        @media (max-width: 767px) {
            .topbar .topbar-left {
                width: 100%;
                text-align: center;
            }
            .topbar .logo {
                display: inline-block;
                float: none;
            }
            .topbar .navbar-left {
                float: left;
                width: auto;
            }
            .topbar .navbar-right {
                float: right;
                width: auto;
            }
            #google_translate_element {
                float: none;
                display: block;
                text-align: center;
                margin: 10px auto;
            }
            .topbar .button-menu-mobile {
                margin-left: 15px;
            }
        }
    </style>
</head>

<body class="fixed-left">
    <div id="wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <a href="index.php" class="logo">
                    <span>
                        <img src="assets/images/logo.webp" alt="NewsPortal Logo">
                    </span>
                </a>
            </div>

            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Navbar-left -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Google Translate Element -->
                       

                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li>
                                    <h5>Hi,Arlind Bikliqi</h5>
                                </li>
                                <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Change Password</a></li>
                                <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
