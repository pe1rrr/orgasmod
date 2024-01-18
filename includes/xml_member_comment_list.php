<?php
$comment_text = nl2br((tma_bbcode_comments(($xml->comments->comment[$i]->text))));
$comment_date = $xml->comments->comment[$i]->date;
$comment_id = $xml->comments->comment[$i]->id;
$comment_userid = $xml->comments->comment[$i]->userid;
$comment_alias = $xml->comments->comment[$i]->alias;
$mod_comment_rating = $xml->comments->comment[$i]->rating;
$comment_timestamp =  $xml->comments->comment[$i]->timestamp;
$comment_user_imageurl = htmlspecialchars($xml->comments->comment[$i]->imageurl, ENT_QUOTES, 'UTF-8');

$mod_filename = ($xml->comments->comment[$i]->module->filename);
$mod_title = htmlspecialchars($xml->comments->comment[$i]->module->songtitle, ENT_QUOTES, 'UTF-8');
if ($mod_title == "") $mod_title = $mod_filename;
$mod_id = $xml->comments->comment[$i]->module->id;
$mod_path = $xml->comments->comment[$i]->module->url;
$mod_url = $xml->comments->comment[$i]->module->url;
$mod_hash = $xml->comments->comment[$i]->module->hash;
$mod_size = $xml->comments->comment[$i]->module->size;
$mod_format = $xml->comments->comment[$i]->module->format;

#include 'includes/rating.php';
#include 'includes/module-url.php';
?>
