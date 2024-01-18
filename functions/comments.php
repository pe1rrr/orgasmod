<?php
function orgasmod_render_member_comments($request_query,$request_page,$request_order) {
        global $global_vars;
        if (!preg_match("/^[0-9]+$/", $request_query)) {
                $message = "Invaild ID";
                exit(tma_error($message,"$script_url",1));
        }

	
	$session_userid = $_SESSION['userid'];

	$request = "request=view_member_comments&query=$request_query&page=$request_page&order=$request_order&session_userid=$session_userid";
        $get_xml = tma_getxml($request);
	$xml = new SimpleXMLElement($get_xml);

        #MEMCOM
        $script_url =   $global_vars['path_http_script_index'];

        $total_pages = $xml->totalpages;
        $total_comments = $xml->total_comments;
        $results = $xml->results;
        $error =  $xml->error[0];
        if ($error != "") {
                $referrer = "$script_url";
                exit(tma_error($error, $referrer,8));
        }

        $user_alias = ($xml->comments->comment[0]->alias);
        $user_userid = $xml->comments->comment[0]->userid;

        if ($total_pages > 1) {
                include 'includes/pagination.php';
                include 'elements/inc_item-pagination.php';
        }

        $i = 0;
        foreach ($xml->comments->comment AS $dummy) {
                include 'includes/xml_member_comment_list.php';
                include 'elements/member_comment_list.php';
                $i++;
        }
	

	if ($results == "0") {
		$html = "$user_alias has not posted any comments yet..";
	}

	$data['results'] = $html;
	$data['navigation'] = $navigation_html;
	$data['alias'] = $user_alias;
	$data['userid'] = $user_userid;
	return $data;
}
?>
