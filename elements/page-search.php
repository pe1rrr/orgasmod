<?php

$search_array = orgasmod_search_results($xml);

$search_results = $search_array['results'];
$search_navigation = $search_array['pagination'];

include 'elements/inc_item-search_form.php';
$html = <<<EOT

<div class="bgmod">
&nbsp;
</div>

<h1 class='title'>Search Results</h1>
$search_navigation
<div class="bgsearch">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td valign="top">
<ul class="nolist">
$search_results
</ul>
</td>
</tr>
</table>
<h2 class='title'>Try again?</h2>
$search_form
</div>
EOT;

print $html;
?>
