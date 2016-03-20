<?php session_start();
	
	//MANEJO DE ERRORES
	/**************************************************************************************************/
	//ini_set('display_errors', 'on');
	//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

	//CONEXIÓN A LA BASE DE DATOS
	/**************************************************************************************************/
	require_once('connections/connect.inc.php');
	
	//RECIBE EL ID DEL REGISTRO PARA DESPLEGAR INFORMACIÓN DEL TOUR
	/**************************************************************************************************/
	$idPost = intval($_REQUEST["ID"]);
	
	//DESTINATIONS
	/**************************************************************************************************/
	$SQL1 = "SELECT * FROM destinations ORDER BY id DESC";
	$RESULT1 = mysql_query($SQL1);
	
	//ACTIVITIES
	/**************************************************************************************************/
	$SQL2 = "SELECT * FROM activities ORDER BY id DESC";
	$RESULT2 = mysql_query($SQL2);
	
	//TOURS
	/**************************************************************************************************/
	$SQL3 = "SELECT * FROM categories ORDER BY id DESC";
	$RESULT3 = mysql_query($SQL3);
	
	//HOTELS & RESORTS
	/**************************************************************************************************/
	$SQL4 = "SELECT * FROM hotels ORDER BY id DESC";
	$RESULT4 = mysql_query($SQL4);
	
	//KEYWORDS AND METATAGS
	/**************************************************************************************************/
	$SQL5 = "SELECT * FROM seohome";
	$RESULT5 = mysql_query($SQL5);
	$KEYS = mysql_fetch_array($RESULT5);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $KEYS["title_esp"]; ?></title>
<meta name="keywords" content="<?php echo $KEYS["keywords_esp"]; ?>" />
<meta name="Description" content="<?php echo $KEYS["metaDescription_esp"]; ?>" />
    
<meta name="author" content="www.TicoStyle.com" />
<meta name="copyright" content="Wild Coast Costa Rica" />
<meta name="country" content="Costa Rica" />
<meta name="language" content="en-us" />
<meta name="robots" content="index, follow" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta http-equiv="reply-to" content="info@wildcoastcr.com" />
<meta name="revisit-after" content="7 days" />
<meta name="Subject" content="Wild Coast Costa Rica Travels and Adventures in Costa Rica" />
<meta name="abstract" content="Wild Coast Costa Rica Travels and Adventures in Costa Rica" />
<meta name="originatorjurisdiction" content="Costa Rica" />
<meta name="expires" content="never" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="/css/styles.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
	
	//Code goes here
//Show the paging and activate its first link
$(".paging").show();
$(".paging a:first").addClass("active");

//Get size of the image, how many images there are, then determin the size of the image reel.
var imageWidth = $(".window").width();
var imageSum = $(".image_reel img").size();
var imageReelWidth = imageWidth * imageSum;

//Adjust the image reel to its new size
$(".image_reel").css({'width' : imageReelWidth});

//Paging  and Slider Function
rotate = function(){
    var triggerID = $active.attr("rel") - 1; //Get number of times to slide
    var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

    $(".paging a").removeClass('active'); //Remove all active class
    $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

    //Slider Animation
    $(".image_reel").animate({
        left: -image_reelPosition
    }, 500 );

}; 

//Rotation  and Timing Event
rotateSwitch = function(){
    play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
        $active = $('.paging a.active').next(); //Move to the next paging
        if ( $active.length === 0) { //If paging reaches the end...
            $active = $('.paging a:first'); //go back to first
        }
        rotate(); //Trigger the paging and slider function
    }, 7000); //Timer speed in milliseconds (7 seconds)
};

rotateSwitch(); //Run function on launch

//On Hover
$(".image_reel a").hover(function() {
    clearInterval(play); //Stop the rotation
}, function() {
    rotateSwitch(); //Resume rotation timer
});	

//On Click
$(".paging a").click(function() {
    $active = $(this); //Activate the clicked paging
    //Reset Timer
    clearInterval(play); //Stop the rotation
    rotate(); //Trigger rotation immediately
    rotateSwitch(); // Resume rotation timer
    return false; //Prevent browser jump to link anchor
});	
	
	
	
});
</script>

<!-- GOOGLE ANALYTICS -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-191872-40']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

