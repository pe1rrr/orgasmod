<?php
include 'functions/spotlight.php';

$spotlight_html = orgasmod_render_spotlight("horiz");
$spotlight_segment_html = <<<EOT

<div class="bgspotlight">
<h1 class='title'>Artist Spotlight</h1>
<div class="centrebox">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
$spotlight_html
</tr>
</table>
</div>
<br>
</div>

EOT;
?>
