<?php
                $module_filename = ($xml->module[$i]->filename);
                $module_title = $xml->module[$i]->songtitle;
		 if ($module_title == "") $module_title = $module_filename;
		$module_title_short = nicestr($module_title, 15);
                $module_id = $xml->module[$i]->id;
                $module_hash = $xml->module[$i]->hash;
                $module_instruments = nl2br(($xml->module[$i]->instruments));
                $module_size = $xml->module[$i]->size;
                $module_bytes = $xml->module[$i]->bytes;
		$module_comment = nl2br(str_replace(" ","&nbsp;",($xml->module[$i]->comment)));

                $module_infopage = htmlspecialchars($xml->module[$i]->infopage, ENT_QUOTES, 'UTF-8');
                $module_format = $xml->module[$i]->format;
                $module_hits = $xml->module[$i]->hits;
                $module_date = $xml->module[$i]->date;
		$module_timestamp = $xml->module[$i]->timestamp;
                $module_isfeatured = $xml->module[$i]->featured->state;
		$module_isfeatured_date = $xml->module[$i]->featured->date;
		$module_isfeatured_timestamp = $xml->module[$i]->featured->timestamp;
		$module_favourited = $xml->module[$i]->favourites->favoured;
		$module_myfav = trim($xml->module[$i]->favourites->myfav);
                $module_genreid = $xml->module[$i]->genreid;
                $module_genretext = htmlspecialchars($xml->module[$i]->genretext, ENT_QUOTES, 'UTF-8');
		 if ($module_genretext == "") $module_genretext = "n/a";
                $module_comment_rating = $xml->module[$i]->overall_ratings->comment_rating;
                $module_review_rating = $xml->module[$i]->overall_ratings->review_rating;
		$module_comment_total = $xml->module[$i]->overall_ratings->comment_total;
		$module_review_total = $xml->module[$i]->overall_ratings->review_total;

                $module_url = $xml->module[$i]->url;
		include 'includes/xml_module_url.php';
		include 'includes/xml_module_license.php';

?>
