<?php

// HTML Template
$referrer = $_SERVER['HTTP_REFERER'];

$fans = orgasmod_render_fans_of_module($mod_id);

include 'includes/borders.php';

if ($mod_path != "SYNCING") {
	$url_html = "<a class='bigbiglink' href='$mod_path'>Download</a>";
} else {
	$url_html = "Download Unavailable (Syncing)";
}

if ($mod_artists != "") {
	$artist_html = "<p style='margin-left: 50px;'>$mod_artists</p>";
}

if ($member_comment_html != "") {
	$comment_html = "<div class='bgcomment'>$member_comment_html</div>$border_bottom";
}

if ($mod_comment == "" && $mod_instruments == "") $mod_comment = "No internal comments or instrument texts have been found for this module.";

if ($_SESSION['player'] == "1") {
        if (preg_match("/MOD|XM|S3M/",$mod_format)) {
                include 'elements/inc_item-player.php';
        } else {
                $player_html = "<p class='center tiny'><i>Sadly, the JMOD player does not support $mod_format files, so you'll have to download and play this in a standalone module player.</i></p>";
        }
}


$html = <<<EOT
<div class="bgmod">
&nbsp;
</div>

<div class="bg-$mod_format borderbox">
<h1>$mod_title <span style="font-size: 14px;"><br>($mod_filename)</span>
</h1>
$artist_html
<p style="margin-left: 50px;">
 <a href="$mod_path" title="Download"><img src="style/images/icons/world_go.png" border="0" class="middle" alt="dl"></a>&nbsp;<span class="format-icon">$mod_format</span>&nbsp;<a href="$mod_path" title="Download">Download</a>
</p>
</div>

<div class="borderbox">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="45%" valign="top">
$mod_artist_description
<div class="boxl" style="padding: 10px;">
<h2 class="title"><img src="style/images/icons/information.png" border="0" alt="Info" class="middle">&nbsp;Internal Texts</h2>
<p class="tiny-mono overflow bgmodtext">
$mod_instruments
<br>
$mod_comment
</p>
</div>
$border_bottom
</td>
<td width="10%">
&nbsp;
</td>
<td valign="top" width="45%">
<div class="boxr" style="padding: 10px;">
<h2 class="title"><img src="style/images/icons/information.png" border="0" alt="Info" class="middle">&nbsp;Info</h2>
<p class="gentext">$mod_filename is a <b>$mod_format format</b> module. Uncompressed, it is <b>$mod_size</b> in size and has been downloaded <b>$mod_hits</b> times since $mod_date :D
</p>
<h2 class="title"><img src="style/images/icons/world_go.png" border="0" alt="more" class="middle">&nbsp;More Good Stuff</h2>
<ul style="list-style-type:none;">
<li>
<a href="http://modarchive.org/module.php?$mod_id"><img src="style/images/tma_20px.png" width="16" height="16" border="0" class="middle" alt="TMA"></a>&nbsp;<a class="bigbiglink" href="http://modarchive.org/module.php?$mod_id">View on the archive</a>
</li>
</ul>
<h2 class="title"><img src="style/images/icons/heart.png" border="0" alt="Heart" class="middle">&nbsp;Members</h2>
<table style="margin: 0px; padding: 0px;" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="45%" valign="top">
<ul style="list-style-type:none;">
$fans
</ul>
</td>
</tr>
</table>
</div>
$border_bottom
<br>
$comment_html
</td>
</tr>
</table>
</div>
<div class="borderbox">
$advert

</div>

EOT;

print $html;


?>
