<?php

$comments = orgasmod_render_member_comments("$request_query",$request_page,$request_order);

$comments_html = $comments['results'];
$comments_navigation = $comments['navigation'];
$profile_alias = $comments['alias'];
$profile_userid = $comments['userid'];

$header_title_html = " - $profile_alias's posts";

include 'elements/header.php';
include 'elements/inc_item-links.php';

$html = <<<EOT
<div class="bgmod">
&nbsp;
</div>
<h1 class='title'>$profile_alias's Posts</h1>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="75%" valign="top">
<div class="boxl gentext borderbox" style="min-height: 250px;">
$comments_navigation
$comments_html 
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

print $html;

?>
