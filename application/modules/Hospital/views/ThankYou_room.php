<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Thank You</title>
    <meta name="ROBOTS" content="INDEX, FOLLOW" />
    <meta name="description" content="Elevate your routine with curated lifestyle events that empower you to forge new connections." />
    <meta name="keywords" content="Special Curated Events, More to Life, Life is now" />
    <meta name="author" content="JOYiZM" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500&family=Noto+Sans+Telugu:wght@400;600&family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/hospital/CSS/StyleSheet.css" type="text/css" />
</head>
<body>
    <div class="Container ThankYou">
        <div class="ThankYouDetails">
            <span class="ThankText">Thank You!</span>
            <span class="ThankSubText">We have noted your complaint.</span>
            <span class="ThankSubText">You complaint issued for:</span>
            <div class="FullThankDetails">
                <?php if($data['flexRadioDefault']=='Too Hot'){  ?>
                    
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-HeatingCooling.svg" class="CatImg" />
                    <span class="CatTtl">Heating/ Cooling</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Temperature Too Hot</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Too Cold'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-HeatingCooling.svg" class="CatImg" />
                    <span class="CatTtl">Heating/ Cooling</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Temperature Too Cool</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Dirty Floor'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Dirty Floor</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Dirty Bedsheet'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Dirty Bedsheet</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Room Stinking'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Room Stinking</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Wet Floor'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Wet Floor</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Dustbin Full'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Dustbin Full</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Dustbin not available'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Dustbin not available</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Toilet Not Clean'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Toilet Not Clean</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Wet Floor in Toilet'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                    <span class="CatTtl">Cleanliness</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Wet Floor in Toilet</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='No water in Washroom'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Water.svg" class="CatImg" />
                    <span class="CatTtl">Water</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">No water in Washroom</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Water Leaking in Washroom'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Water.svg" class="CatImg" />
                    <span class="CatTtl">Water</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Water Leaking in Washroom</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='No Drinking Water'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-DrinkingWater.svg" class="CatImg" />
                    <span class="CatTtl">Drinking Water</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">No Drinking Water</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Dirty Drinking Water'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-DrinkingWater.svg" class="CatImg" />
                    <span class="CatTtl">Drinking Water</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Dirty Drinking Water</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='No Glass/ Clean Glass'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-DrinkingWater.svg" class="CatImg" />
                    <span class="CatTtl">Drinking Water</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">No Glass/ Clean Glass</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Fan not working'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Equipment.svg" class="CatImg" />
                    <span class="CatTtl">Equipment</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Fan not working</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Light Not working'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Equipment.svg" class="CatImg" />
                    <span class="CatTtl">Equipment</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Light Not working</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Damaged Bed'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Damages.svg" class="CatImg" />
                    <span class="CatTtl">Damages</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Damaged Bed</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Damaged Wheelchair'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Damages.svg" class="CatImg" />
                    <span class="CatTtl">Damages</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Damaged Wheelchair</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Damaged Switch Board'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Damages.svg" class="CatImg" />
                    <span class="CatTtl">Damages</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Damaged Switch Board</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Damaged Door'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Damages.svg" class="CatImg" />
                    <span class="CatTtl">Damages</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Damaged Door</span>
                </div>
                <?php } else if($data['flexRadioDefault']=='Damaged Door Lock'){?>
                <div class="CatTtlDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Damages.svg" class="CatImg" />
                    <span class="CatTtl">Damages</span>
                </div>
                <div class="ComplntSlctdDv">
                    <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Tick.svg" class="SlctdImg" />
                    <span class="SlctdTtl">Damaged Door Lock</span>
                </div>
               
                <?php }?>
                <div class="PrsnlDtlsDv">
                    <span class="TxtTtl">Your Name:</span>
                    <span class="Txt"><?php echo $data['name'] ?></span>
                    <span class="TxtTtl">Your Contact No.:</span>
                    <span class="Txt"><?php echo $data['phone'] ?></span>
                    <span class="TxtTtl">Patient ID:</span>
                    <span class="Txt"><?php echo $data['pid'] ?></span>
                    <span class="TxtTtl">Your Comment:</span>
                    <span class="Txt"><?php echo $data['cmnts'] ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="BtnHldr">
        <a href="<?php echo base_url(); ?>Hospital/room/1" class="FlowButton">Raise another complaint</a>
    </div>
    <div class="Footer">
        <span class="FtrTxt">2021. WIS Spaces</span>
    </div>
</body>
</html>