            <?php
            session_start();
            //Database Configuration File
            include('includes/config.php');
            //error_reporting(0);
            if(isset($_POST['login']))
            {
            
                // Getting username/ email and password
                $uname=$_POST['username'];
                $password=md5($_POST['password']);
                // Fetch data from database on the basis of username/email and password
            $sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword,userType FROM tbladmin WHERE (AdminUserName='$uname' && AdminPassword='$password')");
            $num=mysqli_fetch_array($sql);
            if($num>0)
            {

            $_SESSION['login']=$_POST['username'];
            $_SESSION['utype']=$num['userType'];
                echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            }else{
            echo "<div class='alert'>Invalid Details</div>";
            }
            
            }
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live News Portal | Admin Login</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: var(--primary-gradient);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 1000px;
            display: flex;
            min-height: 600px;
            box-shadow: var(--shadow-xl);
            border-radius: var(--border-radius);
            overflow: hidden;
            background: var(--bg-light);
        }

        /* Left Panel */
        .login-panel {
            flex: 1;
            background: var(--primary-gradient);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-panel::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -100px;
            right: -100px;
        }

        .login-panel::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            bottom: -80px;
            left: -80px;
        }

        .panel-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .panel-logo {
            margin-bottom: 2rem;
        }

        .panel-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .panel-description {
            font-size: 1.125rem;
            opacity: 0.9;
            margin-bottom: 2.5rem;
        }

        .features-list {
            list-style: none;
            margin-bottom: 3rem;
        }

        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.05rem;
            justify-content: center;
        }

        .features-list i {
            margin-right: 15px;
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Login Form */
        .login-form-container {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-title {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
            color: var(--text-dark);
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius-sm);
            padding: 0.875rem 1.25rem;
            width: 100%;
            transition: var(--transition);
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-light);
        }

        .forgot-link {
            display: block;
            text-align: right;
            margin-top: 0.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: var(--secondary-color);
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
            width: 100%;
            margin-top: 1rem;
            font-family: 'Inter', sans-serif;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .back-home i {
            margin-right: 5px;
        }

        .back-home:hover {
            color: var(--primary-color);
        }

        /* Alert Message */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: var(--border-radius-sm);
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            font-size: 0.9rem;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                min-height: auto;
            }
            
            .login-panel {
                padding: 2.5rem 2rem;
            }
            
            .login-form-container {
                padding: 2.5rem 2rem;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                border-radius: 0;
            }
            
            .panel-title {
                font-size: 2rem;
            }
            
            .form-title {
                font-size: 1.75rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-panel animate-fade">
            <div class="panel-content">
                <div class="panel-logo">
                    <i class="fas fa-newspaper fa-3x"></i>
                </div>
                <h2 class="panel-title">News Portal Admin</h2>
                <p class="panel-description">Manage your news content and website settings</p>
                
                <ul class="features-list">
                    <li><i class="fas fa-newspaper"></i> Manage breaking news and headlines</li>
                    <li><i class="fas fa-users"></i> Control user access and permissions</li>
                    <li><i class="fas fa-chart-line"></i> Track analytics and engagement</li>
                </ul>
            </div>
        </div>
        
        <div class="login-form-container animate-fade" style="animation-delay: 0.2s;">
            <div class="form-header">
                <h2 class="form-title">Admin Login</h2>
                <p class="form-subtitle">Please sign-in to your account</p>
            </div>
            
            
            <form class="login-form" method="post">
                <div class="form-group">
                    <label class="form-label">Username or Email</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username or email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        <span class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <a href="forgot-password.php" class="forgot-link">Forgot your password?</a>
                </div>
                
                <button type="submit" class="submit-btn" name="login">Log In</button>
                
                <a href="../index.php" class="back-home">
                    <i class="fas fa-home"></i> Back to Homepage
                </a>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            const passwordToggle = document.querySelector('.password-toggle');
            if (passwordToggle) {
                passwordToggle.addEventListener('click', function() {
                    const passwordInput = this.previousElementSibling;
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Toggle eye icon
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>
</body>
</html>