<div id="wrapper">
    <!-- HEADER -->
    <div id="header">
    	<div id="logo">
       	<img src="/images/logo.jpg" alt="Travels and Adventures Wild Coast Costa Rica" width="472" height="148" border="0" usemap="#Map" />
      <map name="Map" id="Map">
            <area shape="rect" coords="68,25,405,107" href="index.php" />
        </map>
    </div>
    <div id="top">
	  <a href="/" class="selectedTop" title="Wild Coast Costa Rica">HOME PAGE</a>  &nbsp;&nbsp;/&nbsp;&nbsp;
      <a href="/aboutus/" class="greenTop" title="About Wild Coast Costa Rica">ABOUT US</a>   &nbsp;&nbsp;/&nbsp;&nbsp;    
      <a href="/contactus/" class="greenTop" title="Contact Us">CONTACT US</a>   &nbsp;&nbsp;/&nbsp;&nbsp;  
      <a href="/it/" class="greenTop" title="Versione Italiana">ITALIANO</a>   &nbsp;&nbsp;/&nbsp;&nbsp;  
      <a href="/sitemap.xml" class="greenTop" title="Site Map">SITE MAP</a>        
    </div>
    <div id="nav">
      <div id="menuHorizontal">
        <script src="/js/functions.js" type="text/javascript"></script>
            <ul id="treemenu1">
                <li><a href="/costarica/" class="btn-m01" title="Costa Rica">COSTA RICA</a></li>
                <li><a href="/destinations-costarica.php" class="btn-m02" title="Destinations in Costa Rica">DESTINATIONS</a>
                  <ul>
                        <?php                             
                              while($POST1 = mysql_fetch_array($RESULT1))
                              { ?>
                                <li><a href="/destinations/<?php echo $POST1['id']; ?>-<?php echo urls_amigables($POST1['titulo'])?>" title="<?php echo $POST1['titulo']; ?> Costa Rica"><?php echo $POST1['titulo']; ?></a></li>
                        <?php } ?>
                  </ul>
                </li>
                <li><a href="/hotels-resorts-costarica.php" class="btn-m03" title="Hotels &amp; Resorts in Costa Rica">HOTELS &amp; RESORTS</a>
                  <ul>
                        <?php 
                              while($POST4 = mysql_fetch_array($RESULT4))
                              { ?>
                                <li><a href="/hotels/<?php echo $POST4['id']; ?>-<?php echo urls_amigables($POST4['titulo'])?>" title="<?php echo $POST4['titulo']; ?> Costa Rica"><?php echo $POST4['titulo']; ?></a></li>
                        <?php } ?>
                  </ul>
                </li>
                <li><a href="/activities-costarica.php" class="btn-m04" title="Activities in Costa Rica">ACTIVITIES</a>
                  <ul>
                        <?php 
                              while($POST2 = mysql_fetch_array($RESULT2))
                              { ?>
                                <li><a href="/activities/<?php echo $POST2['id']; ?>-<?php echo urls_amigables($POST2['titulo'])?>" title="<?php echo $POST2['titulo']; ?> Costa Rica"><?php echo $POST2['titulo']; ?></a></li>
                        <?php } ?>
                  </ul>	                
                </li>
                <li><a href="/tours-costarica.php" class="btn-m05" title="Tours in Costa Rica">OUR TOURS</a>
                  <ul>
                        <?php 
                              while($POST3 = mysql_fetch_array($RESULT3))
                              { ?>
                                <li><a href="/tours/<?php echo $POST3['id']; ?>-<?php echo urls_amigables($POST3['titulo']); ?>" title="<?php echo $POST3['titulo']; ?> Costa Rica"><?php echo $POST3['titulo']; ?></a></li>
                        <?php } ?>
                  </ul>
                </li>
                <li><a href="/photogallery/" class="btn-m06" title="Photo Gallery Costa Rica">PHOTO GALLERY</a></li>
            </ul>
      </div>
	</div>
</div>
  
<!-- BODY -->
<div id="wrapFlash">
    <div id="contFlash">
        <div class="main_view">
            <div class="window">
                <div class="image_reel">
                    <a href="#"><img src="images/01.jpg" width="655" height="310" border="0" alt="Wild Coast Costa Rica" /></a>
                    <a href="#"><img src="images/02.jpg" width="655" height="310" border="0" alt="Wild Coast Costa Rica" /></a>
                    <a href="#"><img src="images/03.jpg" width="655" height="310" border="0" alt="Wild Coast Costa Rica" /></a>
                    <a href="#"><img src="images/04.jpg" width="655" height="310" border="0" alt="Wild Coast Costa Rica" /></a>
                    <a href="#"><img src="images/05.jpg" width="655" height="310" border="0" alt="Wild Coast Costa Rica" /></a>
                    <a href="#"><img src="images/06.jpg" width="655" height="310" border="0" alt="Wild Coast Costa Rica" /></a>                    
                </div>
           </div>
           <div class="paging">
                <a href="#" rel="1">1</a>
                <a href="#" rel="2">2</a>
                <a href="#" rel="3">3</a>
                <a href="#" rel="4">4</a>
                <a href="#" rel="5">5</a>  
                <a href="#" rel="6">6</a>                                                          
           </div>
        </div>
    </div>
       <div id="cuadritos"><img src="images/cuadritos.jpg" /></div>
    </div> 
    
    <div id="cols">
       <div id="col01">
   	      <h2>Tours</h2>
       	  <div class="fotoThumb"><a href="tours-costarica.php"><img src="images/tours.jpg" alt="Tours in Costa Rica" border="0" /></a></div>
      </div>
       <div id="col02">
   	      <h2>Activities</h2>
       	  <div class="fotoThumb"><a href="activities-costarica.php"><img src="images/activities.jpg" alt="Activities in Costa Rica" border="0" /></a></div>
      </div>
       <div id="col03">
   	      <h2>Hotels &amp; Resort</h2>
       	  <div class="fotoThumb"><a href="hotels-resorts-costarica.php"><img src="images/hotels.jpg" alt="Hotels &amp; Resorts in Costa Rica" border="0" /></a></div>       
      </div>
    </div>
    <div id="welcome">  
    	 <h1>Costa Rica</h1>
         <div id="CostaRica">
            <p>As a Destination Management Company, <strong>Wild Coast Costa Rica</strong> offers package planning trips, professional advice and services to companies and agencies to organize custom made trips and Corporate and Incentive Trips. <br />
