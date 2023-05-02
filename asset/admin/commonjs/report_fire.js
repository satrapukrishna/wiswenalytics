function getReports(){		
		var type = $('input[name="report_type"]:checked').val();
		if(type==0){
			var solution = $("#solution").val();
			//water report start
		
		
		if(solution==44){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="fprr">Running Report</option><option value="fpsvr">Status View Report</option><option value="fpdrr">DG Running Report</option><option value="fpdfar">DG Fuel Added Report</option><option value="fpcr">Consolidated Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Firepump1</option><option value="m1">Firepump2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		
		
		

		}else{
			var solution = $("#solution").val();
		//air report start
		//air condition
		
		if(solution==44){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="fprgr">Running Hours</option><option value="fplpgr">LinePressure</option><option value="fpwlgr">Water Level</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Firepump1</option><option value="m1">Firepump2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}

		

		}
		
		
	}



	function getSolution(){
		//$("#solution").html("");
		var type = $('input[name="report_type"]:checked').val();
		if(type==0){
			var category = $("#cat").val();
			//air condition
		
		if(category==17){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="44">Firepump</option></select>';
			//var d='<option value="41">Water Level</option>		<option value="42">Line Pressure</option><option value="45">Water Meter</option>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		
		

		}else{
			$("#solution").html("");
			var category = $("#cat").val();
		if(category==17){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="44">Firepump</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		

		}	   

	}
	