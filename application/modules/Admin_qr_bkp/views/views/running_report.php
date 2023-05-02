
<html>
<head>
    <?php $this->load->view('common/css3') ?>
	<style>
	div.DshMnCtnr div.DshBrdCtnr{		
		overflow-x:hidden;
		overflow-y:auto;
	}
	
img {
vertical-align: middle;
margin-right:10px;}
	</style>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/common-utilits/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" 
            src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> 
    </script> 
	   
<body>
    <div id="MnCtnr" class="DshMnCtnr">	
		<?php $this->load->view('common/left_menu2') ?>
		<?php $this->load->view('common/header2') ?>     
       
       <input type="hidden" name="date" id="date" value="<?php  echo date('Y-m-d');?>">
        <div id="DshbrdRgtCtnr" class="DshBrdCtnr">
            <!-- chillers code starts -->
           <div class="content-wrapper" style="min-height: 100%;margin-left:20px;">
                <section class="content-header">
                  <h1>
                   Chiller Running Hours Report
                  </h1>
                </section>
                <div id="alert"></div>
                <section class="content">
                    <form action="<?php echo site_url("Admin/Home/reports_search/".$device_id)?>" method="post">
                        <div class="row meter-top">
                            <label>Select Meter : </label>
                        
        <select name="multiMeter"  id="multiMeter">
          <?php 
          foreach ($hardware as $value) {
          ?>
            <option value="<?php echo $value; ?>"> 
              <?php echo $value; ?> 
            </option>
          <?php } ?>
        </select> 
                            <select name="fromtime" id="fromtime">
          <option value="Select Hours From">Select Hours From</option>
          <?php 
            $j = 24;$list = "";$options = array();
            for($i=0;$i<=$j ;$i++){
            if($i<10)
            $options[$i] =  "0".$i.":00:00";
            else
            $options[$i] =  $i.":00:00";
            }
            foreach ($options as $value) {
            //$list .= "<option value=".$value.">".$value."</option>";
              if($value == "00:00:00"){
                    $list .= "<option value=".$value." >".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
            }
            echo $list;
          ?>
        </select>

        <select name="totime"  id="totime">
          <option value="Select Hours To">Select Hours To</option>
          <?php 
            $j = 24;$list = "";$options = array();
            for($i=0;$i<=$j ;$i++){
            if($i<10)
            $options[$i] =  "0".$i.":00:00";
            else
            $options[$i] =  $i.":00:00";
            }
            foreach ($options as $value) {
              if($value == "24:00:00"){
                    $list .= "<option value=".$value." >".$value."</option>";
                  }else{
                    $list .= "<option value=".$value.">".$value."</option>";
                  }
            }
            echo $list;
          ?>
        </select>
                            <input type="date"  name="fromdate" id="fromdate" data-placeholder="From Date" required aria-required="true">
                            <input type="date" name="todate" id="todate" data-placeholder="To Date" required aria-required="true">
        <button type="submit" class="btn btn-success">Filter</button>
        <button type="reset" onClick="window.location.reload()" class="btn btn-info">Reset</button>
        <button type="button" class="btn btn-info"  id="export" disabled="true"  onclick="exportTableToExcel('list')">Export</button>
      </div>
        </form>
         <!-- animation starts -->
        <div class="loader" id="loading" style="display: none;"></div>
        <div id="alert" style="margin-left: 400px;color:Red;"></div>

        <!-- animation end -->
               <div id = "tab">
                <table id = "list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Meter</th>
                                <th>Date/Hours</th>
                                <th>Running Hours</th>                                
                            </tr>
                        </thead>
                        <tbody>
						<?php 
						
						if (!empty($running_data)) {
							$i=1;
							foreach($running_data as $row){
								?>
								<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row['Meter']?></td>
								<td><?php echo $row['Time']?></td>
								<td>
								
								<?php 
								$a=$row['runninghrs'];
								$hours = $a/60;
								$minutes = $a % 60;
								echo $hours." Hours ".$minutes." Min";
								?></td>
								</tr>
								<?php
							$i++;
							}
						}							
						?>
							<tr></tr>
                                                          
                        </tbody>
                    </table>

           </div>
           </section>
            <!-- chillers code ends -->
            <!-- cooling towers code starts -->
           

            <!-- cooling tower code ends -->

            <!-- Fire pump code starts -->
            
            <!-- Fire pump code ends -->
            
        </div>
        <?php $this->load->view('common/footer3') ?>
    </div>
        
    </div>
    
</body>

<script type="text/javascript">

function menushow(id){
	$("#subcat"+id).toggle('slow');
}
function reports2(id){
	$("#subreports"+id).toggle('slow');
	return false;
}

$('#reports').click(function(){
	$('#reportsmenu').toggle('slow');
	return false;
});

</html>