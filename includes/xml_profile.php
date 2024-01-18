<?php

        $profile_userid = $xml->profile[0]->id;
        $profile_alias = ($xml->profile[0]->alias);
        $profile_registered = $xml->profile[0]->registered;
        $profile_registeredts = $xml->profile[0]->registeredts;
        $profile_website = htmlentities($xml->profile[0]->website);
        $profile_lastseen = $xml->profile[0]->lastseen;
        $profile_blurb = nl2br((tma_bbcode_profile(($xml->profile[0]->blurb))));
        #$profile_blurb = nl2br(tma_bbcode_profile(($xml->profile[0]->blurb)));
	$profile_permalink = $xml->profile[0]->permalink;
	$profile_imageurl = htmlspecialchars($xml->profile[0]->imageurl, ENT_QUOTES, 'UTF-8');
	$profile_isartist = $xml->profile[0]->isartist;
	$profile_email = $xml->profile[0]->email;
	$profile_email = strrev($profile_email);
	$profile_email = str_replace("@"," [ ta ] ",$profile_email);
        $profile_email = str_replace("."," [ tod ] ",$profile_email);

	$profile_showemail = $xml->profile[0]->showemail;

	# Stats

	$profile_member_points = $xml->profile[0]->stats->member_attributes->points;
	$profile_member_comments = $xml->profile[0]->stats->member_attributes->comments;
	$profile_member_reviews = $xml->profile[0]->stats->member_attributes->reviews;
	$profile_member_modules = $xml->profile[0]->stats->member_attributes->modules;
	$profile_member_hits = $xml->profile[0]->stats->member_attributes->profile_hits;
	$profile_member_favourites = $xml->profile[0]->stats->member_attributes->favourites;

	$profile_artist_modules = $xml->profile[0]->stats->artist_attributes->modules;
	$profile_artist_comment_rating = $xml->profile[0]->stats->artist_attributes->member_rating;
	$profile_artist_comments = $xml->profile[0]->stats->artist_attributes->comments;
	$profile_artist_review_rating = $xml->profile[0]->stats->artist_attributes->reviewer_rating;
	$profile_artist_reviews = $xml->profile[0]->stats->artist_attributes->reviews;
	$profile_artist_modules = $xml->profile[0]->stats->artist_attributes->modules;
	$profile_artist_downloads = $xml->profile[0]->stats->artist_attributes->downloads;
	$profile_artist_stats_lastrun = $xml->profile[0]->stats->artist_attributes->updated;

?>
