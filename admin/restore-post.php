<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
    exit;
}

if(isset($_GET['pid'])) {
    $postid = intval($_GET['pid']);
    
    // Restore the post
    $query = mysqli_query($con, "UPDATE tblposts SET Is_Active = 1 WHERE id = '$postid'");
    
    if($query) {
        $_SESSION['msg'] = "Post restored successfully";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }
}

header('location:dashboard.php');
exit;
?>