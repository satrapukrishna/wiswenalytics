<?php //echo "jjj";die();?>
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/StyleSheet_wmd.css">
  <style>
	
	input[type="checkbox"][readonly] {
  pointer-events: none;
}
	</style>
<body >	
    <div id="MnCtnr" class="DshMnCtnr">
		
		<?php $this->load->view('common/left_menu3') ?>
		<?php $this->load->view('common/header2') ?>
		
       
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr style-2">
		<div class="DshBrdSctn">
		<input type="hidden" id="page" value="water" />
		
		</div>
        
		
		<div class="WtrMngtDshHldr">
        <div class="DshBrdSctn" >
                <!-- <div class="DshBrdSctnTtl" id="water">
                    <span class="TxtTtl imageadd"><img src="<?php echo site_url() ?>asset/demoforall/Images/water-level.png" width="30" />Water Management Dashboard</span>
					
                    <?php /*<span class="SctnVw Cllps" id="Bwcollapse"></span>*/?>
					<span class="SctnVw Cllps dev" onclick="device(555)" id="device555"></span>
					<span class="Cllps FA SctnVwAll deviceall col" onclick="deviceall()"></span>
					
                </div> -->
        <!-- <div class="WtrMngtSrchSctn">
            <ul class="SrchBx">
                <li>
                    <span class="SrchTxtTtl">Today</span>
                    <span class="SrchTxt">10 August 2021</span>
                </li>
                <li>
                    <input type="text" class="Inpt Clndr" />
                </li>
                <li class="BtnHldr">
                    <input type="button" class="InptBtn" value="Submit" />
                </li>
            </ul>
        </div> -->
        <?php if($this->session->flashdata('msg') != ''){
            ?>
            <div style="width:100%;padding:10px;color:#fff;background:green">
            <?php
            echo $this->session->flashdata('msg');
?>
</div>
<?php
        } 
 ?>
 
        <div class="WtrMngtDshHldr">
            
        <div class="RprtHdr">
            <span class="TtlTxt">Water Meter Schedules<a href="<?php echo site_url('Admin/Home/addwatermeter') ?>" id="Button1" class="TtlBtn"   >Create New </a></span>
        </div>
        <form action="<?php echo site_url("Admin/Home/waterMeterList")?>" method="post" >
        <div class="WtrMngtSrchSctn">
            <ul class="SrchBx">
                <li>
                    <span class="SrchOnlyTxtTtl">Water Meter</span>
                </li>
                <li>
                <?php echo form_dropdown('hardware', $hardwares, $this->input->post('hardware'), 'class="Inpt" id="hardware"'); ?>
                    
                </li>
                <li class="BtnHldr">
                    <input type="submit" class="InptBtn" value="Filter"  />
                </li>
            </ul>
        </div>
        </form>
        <div class="SttngsMnDv">
            <table class="SttngsDtlsTbl">
                <tr>
                    <th>S. No.</th>
                    <th>Water Meter</th>
                    <th>Schedule</th>
                    <th>Time Range</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php for ($i=0; $i < count($meters); $i++) { 
                    
                ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $meters[$i]['dashboard_name']; ?></td>
                    <td><?php echo $meters[$i]['schedule']; ?></td>
                    <td><?php echo $meters[$i]['from_reading']." To ".$meters[$i]['to_reading']; ?></td>
                    <td><a href="<?php echo site_url("Admin/Home/editschedule/".$meters[$i]['schedule_id'])?>" class="LnkTxt">Edit</a></td>
                   
                    <td> <a style="cursor:pointer" type="button" onclick="removeSchedule(<?php echo $meters[$i]['schedule_id']; ?>)" class="LnkTxt" title="Delete">Delete</a></td>
                </tr>
                <?php } ?>
                
            </table>
        </div>
    </div>
    </div>
 </div>
        
</div>
        
    </div>
		
        <?php $this->load->view('common/footer3') ?>
            
        </div>
    </div>
   
	 
  
</div>

</body>


<script>
function filterSchedule(){
    var meter = $("#hardware").val();
    $.ajax({
				url: BASE_URL+'Admin/Home/filter_schedule/',
                type: 'GET',
				data: {
                    meterid:meter
                },
				success: function(data){
					if(data == 1){
						//$("#dp"+id).fadeOut();
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
    

}
function removeSchedule(id){
		var ans = confirm("Do you want delete this?");
		if(ans){
			$.ajax({
				url: BASE_URL+'Admin/Home/remove_schedule/'+id,
				dataType: 'text',
				success: function(data){
					if(data == 1){
						//$("#dp"+id).fadeOut();
						location.reload();
					}else{
						alert("Unable to delete this. Please try again later");
					}
				}
			});
		}
	}

	

 </script>	
</html>

