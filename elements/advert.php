<?php
        # Link Exchange Ads
        $i = 0;
	if ($xml->sponsor->advert->Links) {
        $html .= "<ul>";
        foreach ($xml->sponsor->advert->Links->Link as $dummy) {
                $ad_link = $xml->sponsor->advert->Links->Link[$i]->URL;
                $ad_text = htmlentities($xml->sponsor->advert->Links->Link[$i]->Text);
                $html .= "<li><a class='bigbiglink' href='$ad_link'>$ad_text</a></li>";
                $i++;
        }
        $html .= "</ul>";
	}


?>
