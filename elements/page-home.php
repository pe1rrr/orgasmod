<?php


$random_list = orgasmod_render_all_member_favourites("100","1","2");
$recent_list = orgasmod_render_all_member_favourites("100","1","1");
#include 'elements/segment_spotlight.php';

include 'elements/inc_item-search_form.php';
include 'includes/borders.php';

$html = <<<EOT
<div class="bgmod">
&nbsp;
</div>
<div class="bgmods">
<h1 class="title">Random Goodness</h1>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="50%">
<ul style="list-style-type: none;">
$random_list
</ul>
</td>
</tr>
</table>
<h1 class="title">Recent Favourites</h1>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="50%">
<ul style="list-style-type: none;">
$recent_list
</ul>
</td>
</tr>
</table>
<div class="boxl borderbox">
<h1 class="title">More Stuff</h1>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="50%">
<ul style="list-style-type: none;">
<li>
<a class="bigbiglink" href="index.php?request=view_members"><img src="style/images/icons/heart.png" border="0" class="middle" alt="TMA"></a> <a class="bigbiglink" href="index.php?request=view_members">Our list of Contributing Members</a>
</li>
<li>
<a class="bigbiglink" href="index.php?request=view_intro"><img src="style/images/icons/information.png" border="0" class="middle" alt="TMA"></a> <a class="bigbiglink" href="index.php?request=view_intro">What is this site about?</a>
</li>
</ul>
</td>
<td valign="top">
$search_form
</td>
</tr>
</table>
</div>
<div class="borderbox">
$advert
</div>
</div>

EOT;

print $html;
?>
