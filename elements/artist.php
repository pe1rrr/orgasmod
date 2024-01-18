<?php

if ($mod_artists == "") {
	$mod_artists_title = "By: ";
} else {
	$mod_artists_title = " and ";
}
$mod_artists .= <<<EOT
$mod_artists_title
<a href="$artist_profile">$artist_alias</a>
EOT;

?>
