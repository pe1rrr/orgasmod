<?php

$last_query = $_SESSION['query'];
$referer = $_SERVER['QUERY_STRING'];
$referer = preg_replace("/&page=[0-9]+/","",$referer);
$advert = tma_render_advert();
// HTML Template

$html = <<<EOT
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META name="y_key" content="4371dfab6513c05d">
<meta name="google-site-verification" content="FAz5QU3lx9q99aufXu6IhxZZISpqGNmA3xi-huHMo3M" />
<link rel="stylesheet" type="text/css" href="style/style.css">
<title>OrgasMOD - Amazing Modules $header_title_html</title>
<script type="text/javascript">
function popUp(URL) {
        day = new Date();
        id = day.getTime();
        popUpCen(URL,500,500)
}


function popUpCen(url,windowWidth,windowHeight){
        day = new Date();
        id = day.getTime();
        myleft=(screen.width)?(screen.width-windowWidth)/2:100;
        mytop=(screen.height)?(screen.height-windowHeight)/2:100;
        properties = "width="+windowWidth+",height="+windowHeight+",toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,top="+mytop+",left="+myleft;
        window.open(url,id,properties)
}
</script>
</head>

<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<div class="mainbg" style="max-width:800px; margin-left:auto; margin-right:auto;">
<div align="center">
<a href="index.php"><img src="style/images/orgasmod.jpg"></a>
<br>
<h3>Hand picked selections of the best tracked music</h3>
</div>


EOT;

print $html;

?>
