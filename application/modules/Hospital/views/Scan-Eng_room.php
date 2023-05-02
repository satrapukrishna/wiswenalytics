<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Scan</title>
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
    <div class="Header">
        <div class="LocationDetails">
            <div class="LocationText">
                <span class="AreaName">Waiting Hall - 1</span>
                <span class="AreaFullDetails">Floor 2, Block - A, ESIC Hospital</span>
            </div>
        </div>
        <div class="LanguageOptns">
            <a href="<?php echo base_url(); ?>Hospital/room/1" class="LanguageOptns Actv">English</a>
            <a href="<?php echo base_url(); ?>Hospital/room/2" class="LanguageOptns Tel">తెలుగు</a>
            <a href="<?php echo base_url(); ?>Hospital/room/3" class="LanguageOptns Hin">हिंदी</a>
        </div>
    </div>
    <div class="Container">
        <div class="ComplaintSelection">
            <span class="PgTtl">Please select from below to raise complaint</span>
            <div class="ComplaintCategories">
                <div class="CategoryHolder">
                    <a href="<?php echo base_url(); ?>Hospital/heat_cool_room" class="CatLink">
                        <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-HeatingCooling.svg" class="CatImg" />
                        <span class="CatName">Heating/ Cooling</span>
                    </a>
                </div>
                <div class="CategoryHolder">
                    <a href="<?php echo base_url(); ?>Hospital/clean_room" class="CatLink">
                        <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Cleanliness.svg" class="CatImg" />
                        <span class="CatName">Cleanliness</span>
                    </a>
                </div>
                <div class="CategoryHolder">
                    <a href="<?php echo base_url(); ?>Hospital/water_room" class="CatLink">
                        <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Water.svg" class="CatImg" />
                        <span class="CatName">Water</span>
                    </a>
                </div>
                <div class="CategoryHolder">
                    <a href="<?php echo base_url(); ?>Hospital/equipment_room" class="CatLink">
                        <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Equipment.svg" class="CatImg" />
                        <span class="CatName">Equipment</span>
                    </a>
                </div>
                <div class="CategoryHolder">
                    <a href="<?php echo base_url(); ?>Hospital/damages_room" class="CatLink">
                        <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Damages.svg" class="CatImg" />
                        <span class="CatName">Damages</span>
                    </a>
                </div>
                <div class="CategoryHolder">
                    <a href="<?php echo base_url(); ?>Hospital/drinking_room" class="CatLink">
                        <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-DrinkingWater.svg" class="CatImg" />
                        <span class="CatName">Drinking Water</span>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="Footer">
        <span class="FtrTxt">© 2021. WIS Spaces</span>
    </div>
</body>
</html>