<br />
Our team will be able to suggest personalized alternatives, submitting unique locations and team building activities suited for the requirements of each Company.<br />
<br />
In <strong>Wild Coast</strong> you will find a reliable and priceless partner that will follow step by step the entire event....
             <br />
             <br />
           <strong><a href="/aboutus/" class="green">+ view more...</a></strong><br />
           <br />
           </p>
      </div>
         <div id="Video">
         	<!--<iframe src="http://player.vimeo.com/video/26734179?byline=0&amp;portrait=0" width="458" height="255" frameborder="0"></iframe>-->
            <iframe src="http://player.vimeo.com/video/81467097?byline=0&amp;portrait=0" width="458" height="255" frameborder="0"></iframe>
         </div>
    </div>
    
    <div id="lines">
       <p><a href="/costarica/" class="linkFoot" title="WildCoast Costa Rica">WildCoast Costa Rica</a>  &nbsp;|&nbsp;  
          <a href="/aboutus/" class="linkFoot" title="About Costa Rica">About Costa Rica</a>  &nbsp;|&nbsp;  
          <a href="destinations-costarica.php" class="linkFoot" title="Destinations in Costa Rica"> Destinations in Costa Rica</a>  &nbsp;|&nbsp;  
          <a href="activities-costarica.php" class="linkFoot" title="Activities in Costa Rica">Activities in Costa Rica</a>  &nbsp;|&nbsp;  
          <a href="tours-costarica.php" class="linkFoot" title="Tours in Costa Rica">Ours Tours</a>  &nbsp;|&nbsp;  
          <a href="/photogallery/" class="linkFoot" title="Photo Gallery">Photo Gallery</a>  &nbsp;|&nbsp;  
          <a href="/contactus/" class="linkFoot" title="Contact Form">Contact Us</a>  &nbsp;|&nbsp;  
          <a href="it/" class="linkFoot" title="Versione Italiana">Italiano</a>  &nbsp;|&nbsp;  
          <a href="/" class="linkFoot" title="Home Page">Home Page</a>
       </p>
  </div>
 
	<!-- FOOTER -->
	<div id="footer">
   	  <div id="footerRow01">
       	<p><strong>Mobile Phone</strong> +506 8799-8758 &nbsp;/&nbsp; <strong>Office</strong> +506 2656-2092<strong> </strong> &nbsp;/&nbsp; <strong>Email</strong> 
   	      <a href="/contactus/" class="verdeOscuro">info@wildcoastcr.com</a>  /  <a href="/terms/" class="verdeOscuro">Terms &amp; Conditions</a></p>
   	  </div>
        <div id="footerRow02">
        	<div id="creditos">
        	  <p><a href="http://www.TicoStyle.com" target="_blank" class="linkCreditos">Host &amp; Design www.TicoStyle.com</a></p>
        	</div>
            <div id="derechos">
              <p>&copy;2011-2014 Copyrights by Wild Coast Costa Rica</p>
            </div>
        </div>
        <div id="footerRow03">
	       <img src="images/socialnetworks.jpg" alt="Social Networks" border="0" usemap="#Map2" />
		   <map name="Map2" id="Map2">
           		<area shape="rect" coords="-5,-2,46,45" href="http://www.facebook.com/pages/Wild-Coast-Costa-Rica/107071356012666" target="_blank" />
		  		<area shape="rect" coords="48,-2,99,45" href="https://twitter.com/WildCoastCr" target="_blank" />
                <area shape="rect" coords="101,-2,152,45" href="http://www.facebook.com/pages/Wild-Coast-Costa-Rica/107071356012666" target="_blank" />
	      </map>
        </div>
      <div id="footerRow04">MORE THAN 2600 FANS</div>
      <div id="contLogos">
        <div align="right"><img src="images/nature.jpg" alt="logos" width="369" height="115" border="0" usemap="#Map3" />
            <map name="Map3" id="Map3">
              <area shape="rect" coords="217,0,368,114" href="http://www.natureair.com/wild-coast-costa-rica.aspx?referrer_id=440221" target="_blank" alt="Nature Air Costa Rica" />
            </map>
		</div>
      </div>
    </div>

<!-- final -->
</div>

</body>
</html>