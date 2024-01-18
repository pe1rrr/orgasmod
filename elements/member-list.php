<?php

$split_ul = round($results/2);

if ($i == "$split_ul") {
	$html .= "</ul></td><td width='50%' valign='top'><ul style='list-style-type:none;'>";
}
$html .= <<<EOT

<li>
<a href="index.php?request=view_member_favourites&amp;query=$member_id"><img class='middle' border="0" width="16" height="16" src="$member_imageurl" alt="$member_alias"></a>
<a href="index.php?request=view_member_favourites&amp;query=$member_id" class="bigbiglink">$member_alias</a> ($member_favourites)
</li>

EOT;

?>
