<?php

	$membercomment_id = $xml->module[$i]->comments->comment[$c]->id;
	$membercomment_text = nl2br(tma_bbcode_comments($xml->module[$i]->comments->comment[$c]->text));
	$membercomment_date = $xml->module[$i]->comments->comment[$c]->date;
	$membercomment_timestamp = $xml->module[$i]->comments->comment[$c]->timestamp;
	$comment_timestamp = $membercomment_timestamp;
	$membercomment_userid = $xml->module[$i]->comments->comment[$c]->userid;
	$comment_userid = $membercomment_userid;
	$membercomment_rating = $xml->module[$i]->comments->comment[$c]->rating;
	$membercomment_imageurl = htmlspecialchars($xml->module[$i]->comments->comment[$c]->imageurl, ENT_QUOTES, 'UTF-8');
	$membercomment_alias = $xml->module[$i]->comments->comment[$c]->alias;
	#include 'includes/rating.php';

?>
