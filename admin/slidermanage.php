<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
} else {
    if(isset($_POST['add_to_slider'])) {
        $post_id = $_POST['post_id'];
        $query = mysqli_query($con, "INSERT INTO tblslider(post_id) VALUES('$post_id')");
        if($query) {
            $msg = "Post added to slider successfully";
        } else {
            $error = "Failed to add post to slider";
        }
    }
    
    if(isset($_GET['del'])) {
        $id = $_GET['del'];
        $query = mysqli_query($con, "DELETE FROM tblslider WHERE id='$id'");
        if($query) {
            $msg = "Post removed from slider";
        } else {
            $error = "Failed to remove post";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Slider</title>
    <?php include('includes/topheader.php');?>
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Manage Slider</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li><a href="#">NewsPortal</a></li>
                                <li><a href="#">Admin</a></li>
                                <li class="active">Manage Slider</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <?php if($msg) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> <?php echo htmlentities($msg);?>
                        </div>
                        <?php } ?>
                        
                        <?php if($error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Error!</strong> <?php echo htmlentities($error);?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Add Post to Slider</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>Select Post</label>
                                    <select class="form-control" name="post_id" required>
                                        <option value="">Select a Post</option>
                                        <?php 
                                        $query = mysqli_query($con, "SELECT id, PostTitle FROM tblposts WHERE Is_Active=1");
                                        while($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo htmlentities($row['PostTitle']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" name="add_to_slider" class="btn btn-primary">Add to Slider</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Current Slider Posts</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Title</th>
                                            <th>Added On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = mysqli_query($con, "SELECT s.id, s.created_at, p.PostTitle 
                                                                   FROM tblslider s 
                                                                   JOIN tblposts p ON s.post_id = p.id");
                                        $cnt = 1;
                                        while($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo htmlentities($row['PostTitle']); ?></td>
                                            <td><?php echo htmlentities($row['created_at']); ?></td>
                                            <td>
                                                <a href="slidermanage.php?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Remove</a>
                                            </td>
                                        </tr>
                                        <?php $cnt++; } ?>
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
    <?php include('includes/footer-scripts.php');?>
</body>
</html>
<?php } ?>