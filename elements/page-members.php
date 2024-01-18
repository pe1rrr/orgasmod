<?php

$member_data = orgasmod_render_member_list($xml);
$member_list = $member_data['html'];
$navigation_html = $member_data['navigation'];


$html = <<<EOT

<div class="bgmod">
&nbsp;
</div>

<div class="bgmembers">
<h1 class="title">Contributers</h1>
<div class='borderbox'>
<p>These people are very passionate about the tracking scene, and have contributed to this website by nominating their favourite modules via <a href="http://modarchive.org">The Mod Archive</a> website.
</p>
</div>
$navigation_html
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="50%">
<ul style="list-style-type: none;">
$member_list
</ul>
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
