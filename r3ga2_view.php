<style>

	.r3ga2-title {
		font-weight:bold;
		font-size:80px;
		color:#000;
		padding-top:50px;
	}
	.r3ga2-vars {
		font-weight:bold;
		font-size:30px;
		color:#0699fa;
		padding: 10px;
	}
	.r3ga2-texto {
		font-weight: normal;
		font-size:16px;
	}
</style>

<?php global $path;
	if (!isset($_GET['apikey'])) $apikey =""; else $apikey = $GET['apikey'];
?>
<script language="javascript" type="text/javascript" src="<?php echo $path; ?>Modules/feed/feed.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $path; ?>Modules/packetgen/packetgen.js"> </script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js"></script>

<h2><?php echo _("r3ga2 - controlador de riego"); ?></h2>

<div style="float:left">

<div style="width:320px; background-color:#efefef; margin-bottom:10px; border: 1px solid #ddd;">
    <div style="padding-top: 20px; padding-bottom: 20px; border-top: 1px solid #fff">
	<div style="float:left; padding-left:10px; padding-bottom:20px; paddign-top:10px; font-size: 25px; font-weight:bold;"><?php echo _("Condiciones actuales")?> </div>
        <div class="r3ga2-vars">Temp: <span id="temp"></span> ºC </div>
	<div class="r3ga2-vars">Hum: <span id="hum"></span> %HR </div>
	<div class="r3ga2-vars">Radiación: </div>
    </div>

</div>

<div style="width:320px; background-color:#efefef; margin-bottom:10px; border: 1px solid #ddd;">
    <div style=" height: 70px; padding: 10px; border-top: 1px solid #fff">
	<div style="float:left; paddign-top:20px; font-size: 25px; font-weight:bold;"><?php echo _("Riego manual")?>
		<div style="float:right; padding-top:15px;">
		<input id="Encender" type="submit" value="<?php echo _("Encender"); ?>" class="btn btn-info" />
		<input id="Apagar" type="submit" value="<?php echo _("Apagar"); ?>" class="btn btn-info" />
		</div>
	</div>
    </div>
</div>

<div style="width:320px; background-color:#efefef; margin-bottom:10px; border: 1px solid #ddd;">
    <div style=" height: 300px; padding: 10px; border-top: 1px solid #fff">
	<div style="float:left; font-size: 25px; font-weight:bold;"><?php echo _("Configurar riego")?></div>
	<div style="float:left; padding-top:20px; font-size: 16px; font-weight: bold;"><?php echo _("cultivo:  "); ?>
		<select style="width:100px">
       			<option value=0>judia</option>
       			<option value=1>melon</option>
       			<option value=2>pimiento</option>
       			<option value=3>tomate</option>
		</select>
	</div>
	<div style="float:left; font-size: 16px; font-weight: bold"><?php echo _("fecha de trasplante: ") ?>
		<div id="datetimepicker1" class="input-append date">
                    <input id="export-start" data-format="dd/MM/yyyy" type="text" />
                    <span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                </div>
	</div>
	<div style="float:left; font-size: 16px; font-weight: bold;"><?php echo _("dosis de riego:") ?>
	<div style="float:right; padding-top:15px" class="r3ga2-texto"><?php echo _("goteros/planta: ") ?>
		<select style="width:80px">
       			<option value=0>1</option>
       			<option value=1>2</option>
			<option value=2>3</option>
			<option value=3>4</option>
		</select>
	</div>
	<div style="float:right" class="r3ga2-texto"><?php echo _("caudal goteros: ") ?>
		<select style="width:80px">
       			<option value=0>1 l/h</option>
       			<option value=1>2 l/h</option>
			<option value=2>3 l/h</option>
			<option value=3>4 l/h</option>
		</select>
	</div>
	</div>
    </div>
</div>


<div style="width:320px; background-color:#efefef; margin-bottom:10px; border: 1px solid #ddd;">
    <div style=" height: 70px; padding: 10px; border-top: 1px solid #fff">
	<div style="float:left; paddign-top:20px; font-size: 25px; font-weight:bold;"><?php echo _("Nutrición")?> 

	</div>
    </div>
</div>

</div>
<div style="width: 600px; height:420px; float:right"><div style="height:400px; border: 1px solid #ddd; " ><iframe frameborder="1" width= "600" height="400" src="http://192.168.1.104/emoncms/vis/multigraph?mid=1&embed=1"></iframe> </div></div>




<script>
  // The feed api library requires the emoncms path
  var path = "<?php echo $path; ?>"

  update();

  // Set interval is a way of scheduling an periodic call to a function
  // which we can then use to fetch the latest power value and update the page.
  // update interval is set to 10 seconds (10000ms)
  setInterval(update,10000);

  function update()
  {
    // Get latest feed values from the server (this returns the equivalent of what you see on the feed/list page)
    var feeds = feed.list_by_id();    

    // Update the elements on the page with the latest power and energy values.
    $("#temp").html(feeds[1]);
    $("#hum").html(feeds[2]);
  }

</script>

<script>
	var path = "<?php echo $path; ?>";
	//var apikey = "<?php echo $apikey; ?>";
	var apikey = "";
	var packet = packetgen.get();

	$("#Encender").click(function(){
	 alert("has encendido el riego");
	 packet[6].value=1;
	 packetgen.set(packet,5);
	});

	$("#Apagar").click(function(){
	 alert("has apagado el riego");
	 packet[6].value=0;
	 packetgen.set(packet,5);
	});

	$('#datetimepicker1').datetimepicker({
	language: 'en-EN'
	});

</script>

