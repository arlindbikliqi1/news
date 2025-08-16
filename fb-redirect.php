<?php
// Check if 'nid' is provided
$nid = isset($_GET['nid']) ? intval($_GET['nid']) : 0;

// Original news URL
$original_url = "https://topcentral.news/news-details.php?nid=" . $nid;

// Adsterra link
$ad_url = "https://www.profitableratecpm.com/x1f39mnu?key=921207a921570605f990dc76ed566614";

// Check if the visitor comes from Facebook
$from_facebook = isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'facebook.com') !== false;

if ($from_facebook && $nid > 0) {
    // Show Adsterra for 1 second then redirect to the original post
    echo "<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
    <meta http-equiv='refresh' content='1;url=$original_url'>
    <style>body{font-family:Arial,sans-serif;text-align:center;margin-top:50px;}</style>
</head>
<body>
    <p>Redirecting... <a href='$ad_url' target='_blank'>Click here if not redirected</a></p>
    <iframe src='$ad_url' style='display:none;width:0;height:0;border:0;'></iframe>
</body>
</html>";
    exit();
}

// Direct visit, go to the news page normally
header("Location: $original_url");
exit();
