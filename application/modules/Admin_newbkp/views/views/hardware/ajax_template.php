<div class="form-group">									   
	<div class="text-center col-md-9 col-md-offset-1 well well-sm no-shadow">
		<div class="form-group"><br/>
		<?php 
		
			if ($template->num_rows()!=0){
				foreach ($template->result() as $row) {  ?>
				
				
				<label class="col-md-3"><?php echo ucfirst(str_replace("_"," ",$row->control_name));?> <span class="required_fields"></span></label>
				 <div class="col-md-3" style="margin-bottom:20px;">
				 
				 <?php if($row->control_type=="dropdown"){
					$a=$row->control_value;
					$b=json_decode($a,TRUE);

				$items = array();
				foreach($b as $key=>$value)
				{
					$items[$value]=$value;
				}

				 echo form_dropdown($row->control_name,$items,'','class="form-control select2"'); ?>
				 <input type="hidden" class="form-control" name="<?php echo $row->control_name?>_id" value="<?php echo $row->temp_id?>"/>
				 
				 <?php }elseif($row->control_type=="textbox"){ ?>
				 
					<input type="text" class="form-control" name="<?php echo $row->control_name?>" value=""/>
					<input type="hidden" class="form-control" name="<?php echo $row->control_name?>_id" value="<?php echo $row->temp_id?>"/>
					
				 <?php }else{?>
					<label class="switch">
					<input type="hidden" class="form-control" name="<?php echo $row->control_name?>_id" value="<?php echo $row->temp_id?>"/>
					  <input type="checkbox" name="<?php echo $row->control_name ?>" checked>
					  <span class="slider round"></span>
					  </label> 
				<?php } ?>
				 </div>
			<?php } }else{
				?>
				<h1>Template Not Created</h1>
				<a href="<?php echo site_url('Admin/Hardware_template/create_hardware_template')?>">Click Here</a> to Create Template
				<?php
			}?>
										  
			</div>  
	</div>  
</div>  