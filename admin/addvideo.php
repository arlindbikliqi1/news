<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
} else {
    $error = '';
    $msg = '';
    
    // Add new video
    if(isset($_POST['addvideo'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        
        // Validate YouTube URL
        if(preg_match('/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/', $url)) {
            $query = mysqli_query($con, "INSERT INTO tblvideos(title, url) VALUES('$title', '$url')");
            if($query) {
                $msg = "Video added successfully";
            } else {
                $error = "Failed to add video";
            }
        } else {
            $error = "Please enter a valid YouTube URL";
        }
    }
    
    // Update video
    if(isset($_POST['updatevideo'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $url = $_POST['url'];
        
        if(preg_match('/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/', $url)) {
            $query = mysqli_query($con, "UPDATE tblvideos SET title='$title', url='$url' WHERE id='$id'");
            if($query) {
                $msg = "Video updated successfully";
            } else {
                $error = "Failed to update video";
            }
        } else {
            $error = "Please enter a valid YouTube URL";
        }
    }
    
    // Delete video
    if(isset($_GET['del'])) {
        $id = $_GET['del'];
        $query = mysqli_query($con, "DELETE FROM tblvideos WHERE id='$id'");
        if($query) {
            $msg = "Video deleted successfully";
        } else {
            $error = "Failed to delete video";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Videos</title>
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
                            <h4 class="page-title">Manage Videos</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li><a href="#">NewsPortal</a></li>
                                <li><a href="#">Admin</a></li>
                                <li class="active">Manage Videos</li>
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
                            <h4 class="m-t-0 header-title">Add New Video</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>Video Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter video title" required>
                                </div>
                                <div class="form-group">
                                    <label>YouTube URL</label>
                                    <input type="text" class="form-control" name="url" placeholder="Enter YouTube URL" required>
                                    <small class="text-muted">Example: https://www.youtube.com/watch?v=video_id</small>
                                </div>
                                <button type="submit" name="addvideo" class="btn btn-primary">Add Video</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Current Videos</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = mysqli_query($con, "SELECT * FROM tblvideos ORDER BY id DESC");
                                        $cnt = 1;
                                        while($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo htmlentities($row['title']); ?></td>
                                            <td><?php echo htmlentities($row['url']); ?></td>
                                            <td><?php echo htmlentities($row['created_at']); ?></td>
                                            <td>
                                                <?php if($row['is_active'] == 1) { ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Inactive</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="editvideo.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <a href="addvideo.php?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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