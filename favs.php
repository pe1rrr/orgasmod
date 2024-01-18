<?php
 $uri           =       $_SERVER['REQUEST_URI'];
 $position      =       strpos($uri,"favs.php");
 $new_uri       =       substr($uri,$position);
 $stuff         =       explode("?",$new_uri);
 $id = $stuff[1];


 if (preg_match("/^[0-9]+$/", $id)) {
	header("Location: index.php?request=view_member_favourites&query=$id");
 }

?>
