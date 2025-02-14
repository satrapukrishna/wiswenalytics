﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Water</title>
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
    <div class="Header InnrPg">
        <div class="LocationDetails">
            <div class="BackBtnHldr">
                <a href="Scan-Eng.html" class="BackBtn"></a>
            </div>
            <div class="LocationText">
                <span class="AreaName">Male Washroom - 1</span>
                <span class="AreaFullDetails">Floor 2, Block - A, ESIC Hospital</span>
            </div>
        </div>
    </div>
    <div class="Container InnrPg">
    <form name="myForm" action="<?php echo site_url("Hospital/submit_issue")?>" onsubmit="return validateForm()" method="post">
        <div class="ComplaintDetails">
            <div class="CatTtlDv">
                <img src="<?php echo base_url(); ?>asset/hospital/Images/Icn-Water.svg" class="CatImg" />
                <span class="CatTtl">Water</span>
            </div>
            <span class="SelectIssTxt">Please select issue</span>
            <div class="IssusHldr">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="No water in Washroom">
                    <label class="form-check-label" for="flexRadioDefault1">
                        No water in Washroom
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Water Leaking in Washroom">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Water Leaking in Washroom
                    </label>
                </div>
            </div>
            <div class="PersonalDetailsHldr">
            <div class="InptHldr">
                    <input type="text" class="Inpt" id="name" name="name" placeholder="Name" />
                </div>
                <div class="InptHldr">
                    <input type="text" class="Inpt" id="phone" name="phone" placeholder="Contact No." />
                </div>
                <div class="InptHldr">
                    <input type="text" class="Inpt" id="pid" name="pid" placeholder="Patient ID" />
                </div>
                <div class="InptHldr">
                    <input type="text" class="Inpt"  id="cmnts" name="cmnts" placeholder="Your comments" />
                </div>
            </div>
            
        </div>
    </div>
    <div class="BtnHldr">
    <input type="submit" class="FlowButton1" value="Submit" />
    </div>
</form>
    <div class="Footer">
        <span class="FtrTxt">© 2021. WIS Spaces</span>
    </div>
</body>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript">
    function validateForm(){
        if($('input[name="flexRadioDefault"]:checked').length ==0){
            alert('Please Select Issue');
            return false;
       }else{
        
            return true;
       }

        
    }
</script>
</html>