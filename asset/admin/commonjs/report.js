function getReports(){		
		var type = $('input[name="report_type"]:checked').val();
		if(type==0){
			var solution = $("#solution").val();
			//water report start
		
		if(solution==41 ){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==42){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==43){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="mrr">Motor Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Motor1</option><option value="m1">Motor2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==44){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="fprr">Running Report</option><option value="fpsvr">Status View Report</option><option value="fpdrr">DG Running Report</option><option value="fpdfar">DG Fuel Added Report</option><option value="fpcr">Consolidated Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Firepump1</option><option value="m1">Firepump2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if( solution==45){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wtcr">Consumption Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Water Meter1</option><option value="m1">Water Meter2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==46){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="hpsprr">Running Report</option><option value="hpspsvr">Status View Report</option><option value="hpspcr">Consolidated Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">HPS1</option><option value="m1">HPS2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==47){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==48){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="boirr">Boilers Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Boiler 01</option><option value="m1">Boiler 02</option><option value="m1">Boiler 03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}

		//end water report
		
		//air report start
		
		if(solution==62){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="chrn">Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="chrn2">Chiller1</option><option value="chrn3">Chiller2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==63){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="clrun">Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="clrun2">CT Fan1</option><option value="m1">CT Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==64){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="iaqr">IAQ Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">IAQ1</option><option value="iaq2">IAQ2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//air report end
		//air qualty
		if(solution==72){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ter">Toilet Exaust Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Toilet Exaust1</option><option value="m1">Toilet Exaust2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==73){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="vfr">Ventilation Fan Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Ventilation Fan1</option><option value="m1">Ventilation Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end air quality

		//energy report start
		if(solution==51){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ecr">Consumption Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">EM01</option><option value="m1">EM02</option><option value="m1">EM03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==52){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="brr">Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">BTU01</option><option value="m1">BTU02</option><option value="m1">BTU03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==53){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="dgrr">Running Report</option><option value="dgfar">Fuel Added Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">DG1</option><option value="m1">DG2</option><option value="m1">DG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==54){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="uprr">UPS Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">UPS1</option><option value="m1">UPS2</option><option value="m1">UPS3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==55){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="lprr">LPG  Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">LPG1</option><option value="m1">LPG2</option><option value="m1">LPG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==56){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Trip Status1</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end energy report

		}else{
			var solution = $("#solution").val();
		//air report start
		//air condition
		if(solution==61){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ahug">AHU Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">AHU1</option><option value="m1">AHU2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==62){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="chrgr">Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Chiller1</option><option value="m1">Chiller2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==63){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ctgr">Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">CT Fan1</option><option value="m1">CT Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end air condition
		//air quality
		if(solution==71){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="iaqgr">IAQ Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">IAQ1</option><option value="m1">IAQ2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==72){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="teg">Toilet Exaust Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Toilet Exaust1</option><option value="m1">Toilet Exaust2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==73){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="vfg">Ventilation Fan Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Ventilation Fan1</option><option value="m1">Ventilation Fan2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//air quality end
		//water report start
		if(solution==41){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wlgr">Water Level Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="fpdfar">Water Level01</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==42){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="lpgr">LinePressure</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="fpwlgr">LinePressure1</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==43){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="mrgr">Motor Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Motor1</option><option value="m1">Motor2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==44){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="fprgr">Running Hours</option><option value="fplpgr">LinePressure</option><option value="fpwlgr">Water Level</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Firepump1</option><option value="m1">Firepump2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}

		if(solution==45){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wtcrg">Consumption Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Water Meter1</option><option value="m1">Water Meter2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==46){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="hpsprrg">Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">HPS1</option><option value="m1">HPS2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==48){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="boirrg">Boilers Running Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Boiler 01</option><option value="m1">Boiler 02</option><option value="m1">Boiler 03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==49){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="hwtl">Hotwater Tank Level</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">HotwaterTank 01</option><option value="m1">HotwaterTank 02</option><option value="m1">HotwaterTank 03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end water report
		//energy report start
		if(solution==51){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="ecgr">Consumption Graph Report</option><option value="epwgr">Power Factor</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">EM01</option><option value="m1">EM02</option><option value="m1">EM03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==52){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="btrhgr">Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">BTU01</option><option value="m1">BTU02</option><option value="m1">BTU03</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==53){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="dgrgr">Running Graph Report</option><option value="dgfagr">Fuel Added Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">DG1</option><option value="m1">DG2</option><option value="m1">DG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==54){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="upsgr">Running Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">UPS1</option><option value="m1">UPS2</option><option value="m1">UPS3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==55){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="lpggr">LPG  Graph Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
             var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">LPG1</option><option value="m1">LPG2</option><option value="m1">LPG3</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		if(solution==56){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Trip Status1</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end energy report
		//specialized solution
		if(solution==91){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Report</option><option value="wffr">Footfall Report</option><option value="wodr">Odour Report</option><option value="wjr">Janitor Report</option><option value="wfbr">Feedback Report</option></select>';
		   $("#report").html(div);
            $("#report").trigger("chosen:updated");
            var div1='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Device</option><option value="m1">Toilet Exaust1</option><option value="m1">Toilet Exaust2</option></select>';
		   $("#device").html(div1);
            $("#device").trigger("chosen:updated");
		}
		//end specialized

		}
		
		
	}



	function getSolution(){
		//$("#solution").html("");
		var type = $('input[name="report_type"]:checked').val();
		if(type==0){
			var category = $("#cat").val();
			//air condition
		if(category==16){
			//var solution = $("#solution").val();
							
			var div='<select name="device" class="form-control chosen-select" id="device" ><option value="" selected="selected">Select Solution</option>		<option value="62">Chiller</option><option value="63">Cooling Tower</option></select>';
			//var d='<option  value="61">AHU</option><option value="64">IAQ</option>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==17){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="43">Motor Running</option><option value="44">Firepump</option><option value="45">Water Meter</option><option value="46">Hydro Pnematic System</option><option value="47">STP</option><option value="48">Boilers</option></select>';
			//var d='<option value="41">Water Level</option>		<option value="42">Line Pressure</option><option value="45">Water Meter</option>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==18){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="51">Energy Meter</option>		<option value="52">BTU</option><option value="53">DG</option><option value="54">UPS</option><option value="55">LPG</option><option value="56">Trip Status</option><option value="57">Diesel Tank</option><option value="58">Diesel Meters</option></select>';
		//	var d='<option value="56">Trip Status</option>'
			$("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==19){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="71">IAQ</option><option value="72">Toilet Exaust</option><option value="73">Ventilation Fan</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==20){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="81">Lifts</option><option value="82">DG</option><option value="83">Inverter</option><option value="84">Chillers</option><option value="85">Fire Alarm System</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==21){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="91">Washroom Monitoring</option><option value="92">Cold Room</option><option value="93">Floor Wetness</option><option value="94">Door Open/Close</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		

		}else{
			$("#solution").html("");
			var category = $("#cat").val();
		if(category==16){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="61">AHU</option>		<option value="62">Chiller</option><option value="63">Cooling Tower</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}if(category==17){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="41">Water Level</option>		<option value="42">Line Pressure</option><option value="43">Motor Running</option><option value="44">Firepump</option><option value="45">Water Meter</option><option value="46">Hydro Pnematic System</option><option value="47">STP</option><option value="48">Boilers</option><option value="49">Hotwater Tanks</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==18){
			var div='<select name="device" class="form-control chosen-select" id="device" name="device"><option value="" selected="selected">Select Solution</option><option value="51">Energy Meter</option>		<option value="52">BTU</option><option value="53">DG</option><option value="54">UPS</option><option value="55">LPG</option><option value="56">Trip Status</option><option value="57">Diesel Tank</option><option value="58">Diesel Meters</option></select>';
			$("#solution").html(div);
             $("#solution").trigger("chosen:updated");

		}
		if(category==19){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="71">IAQ</option><option value="72">Toilet Exaust</option><option value="73">Ventilation Fan</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==20){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="81">Lifts</option><option value="82">DG</option><option value="83">Inverter</option><option value="84">Chillers</option><option value="85">Fire Alarm System</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}
		if(category==21){
			var div='<select name="device" class="form-control chosen-select" id="device"><option value="" selected="selected">Select Solution</option><option value="91">Washroom Monitoring</option><option value="92">Cold Room</option><option value="93">Floor Wetness</option><option value="94">Door Open/Close</option></select>';
			 $("#solution").html(div);
             $("#solution").trigger("chosen:updated");
		}

		}	   

	}
	