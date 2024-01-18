<?php

$module_license_id = $xml->module[$i]->license->licenseid;
$module_license_title = $xml->module[$i]->license->title;
$module_license_legalurl = $xml->module[$i]->license->legalurl;
$module_license_deedurl = $xml->module[$i]->license->deedurl;
$module_license_imageurl = htmlspecialchars($xml->module[$i]->license->imageurl, ENT_QUOTES, 'UTF-8');
$module_license_description  = $xml->module[$i]->license->description;

?>
