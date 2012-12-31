<?php
	////////////
	// CONFIG //
	////////////
	
	$twitter_images_config = array();
	// Subject or hashtag you can put a word here or a hashtag (defualt:#puppies)
	$twitter_images_config['subject'] = '#puppies';
	// Only display images (defualt: true)
	$twitter_images_config['images_only'] = true;
	
	
	///////////        ////////////////
	// STUFF //        // DONT TOUCH //
	///////////        ////////////////

?>
<html>
	<head>
		<title>Latest <?php $twitter_images_config['subject'] ?> </title>
		<script src="include/jquery.min.js"></script>
    <style type="text/css">
      body {
      }
      .cameron {
        font-family: sans-serif;
        margin-top:50px;
		margin-left:auto;
		margin-right:auto;
      }
      .small {
        font-family: sans-serif;
        font-size: 0.8em;
        margin:0px auto;
        max-width:500px;
        margin-top:50px;
      }
    </style>
  </head>
  <body id="content">
<?php
	if ($twitter_images_config['images_only'] == true ) {echo "  <center><div id='Title' class='cameron' style='font-size:4em; padding-bottom:50px;'>Latest." $twitter_images_config['subject'] ". pic.twitter.com</div><center>";}
	else {echo "  <center><div id='Title' class='cameron' style='font-size:4em; padding-bottom:50px;'>Latest." $twitter_images_config['subject'] ".</div><center>";}
?>
  <script type="text/javascript">
    var id = 0;
    var url = "http://search.twitter.com/search.json?callback=?&rpp=1&q='%23mcscreenshot pic.twitter.com'";
    $.getJSON(url, function(data) {
      id = data.max_id_str;
      var url = "https://api.twitter.com/1/statuses/oembed.json?callback=?&id="+id+"&align=center&maxwidth=900&hide_media=false&lang=en";
      $.getJSON(url, function(data) {
        $('#Title').after(data.html);
      });
    });
    </script>
	</body>
</html>
