<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     {
   header('location:index.php');
   }
   else{
       ?>
<?php include('includes/topheader.php');?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php include('includes/leftsidebar.php');?>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">NewsPortal</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Dashboard
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card-box h-100 dashboard-welcome-card">
                        <div class="card-header">
                            <h2 class="card-title mb-2">Welcome Arlind Bikliqi </h2>
                            <span class="d-block mb-4 text-nowrap">News Overview</span>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h1 class="display-6 text-primary mb-2 pt-4 pb-1">Live News</h1>
                                    <p class="text-muted">Stay updated with the latest.</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="assets/images/prize-light.png" width="140" height="150" class="img-fluid rounded-start" alt="Welcome Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-box widget-box-one text-center dashboard-widget">
                            <i class="mdi mdi-chart-line widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Total Visits">Total Visits</p>
                                <?php
                                $totalVisitsQuery = mysqli_query($con, "SELECT COUNT(*) as total FROM tblvisits");
                                $totalVisits = mysqli_fetch_assoc($totalVisitsQuery)['total'];
                                ?>
                                <h2><?php echo htmlentities($totalVisits); ?> <small></small></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-box widget-box-one text-center dashboard-widget">
                            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Today's Visits">Today's Visits</p>
                                <?php
                                $today = date('Y-m-d');
                                $todayVisitsQuery = mysqli_query($con, "SELECT COUNT(*) as total FROM tblvisits WHERE DATE(visit_date) = '$today'");
                                $todayVisits = mysqli_fetch_assoc($todayVisitsQuery)['total'];
                                ?>
                                <h2><?php echo htmlentities($todayVisits); ?> <small></small></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="manage-categories.php">
                        <div class="card-box widget-box-one text-center dashboard-widget">
                            <i class="mdi mdi-format-list-bulleted widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Categories Listed">Categories Listed</p>
                                <?php $query=mysqli_query($con,"select * from tblcategory where Is_Active=1");
                                $countcat=mysqli_num_rows($query);
                                ?>
                                <h2><?php echo htmlentities($countcat);?> <small></small></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="manage-posts.php">
                        <div class="card-box widget-box-one text-center dashboard-widget">
                            <i class="mdi mdi-newspaper widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Live News">Live News</p>
                                <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=1");
                                $countposts=mysqli_num_rows($query);
                                ?>
                                <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="manage-subcategories.php">
                        <div class="card-box widget-box-one text-center dashboard-widget">
                            <i class="mdi mdi-layers widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Listed Subcategories">Listed Subcategories</p>
                                <?php $query=mysqli_query($con,"select * from tblsubcategory where Is_Active=1");
                                $countsubcat=mysqli_num_rows($query);
                                ?>
                                <h2><?php echo htmlentities($countsubcat);?> <small></small></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="trash-posts.php">
                        <div class="card-box widget-box-one text-center dashboard-widget">
                            <i class="mdi mdi-delete-empty widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Trash News">Trash News</p>
                                <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=0");
                                $countposts=mysqli_num_rows($query);
                                ?>
                                <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h2 class="mb-4">Recent News Post</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Visits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query=mysqli_query($con,"SELECT p.id as postid, p.PostTitle as title,
                                                            c.CategoryName as category, s.SubCategoryId as subcategory_id, s.Subcategory as subcategory_name,
                                                            (SELECT COUNT(*) FROM tblvisits v WHERE v.post_id = p.id) AS visits
                                                            FROM tblposts p
                                                            LEFT JOIN tblcategory c ON c.id = p.CategoryId
                                                            LEFT JOIN tblsubcategory s ON s.SubCategoryId = p.SubCategoryId
                                                            WHERE p.Is_Active = 1 ORDER BY p.PostingDate DESC LIMIT 10"); // Added LIMIT for recent posts
                                    while($row=mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($row['title']);?></td>
                                        <td><?php echo htmlentities($row['category'])?></td>
                                        <td><?php echo htmlentities($row['subcategory_name'])?></td>
                                        <td><?php echo htmlentities($row['visits'])?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>

</div>

<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="mdi mdi-close-circle-outline"></i>
    </a>
    <h4 class="">Settings</h4>
    <div class="setting-list nicescroll">
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">Notifications</h5>
                <p class="text-muted m-b-0"><small>Do you need them?</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>

        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">API Access</h5>
                <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">Auto Updates</h5>
                <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">Online Status</h5>
                <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
    </div>

</div>
</div>
<?php } ?>

<style>
    /* Custom Styles for Dashboard */
    .dashboard-welcome-card {
        background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
        color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 20px;
        margin-bottom: 20px;
    }
    .dashboard-welcome-card .card-header {
        border-bottom: none;
        padding-bottom: 0;
    }
    .dashboard-welcome-card .card-title {
        color: #fff;
        font-weight: 600;
    }
    .dashboard-welcome-card .text-nowrap {
        color: rgba(255,255,255,0.8);
    }
    .dashboard-welcome-card .display-6 {
        color: #fff !important;
        font-weight: 700;
    }
    .dashboard-welcome-card img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .dashboard-widget {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        margin-bottom: 20px;
        padding: 20px;
    }
    .dashboard-widget:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }
    .dashboard-widget .widget-one-icon {
        font-size: 3rem;
        color: #5fbeaa; /* A pleasant green/teal */
        margin-bottom: 15px;
    }
    .dashboard-widget h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
    }
    .dashboard-widget p {
        font-size: 1rem;
        color: #666;
    }

    /* Table Styling */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden; /* Ensures rounded corners apply to content */
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        color: #495057;
    }
    .table-bordered tbody tr:nth-of-type(even) {
        background-color: #f2f2f2;
    }
    .table-bordered tbody tr:hover {
        background-color: #e9ecef;
    }

    /* Responsive Adjustments */
    @media (max-width: 767px) {
        .dashboard-welcome-card .card-body .row {
            flex-direction: column;
            text-align: center;
        }
        .dashboard-welcome-card .card-body .col-md-6 {
            margin-bottom: 20px;
        }
        .dashboard-welcome-card img {
            margin-top: 20px;
        }
        .dashboard-widget {
            padding: 15px;
        }
        .dashboard-widget .widget-one-icon {
            font-size: 2.5rem;
        }
        .dashboard-widget h2 {
            font-size: 2rem;
        }
    }
</style>
