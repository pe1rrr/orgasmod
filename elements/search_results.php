<?php

if ($mod_path != "SYNCING") {
	$url_html = "<a href='$mod_path' title='$mod_id'>$mod_filename</a>";
} else {
	$url_html = "<i><span class='tiny'>AVAILABLE SOON</span></i>";
}

$split_ul = round($results/2);
if ($i == "$split_ul") {
	$html .= "</ul></td><td width='50%' valign='top'> <ul class='nolist'>";
}
$results = trim($results);

$html .= <<<EOT
<li><a href="$mod_path" title="Download"><img class="middle" src="style/images/icons/world_go.png" alt="GRAB!" border="0"></a>
 <span class="format-icon">$mod_format</span>
 <a class="bigbiglink" href="index.php?request=view_by_moduleid&amp;query=$mod_id" title="$mod_title">$mod_title_short</a>
<ul class='nolist'>
<li class='tiny faded'>&nbsp;&nbsp;&nbsp;$mod_filename</li>
</ul>
</li>

EOT;

?>
