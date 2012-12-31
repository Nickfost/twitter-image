<?php
	////////////
	// CONFIG //
	////////////
	
	$twitter_images_config = array();
	// Hashtag you can put a any hashtag here (defualt: Puppies)
	$twitter_images_config['subject'] = 'Puppies';
	// Only display images (defualt: true)
	$twitter_images_config['images_only'] = true;
	
	
	// Number of Tweets to display (defualt: 1)
	// DOEST NOT WORK YET  $twitter_images_config['tweet_num'] = '1';
	
	///////////        ////////////////
	// STUFF //        // DONT TOUCH //
	///////////        ////////////////

?>
<html>
	<head>
		<title>Latest #<?php echo $twitter_images_config['subject']; ?> </title>
		<script src="include/jquery.min.js"></script>
    <style type="text/css">
      body {
      }
      .TitleClass {
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
  <center><div id='Title' class='TitleClass' style='font-size:4em; padding-bottom:50px;'>Latest #<?php echo $twitter_images_config['subject'] ?></div><center>
    <script type="text/javascript">
    var id = 0;  
<?php
	if ($twitter_images_config['images_only'] = true ) { ?>    var url = "http://search.twitter.com/search.json?callback=?&rpp=1&q='%23<?php echo $twitter_images_config['subject']; ?> pic.twitter.com'"; <?php }
	else { ?>    var url = "http://search.twitter.com/search.json?callback=?&rpp=1&q='%23<?php echo $twitter_images_config['subject']; ?>'"; <?php }
?>
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
