<?php

if ($first == "") {
	$mod_artist_description .= "<h2 class='title'><img src='style/images/icons/comments.png' alt='comments' class='middle'>&nbsp;Artist's Comments</h2>";
	$first = "1";
	$count_up = 0;
} else {
}


$mod_artist_description .= <<<EOT

<p><a href="member.php?$artist_id"><img src="$artist_imageurl" alt="artist" align="left" class="middle" border="0" height="40" width="40" style="padding: 4px;"></a>&nbsp;$artist_description - <a class="bigbiglink faded" href="member.php?$artist_id">$artist_alias</a>
</p>
<br>
EOT;

$count_up++;

if ($count_up == ($artists)) {
	include 'includes/borders.php';
	$mod_artist_description .= "";
}

?>
