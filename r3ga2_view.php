<style>

	.r3ga2-title {
		font-weight:bold;
		font-size:80px;
		color:#000;
		padding-top:50px;
	}
	.r3ga2-vars {
		font-weight:bold;
		font-size:44px;
		color:#0699fa;
		padding-top:65px;
	}
</style>

<div style=margin: 0px auto; max-width:320px;">
	<div class="r3ga2-title"> r3ga2 controlador de riego </div>
	<div class="r3ga2-vars"> <span id="temp">250</span> ºC </div>
	<div class="r3ga2-vars"> <span id="hum">250</span> %HR </div>
</div>

<!-- bring in the emoncms path variable which tells this script what the base URL of emoncms is -->
<?php global $path; ?>

<!-- feed.js is the feed api helper library, it gives us nice functions to use within our program that
calls the feed API on the server via AJAX. -->
<script language="javascript" type="text/javascript" src="<?php echo $path; ?>Modules/feed/feed.js"></script>

<script>
  // The feed api library requires the emoncms path
  var path = "<?php echo $path; ?>"
  var feeds = feed.list_by_id();    

  // Update the elements on the page with the latest power and energy values.
  $("#temp").html(feeds[7]);               // feeds[temp-feed-id]
  $("#hum").html(feeds[8]);                // feeds[hum-feed-id]
</script>
