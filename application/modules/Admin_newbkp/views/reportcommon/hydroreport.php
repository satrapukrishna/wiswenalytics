<span class="SctnTtl"><?php echo $hydro_data[0]['meter'] ?> Running Hours Report</span>
<table class="RprtTbl">
    <thead>
        <tr> 
            <th rowspan='2' >S. No.</th>
            <th rowspan='2' >Date</th>
            <th colspan='<?php echo count($hydro_data[0]['fire_runn'][0]) ?>' >Meters</th> 
        </tr>        
        <tr>
            <?php for($i=0;$i<count($hydro_data[0]['fire_runn'][0]);$i++){ ?>
                <th><?php echo $hydro_data[0]['fire_runn'][0][$i]['meter'] ?></th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($hydro_data[0]['fire_runn']);$i++){ ?>
            <tr>
                <td ><?php echo $i+1; ?></td>
                <td ><?php echo $hydro_data[0]['fire_runn'][$i][0]['date']."/".date('l', strtotime($hydro_data[0]['fire_runn'][$i][0]['date']));; ?></td>						
                <?php for($j=0;$j<count($hydro_data[0]['fire_runn'][$i]);$j++){  ?>
                    <td><?php echo $hydro_data[0]['fire_runn'][$i][$j]['running_hours']; ?></td>
                <?php }?>               
            </tr>
        <?php }?>
    </tbody>
</table>
