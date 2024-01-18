<?php

#### CSS Row Colour Class Arrangements
$z          = isset($z) ? $z : "";
$colour_switch = ($z++ & 1) ? "songlistrow1" : "songlistrow2";

if ($mod_path != "SYNCING") {
	$url_html = "<a href='$mod_path' title='$mod_id'>$mod_filename</a>";
} else {
	$url_html = "<i><span class='tiny'>AVAILABLE SOON</span></i>";
}


// HTML Template

$split_ul = ($limit/2);
if ($i == "$split_ul") {
	$html .= "</ul></td><td width='50%'><ul style='list-style-type:none;'>";
}



$html .= <<<EOT
<li>
<a href="$mod_path" title="Download"><img src="style/images/icons/world_go.png" border="0" class="middle" alt="dl"></a>
&nbsp;<span class="format-icon">$mod_format</span>&nbsp;
<a class="bigbiglink" href="index.php?request=view_by_moduleid&amp;query=$mod_id" title="$mod_title">$mod_title_short</a>
<a href="index.php?request=view_member_favourites&amp;query=$user_id"><img class="middle" alt='$user_alias' title='$user_alias' src="http://modarchive.org/data/image-member.php?id=$user_id" width="16" height="16" border="0"></a>
</li>
EOT;


?>
