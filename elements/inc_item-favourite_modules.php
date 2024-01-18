<?php

if ($mod_path != "SYNCING") {
	$url_html = "<a href='$mod_path' title='$mod_id'>$mod_filename</a>";
} else {
	$url_html = "<i><span class='tiny'>AVAILABLE SOON</span></i>";
}

include 'includes/borders.php';

$selected_order = $_GET['order'];
if (!is_numeric($selected_order)) $selected_order = 1;
if ($selected_order > 6) $selected_order = 1;
if ($selected_order == "1" || $selected_order == "") {
	$highlight_1 = "highlight";
} elseif ($selected_order == "2") {
	$highlight_2 = "highlight";
} elseif ($selected_order == "3") {
	$highlight_3 = "highlight";
} elseif ($selected_order == "4") {
	$highlight_4 = "highlight";
} elseif ($selected_order == "5") {
	$highlight_5 = "highlight";
} elseif ($selected_order == "6") {
	$highlight_6 = "highlight";
}
if ($first == "") {
	$whos_list = $xml->items->item[0]->alias;
	$whos_id = $xml->items->item[0]->userid;
	$head = <<<EOT
	<div class="bgmod">
	&nbsp;
	</div>
	<div class="borderbox">
	<table cellspacing="0" cellpadding="0" border="0">
	<tr>
	<td valign="middle" width="80">
	<a href="index.php?request=view_profile&amp;query=$whos_id"><img src="$user_image" border="0"></a>
	</td>
	<td valign="middle">
	<h1 class="title">$whos_list's Favourites</h1>
	<ul class='nolist'>
	<li>
	<img src='style/images/icons/link_go.png' class="middle">&nbsp;<a class='bigbiglink faded middle' href='index.php?request=view_profile&amp;query=$whos_id'>$whos_list's profile</a>
	</li>
	</ul>
	</td>
	<td valign="top" width="200">
        <div class="borderbox gentext center box">
	<h2 class="title center">Sorting</h2>
        Title <a class='$highlight_5' href="index.php?request=view_member_favourites&amp;query=$whos_id&amp;order=5#mods">A-&gt;Z</a>
        <a class='$highlight_6' href="index.php?request=view_member_favourites&amp;query=$whos_id&amp;order=6#mods">Z-&gt;A</a>
	<br>
        Filename <a class='$highlight_3' href="index.php?request=view_member_favourites&amp;query=$whos_id&amp;order=3#mods">A-&gt;Z</a>
        <a class='$highlight_4' href="index.php?request=view_member_favourites&amp;query=$whos_id&amp;order=4#mods">Z-&gt;A</a>
	<br>
        <a class='$highlight_1' href="index.php?request=view_member_favourites&amp;query=$whos_id&amp;order=1#mods">Most Recent</a>
	<br>
        <a class='$highlight_2' href="index.php?request=view_member_favourites&amp;query=$whos_id&amp;order=2#mods">Least Recent</a>
        </div>
	$border_bottom
	</td>
	</tr>
	</table>
	</div>

	<div class="borderbox">

	$navigation_html
	<div class="bgfavourites">
	<table cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td width="50%" valign="top">
	<ul style="list-style-type: none;">	
EOT;
	$first = "1";
} else {
	$head = "";
}

$split_list = round($results/2);
if ($current == "$split_list") {
	$foot2 = "</ul></td><td width='50%' valign='top'> <ul style='list-style-type: none;'>";
} else {
	$foot2 = "";
}
$results = trim($results);
if ($current == ($results - 1)) {
	$foot = "</ul></td></tr></table></div></div>";
} else {
	$foot = "";
	$current++;
}

// HTML Template

$html = <<<EOT

$head
<li><a href="$mod_path" title="Download"><img class="middle" src="style/images/icons/world_go.png" alt="GRAB!" border="0"></a>
&nbsp;<span class="format-icon">$mod_format</span>&nbsp;
 <a class="bigbiglink" href="index.php?request=view_by_moduleid&amp;query=$mod_id" title="$mod_title">$mod_title_short</a>
<ul class='nolist'>
<li class='tiny faded'>&nbsp;&nbsp;&nbsp;$mod_filename</li>
</ul>
</li>
$foot2
$foot

EOT;

print $html;

?>
