<?php

if ($profile_blurb == "") $profile_blurb = "<span class='faded'>$profile_alias hasn't written a profile yet... come back soon!</span>";

include 'elements/inc_item-links.php';

$title = "- $profile_alias's Personal Profile";

$html = <<<EOT
<div class="bgmod">
&nbsp;
</div>

<h1 class='title'>$profile_alias's Profile</h1>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="75%" valign="top">
<div class="boxl gentext borderbox" style="min-height: 250px;">
<p>
<img style='padding: 10px;' src="$profile_imageurl" align="right" alt="profile">
$profile_blurb
</p>
</div>
</td>
<td width="25%" valign="top">
$links_html
</td>
</tr>
</table>



<div class="borderbox">
$advert

</div>

EOT;
?>
