<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
} else {
    if(!isset($_GET['id'])) {
        header('location:addvideo.php');
        exit;
    }
    
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM tblvideos WHERE id='$id'");
    $video = mysqli_fetch_array($query);
    
    if(!$video) {
        header('location:addvideo.php');
        exit;
    }
    
    $error = '';
    $msg = '';
    
    if(isset($_POST['updatevideo'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        
        if(preg_match('/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/', $url)) {
            $query = mysqli_query($con, "UPDATE tblvideos SET title='$title', url='$url' WHERE id='$id'");
            if($query) {
                $msg = "Video updated successfully";
                header("refresh:2;url=addvideo.php");
            } else {
                $error = "Failed to update video";
            }
        } else {
            $error = "Please enter a valid YouTube URL";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Video</title>
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
                            <h4 class="page-title">Edit Video</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li><a href="#">NewsPortal</a></li>
                                <li><a href="#">Admin</a></li>
                                <li><a href="addvideo.php">Manage Videos</a></li>
                                <li class="active">Edit Video</li>
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
                            <h4 class="m-t-0 header-title">Edit Video</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>Video Title</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo htmlentities($video['title']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>YouTube URL</label>
                                    <input type="text" class="form-control" name="url" value="<?php echo htmlentities($video['url']); ?>" required>
                                    <small class="text-muted">Example: https://www.youtube.com/watch?v=video_id</small>
                                </div>
                                <button type="submit" name="updatevideo" class="btn btn-primary">Update Video</button>
                                <a href="addvideo.php" class="btn btn-secondary">Cancel</a>
                            </form>
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