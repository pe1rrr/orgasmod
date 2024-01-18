<?php
$spotlight_userid = $xml->spotlights->spotlight[$i]->userid;
$spotlight_alias = $xml->spotlights->spotlight[$i]->alias;
$spotlight_blurb = $xml->spotlights->spotlight[$i]->blurb;
$spotlight_date = $xml->spotlights->spotlight[$i]->date;
$spotlight_imageurl = htmlspecialchars($xml->spotlights->spotlight[$i]->imageurl, ENT_QUOTES, 'UTF-8');
?>
