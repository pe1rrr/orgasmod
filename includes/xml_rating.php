<?php

$sitestyle = isset($_COOKIE['tmastyle']) ? $_COOKIE['tmastyle'] : "";
if ($sitestyle == "") {
        $style_html = $global_vars['default_style'];
} else {
        $style_html = tma_sanitize($sitestyle);
}


$image_properties = "border='0' class='centerimg' alt='rating'";
$module_comment_rating_ceil = ceil($module_comment_rating);

$module_review_rating_ceil = ceil($module_review_rating) . "r";

$module_comment_rating_html = (ceil($module_comment_rating) > 0) ? "<a href='module.php?$module_id#membercomments'><img $image_properties src='style/images/mainthemes/$style_html/ratings/$module_comment_rating_ceil.png'></a>" : "<img $image_properties src='style/images/mainthemes/$style_html/ratings/nothing.png'>";

$module_review_rating_html = (ceil($module_review_rating) > 0) ? "<a href='module.php?$module_id#memberreviews'><img $image_properties src='style/images/mainthemes/$style_html/ratings/$module_review_rating_ceil.png'></a>" : "<img $image_properties src='style/images/mainthemes/$style_html/ratings/nothing.png'>";


# For Individual Comments. The above is usually ignored.
if ($membercomment_rating != "") {
	$membercomment_rating_ceil = ceil($membercomment_rating);
	$membercomment_rating_html = (ceil($membercomment_rating) > 0) ? "<img $image_properties src='style/images/mainthemes/$style_html/ratings/$membercomment_rating_ceil.png'>" : "<img $image_properties src='style/images/mainthemes/$style_html/ratings/nothing.png'>";

}
?>
