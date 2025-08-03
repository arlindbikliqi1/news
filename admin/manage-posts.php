<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   
   if($_GET['action']='del')
   {
   $postid=intval($_GET['pid']);
   $query=mysqli_query($con,"update tblposts set Is_Active=0 where id='$postid'");
   if($query)
   {
   $msg="Post deleted ";
   }
   else{
   $error="Something went wrong . Please try again.";    
   } 
   }
   ?>

        <?php include('includes/topheader.php');?>
        <?php include('includes/leftsidebar.php');?>
       <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Manage Posts </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Posts</a>
                                    </li>
                                    <li class="active">
                                        Manage Post
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">

<div class="table-responsive">
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT tblposts.id AS postid, tblposts.PostTitle AS title,
                                        tblcategory.CategoryName AS category, tblsubcategory.Subcategory AS subcategory,
                                        tblposts.Is_Active AS status
                                        FROM tblposts 
                                        LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId 
                                        LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId 
                                        WHERE tblposts.Is_Active = 1");
            $rowcount = mysqli_num_rows($query);
            if($rowcount == 0) {
            ?>
            <tr>
                <td colspan="5" align="center">
                    <h3 style="color:red">No active posts found</h3>
                </td>
            <tr>
            <?php 
            } else {
                while($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo htmlentities($row['title']);?></td>
                <td><?php echo htmlentities($row['category'])?></td>
                <td><?php echo htmlentities($row['subcategory'])?></td>
                <td>
                    <span class="badge badge-success">Active</span>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    &nbsp;
                    <a class="btn btn-danger btn-sm" href="manage-posts.php?pid=<?php echo htmlentities($row['postid']);?>&action=del" onclick="return confirm('Do you really want to delete this post?')"> 
                        <i class="fa fa-trash-o"></i> Delete
                    </a>
                </td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>
            <?php include('includes/footer.php');?>
            <?php } ?>