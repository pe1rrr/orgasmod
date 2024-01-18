<?php

if ($first == "") {
	$html .= "";
	$first = 1;
	$count_up = 1;
}

if ($count_up == $results) {
	$foot = "";
} else {
	$count_up++;
}

$html .= <<<EOT

<h1 class='title'>$mod_title <span style="font-size: 14px;"><br>($mod_filename)</span>
</h1>

<p>$comment_text</p>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="50%" valign="top">
<ul class='nolist'>
<li class='faded'>
Posted $comment_date
</li>
</ul>
</td>
<td width="50%" valign="top">
<ul class='nolist'>
<li>
<a href="$mod_url">
<img border="0" class="middle" alt="download" src="style/images/icons/link_go.png">
</a>
<a class="bigbiglink faded middle" href="$mod_url">
Download
</a>
</li>
<li>
<a href="module.php?$mod_id">
<img border="0" class="middle" alt="view" src="style/images/icons/page_white_go.png">
</a>
<a class="bigbiglink faded middle" href="module.php?$mod_id">
View
</a>
</ul>
</td>
</tr>
</table>
$foot
EOT;

?>
