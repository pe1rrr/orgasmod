<?php

$whos_id = $_GET['query'];
$profile_data = orgasmod_render_profile($whos_id);
$profile_text = $profile_data['html'];
$header_title_html = $profile_data['title'];

$profile_html = <<<EOT

$profile_text

EOT;

# This is called here so that the title tag can be modified.
include 'elements/header.php';

print $profile_html;

?>
