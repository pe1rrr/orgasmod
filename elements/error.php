<?php 
// HTML Template
$random_list = orgasmod_render_all_member_favourites("10","1","2");
include 'elements/inc_item-search_form.php';
$html = <<<EOT
<div class="bgmod">
&nbsp;
</div>
<div class="centrebox">
<h1 class='title'>Uh oh!</h1>
<div class="boxl borderbox center">
<p class='title'><b>$message</b></p>

<h2 class='title'>Search?</h2>
$search_form
</div>
</div>

<div class="centrebox">
<h1 class='title'>Or perhaps try some of these...</h1>
<div class="boxl borderbox">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="50%">
<ul style="list-style-type: none;">
$random_list
</ul>
</td>
</tr>
</table>
</div>
</div>


EOT;



print $html;

?>
