<?php
include 'includes/connect.php';
 $uri           =       $_SERVER['REQUEST_URI'];
 $position      =       strpos($uri,"member.php");
 $new_uri       =       substr($uri,$position);
 $stuff         =       explode("?",$new_uri);
 $id = $stuff[1];

$baseurl = $global_vars['path_http_base'];

 if (preg_match("/^[0-9]+$/", $id)) {
        header("Location: http://modarchive.org/index.php?request=view_profile&query=$id");
 } else {
        die();
 }

?>
