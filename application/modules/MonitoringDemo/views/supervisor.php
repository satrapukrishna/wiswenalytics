<!DOCTYPE html>
<html>
<head>
	<title>Supervisor</title>
	 <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/ambienceasset/asset/CSS/supervisor.css">
    
</head>
<body>
<div>
	<div class="SupMnCtnr" id="SupMnCtnr">
			
		<ul class="SupMnCenter">
			<li class="logo"><a>Supervisor</a></li>
			

			<li class="Suplist">

				<ul>
					<li><span class="Suplist-title">Hand Towel</span><span class="Suplist-img"><img src="../asset/ambienceasset/asset/Images/Hnd-Twl-NA-small.png"></span></li>
					<li><span class="suplist-gr">Available</span>
			<label class="switch">
  <input type="checkbox"  id="htowel">
  <span class="slider round"></span>
</label></button><span class="suplist-red"> Not Available<span> </li>

				</ul>
			
			</li>


			<li class="Suplist">

				<ul>
					<li><span class="Suplist-title">Toilet Roll</span><span class="Suplist-img"><img src="../asset/ambienceasset/asset/Images/Tlt-Rll-NA-small.png"></span></li>
					<li><span class="suplist-gr">Available</span>
			<label class="switch">
  <input type="checkbox" id="troll">
  <span class="slider round"></span>
</label></button><span class="suplist-red"> Not Available<span> </li>

				</ul>
			
			</li>


			<li class="Suplist">

				<ul>
					<li><span class="Suplist-title">Dustbin</span><span class="Suplist-img"><img src="../asset/ambienceasset/asset/Images/Dst-Bn-NA-small.png"></span></li>
					<li><span class="suplist-gr">Empty</span>
			<label class="switch">
  <input type="checkbox" id="dustbin">
  <span class="slider round"></span>
</label></button><span class="suplist-red"> Full<span> </li>

				</ul>
			
			</li>


			<li class="Suplist">

				<ul>
					<li><span class="Suplist-title">Floor</span><span class="Suplist-img"><img src="../asset/ambienceasset/asset/Images/Wt-Flr-small.png"></span></li>
					<li><span class="suplist-gr">Dry</span>
			<label class="switch">
  <input type="checkbox" id="floor">
  <span class="slider round"></span>
</label></button><span class="suplist-red">Wet<span> </li>

				</ul>
			
			</li>


			<li class="Suplist">

				<ul>
					<li><span class="Suplist-title">Hand Soap</span><span class="Suplist-img"><img src="../asset/ambienceasset/asset/Images/HndSp-small.png"></span></li>
					<li><span class="suplist-gr">Available</span>
			<label class="switch">
  <input type="checkbox" id="soap">
  <span class="slider round"></span>
</label></button><span class="suplist-red">Not Available<span> </li>

				</ul>
			
			</li>

			<li class="Suplist">

				<ul>
					<li><span class="Suplist-title">Odour</span><span class="Suplist-img"><img src="../asset/ambienceasset/asset/Images/Hnd-Twl-NA-small.png"></span></li>
					<li><span class="suplist-gr">Clean</span>
			<label class="switch">
  <input type="checkbox" id="odour">
  <span class="slider round"></span>
</label></button><span class="suplist-red">Not Clean<span> </li>

				</ul>
			
			</li>

			<li><textarea class="feedback-area" placeholder="Enter Feedback" name="feedback" id="feedback"></textarea></li>

			<li><button type="button" class="submit_but" onclick="updateSupervisor()">Submit</button></li>






		</ul>


	</div>
</div>


</body>
<!-- <script src="<?php echo base_url(); ?>asset/Jquery/ajaxQueuePlugin.js"></script> -->
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

 <script type="text/javascript">    
     
      function updateSupervisor()
      {
      	var htowel,troll,dustbin,floor,soap,odour;
      	if ($('#htowel').is(":checked"))
			{
			  htowel=0;
			}else{
				htowel=1;
			}
			if ($('#troll').is(":checked"))
			{
			  troll=0;
			}else{
				troll=1;
			}
			if ($('#dustbin').is(":checked"))
			{
			  dustbin=0;
			}else{
				dustbin=1;
			}
			if ($('#floor').is(":checked"))
			{
			  floor=0;
			}else{
				floor=1;
			}
			if ($('#soap').is(":checked"))
			{
			  soap=0;
			}else{
				soap=1;
			}
			if ($('#odour').is(":checked"))
			{
			  odour=0;
			}else{
				odour=1;
			}

      	//var message = $('feedback').val();
var message = $('textarea#feedback').val();
      	  var urlString = "<?php echo base_url(); ?>Ambience/getAndUpdateSupervisor";
          var sdata = {"supervisor": "supervisor", "HandTowel" : htowel,"Toiletroll":troll,"Dustbin":dustbin,"FloorDryWet":floor,"HandSoap":soap,"Odour":odour,"Feedback":message};

			var json = JSON.stringify(sdata); 
//alert(json);
			$.ajax({
			 type: "POST",
			 url: urlString,
			 data: {"supervisor": "supervisor", "HandTowel" : htowel,"Toiletroll":troll,"Dustbin":dustbin,"FloorDryWet":floor,"HandSoap":soap,"Odour":odour,"Feedback":message},
			
			
			 success: function(msg) {
			 	var obj = JSON.parse(msg);
			 	if(obj['status']=='Success'){
			 		alert("Successfully Submited");
			 		location.reload();
			 	}else{
			 		alert("Failed");
			 		location.reload();
			 	}
			 	//console.log(msg);
			//alert(msg);
			 }
			});
      }
      </script>
</html>