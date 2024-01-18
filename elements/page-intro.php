<?php


$html =<<<EOT
<div class="bgmod">
&nbsp;
</div>

<div class="bgmembers">
<h1 class='title centrebox'>What is this site for?</h1>
<div class="box borderbox" style="max-width: 600px; margin-left: auto; margin-right:auto;">
<p><img src="style/images/icons/information.png" border="0" class="middle" alt="TMA" align="left" style='padding:4px;'>All members on The Mod Archive website have the ability to create lists of their favourite modules, these lists are then syndicated to this website and presented in a way that enables you to grab modules <i>recommended by people - for people</i>, although it is very much possible to search for <i>any</i> module.
</p>
<p>This site is more or less the development playground of the administrator, and as such things tend to be phased in and out as time goes on. Usually features tested here are eventually incorporated into Mod Archive, but this site is much less complex and frankly more to the point of finding _good_ modules. Modarchive.org's members have basically reaped the wheat from the chaff for you :-), and you can do the same too.
</p>

<br>
<p>How do I add my own favourites? Simple! Register at <a href="http://modarchive.org">http://modarchive.org</a> and add favourites to your list there. 
</p>
<br>
<p>Where is all this data coming from? The Mod Archive! How? the <a href="http://modarchive.org/index.php?xml-api">API provided</a> by the archive! None of the modules or member images are sourced locally, they are all retrieved from the archive. The only thing that site does is render the multiple-XML feeds into viewable pages.
</p>
</div>
<br>
<h1 class='title centrebox'>Change Log</h1>
<div class="box borderbox" style="max-width: 600px; margin-left: auto; margin-right:auto;">
<p class='faded'>Log started at v2.5, didn't bother before that.</p>
<ul class='nolist'>
<li>2.5 Started Change log :-)</li>
<li>2.5 File name and Title search implemented</li>
<li>2.5 Graphics for Search, footer navigation added</li>
<li><b>2.6</b> Added member profiles. Can now view profiles of user via their nomination list</li>
<li><b>2.7</b> Integrated member comments on modules which have them.</li>
<li>2.7 Integrated artist's description/comments into module pages if they exist.</li>
<li><b>2.8</b> Integrated Member comment posts view, available via profiles</li>
<li>2.8 Additional graphics for comments, backgrounds and stuff</li>
</ul>
</div>
</div>

<div class="borderbox">
$advert

</div>


EOT;


print $html;

?>
