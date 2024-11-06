
<?php //echo print_r($this->session->userdata());die(); ?>
<div id="DshbrdLft" class="DshBrdLnk">
    <div class="BrndHldr">
        <a href="<?php echo site_url('Admin/Home/rainbow_dashboard')?>" ><span class="BrndNm"><?php echo $this->session->userdata('client_name')?></span></a>
    </div>
    <div class="DshBrdLnkCntr">
        <ul class="LnkHldr RnbwLst">
            <li>
                <select class="form-select" aria-label="Default select example" id="drop2">
                    <option value="0">All Locations</option>
                    <option value="1">Rainbow Vikrampuri</option>
                    <option value="2">Rainbow Kondapur</option>
                    
                </select>
            </li>
            <li>
                <select class="form-select" aria-label="Default select example" id="drop3">
                    <option value="0">All Services</option>
                    <option value="1">Water</option>
                    <option value="2">Energy</option>
                    <option value="3">Air Conditioning</option>
                    <!-- <option value="4">Medical Gas</option>
                    <option value="5">Occupancy</option>
                    <option value="6">In Patient</option>
                    <option value="7">Out Patient</option> -->
                </select>
            </li>
            <li>
                <button type="button" onclick="getdata()" class="btnRnbw btn-primary">Go</button>
            </li>
        </ul>
    </div>
</div>
<style>
    ul.LnkHldr.RnbwLst {
        padding: 15px 0 !important;
    }

    ul.LnkHldr.RnbwLst li {
        padding: 10px 15px;
        border: none !important;
    }

    ul.LnkHldr.RnbwLst li .form-select {
        width: 100%;
        padding: 15px;
        border: none;
        font: 600 14px 'Open Sans';
        color: #444;
        border-radius: 5px;
    }

    ul.LnkHldr.RnbwLst li .btnRnbw {
        width: 100%;
        padding: 15px;
        border: none;
        font: 600 16px 'Open Sans';
        color: #fff;
        border-radius: 5px;
    }
</style>
<script>
    function getdata(){
        var value1 = $('#drop2').val();
        var value2 = $('#drop3').val();
        if(value1 ==0 && value2 ==0){
            var url = '<?php echo base_url()."Admin/Home/rainbow_water?id=3&loc=0";?>'; 
            window.location = url; 
        }else if(value1 ==0 && value2 ==1){
            var url = '<?php echo base_url()."Admin/Home/rainbow_energy?id=3&loc=1";?>'; 
            window.location = url;
        }else if(value1 ==0 && value2 ==2){
            var url = '<?php echo base_url()."Admin/Home/rainbow_energy?id=3&loc=2";?>'; 
            window.location = url;
        }else if(value1 ==0 && value2 ==3){
            var url = '<?php echo base_url()."Admin/Home/aircondition_rainbow?id=3&loc=2";?>'; 
            window.location = url;
        }else if(value1 ==1 && value2 ==0){
            var url = '<?php echo base_url()."Admin/Home/rainbow_water?id=1&loc=1";?>'; 
            window.location = url;
        }else if(value1 ==1 && value2 ==1){
            var url = '<?php echo base_url()."Admin/Home/rainbow_water?id=1&loc=1";?>'; 
            window.location = url;
        }else if(value1 ==1 && value2 ==2){
            var url = '<?php echo base_url()."Admin/Home/rainbow_energy?id=1&loc=1";?>'; 
            window.location = url;
        }else if(value1 ==1 && value2 ==3){
            var url = '<?php echo base_url()."Admin/Home/aircondition_rainbow?id=1&loc=1";?>'; 
            window.location = url;
        }else if(value1 ==2 && value2 ==0){
            var url = '<?php echo base_url()."Admin/Home/rainbow_water?id=2&loc=2";?>'; 
            window.location = url;
        }else if(value1 ==2 && value2 ==1){
            var url = '<?php echo base_url()."Admin/Home/rainbow_water?id=2&loc=2";?>'; 
            window.location = url;
        }else if(value1 ==2 && value2 ==2){
            var url = '<?php echo base_url()."Admin/Home/rainbow_energy?id=2&loc=2";?>'; 
            window.location = url;
        }else if(value1 ==2 && value2 ==3){
            var url = '<?php echo base_url()."Admin/Home/aircondition_rainbow?id=2&loc=2";?>'; 
            window.location = url;
        }

    }
    
    </script>