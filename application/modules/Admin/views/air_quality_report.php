<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS - Indoor Air Quality</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/protechs/AppTheme/CmplntMngmntMdl/MdlTheme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/protechs/AppTheme/Fonts/IconFont.css" />
    <style>
        #error {
	background: #ff0000;
    color: #ffff;

}
        </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php $this->load->view('protech/header')?>
<?php $this->load->view('protech/footer')?>
<?php $this->load->view('protech/leftmenu')?>
    <div class="AppMstrCntnr">
    <div class="GnPgHdrDvHldr">
            <div class="TtlHldr">
                <span class="PgTtl">Reports</span>
            </div>
        </div>
        <div class="GnPgCntntDvHldr">
            <form name="reports" id="myForm" action="<?php echo site_url("Admin/Home/protech_reports")?>" method="post" onSubmit="return formValidation();">
            <div class="FormHldr Search">
                <div class="row">
                    <div class="col-1">
                        <div class="FormCheck">
                            <input class="RadioInput" id="typec" name="report_type" value="0" type="radio" onchange="getCatagory('0')" checked>
                            <label>Tabular</label>
                        </div>
                        <div class="FormCheck">
                            <input class="RadioInput" id="typed" name="report_type" value="1" type="radio" onchange="getCatagory('1')">
                            <label>Graphical</label>
                        </div>
                        
                    </div>
                </div>
                <div class="row NoBG BrdrTp">
                    <div class="col-6">
                    <?php echo form_dropdown('category', $category, $this->input->post('category'), 'class="Input" onchange="getsolutions()" name="cat" id="category"'); ?>
                    </div>
                    <div class="col-6">
                    <?php echo form_dropdown('device', $solution, $this->input->post('device'), 'class="Input" id="solution" onchange="getdevices()"'); ?>
                    </div>
                    <div class="col-6">
                        <input class="Input" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo set_value('fromdate') ?>"  name="fromdate" id="fromdate" placeholder="From Date">
                    </div>
                    <div class="col-6">
                    <input class="Input" onfocus="(this.type='date')" value="<?php echo set_value('todate') ?>" type="text" name="todate" id="todate" placeholder="To Date">
                        
                    </div>
                    
                </div>
                <div class="row NoBG BrdrTp">
                    <div class="col-1">
                        <button type="submit" class="AppBtn">Filter</button>
                        <a href="<?php echo site_url('Admin/Home/protech_reports') ?>" class="AppBtn Scndry">Reset</a>
                        <input type="button" class="AppBtn Scndry" onclick="printDiv('content')" value="Export" />
						<input type="button"  class="AppBtn Scndry" name="exporttbl" id="exporttbl" onclick="exportTableToExcel('content')" value="ExportToExcel" />
                        <a class="AppBtn Scndry hide_button search_box" >Hide Search Box</a>
                        <a class="AppBtn Scndry change_search show_button hide_button" style="background:#fff;color:#3c8dbc;display:none;margin-left:4px">Change Search Fields</a>	
                       
                    </div>
                </div>
            </div>
            </form>
            <span id="error"></span>
            <div class="InnrCntntHldr">
                <div class="FormHldr" id="content">
                    <div class="row NoBG">
                        <div class="col-1">
                            <table class="AppGenTable NoMrgnTop">
                                <thead>
                                    <tr>
                                        <th>Column Head One</th>
                                        <th>Column Head Two</th>
                                        <th>Column Head Three</th>
                                        <th>Column Head Four</th>
                                        <th>Column Head Five</th>
                                        <th>Column Head Six</th>
                                        <th>Column Head Seven</th>
                                        <th>Column Head Eight</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                    <tr>
                                        <td>Column One</td>
                                        <td>Column Two</td>
                                        <td>Column Three</td>
                                        <td>Column Four</td>
                                        <td>Column Five</td>
                                        <td>Column Six</td>
                                        <td>Column Seven</td>
                                        <td>Column Eight</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="<?php echo base_url(); ?>asset/protechs/Js/index.js"></script>
<script>
    function getCatagory(type){
		
		if (type==0) {	 
			
			$('#tabular').show();
			$('#graphical').hide();
			$('.graph-data').hide();
            $('.tablular-data').show();
            $('#loader').hide();
            $('#exporttbl').show();
		
		}else{
			
			$('#tabular').hide();
			$('#graphical').show();
			$('.graph-data').show();
            $('.tablular-data').hide();
            $('#loader').hide();
            $('#exporttbl').hide();

	
		}
	}
    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Report.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function formValidation()
{
var category = $("#category").val();
var solution = $("#solution").val();
var fromdate = $("#fromdate").val();
var todate = $("#todate").val();
// alert(multiMeter);return false;
if(category==''){
	$('#error').html("plaese select Category");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(solution==''){
	$('#error').html("plaese select solution");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(fromdate==''){
	$('#error').html("plaese select From Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}else if(todate==''){
	$('#error').html("plaese select To Date");
	$('.search_box').show();
	$('.show_button').show();
	$('.change_search').hide();
	return false;	
}


$('#loader').show();


return true;
}
</script>
</body>
</html>