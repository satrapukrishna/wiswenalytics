   $('.BranchAccess .Access').on('click', function() {
        $(this).toggleClass('Inactive', 'Access');
    });

    


$(".AddButton").click(function () {
    $(this).hide();
    var newitemm = '<table class="AppGenTable"><tbody><td><div class="FormHldr"><div class="row inputInsert" ><div class="col-5"><input type="text" name="mytext_1"  class="Input" placeholder="Add Level 1 Category Name"></div><div class="col-3" id="Skill_Buttons_1" style="align-items: center;display: contents;" ><a href="#" class="Lnk Icn WISIcn-AddSolid addmore"  >Add more</a><input type="file" class="file_id" style="display: none;" onchange="readCSVFile(this)" ><a href="#" class="Lnk Icn WISIcn-Upload addmulti" >Add multiple using file</a><input type="hidden" id="mytext_status_1" name="mytext_status_1" value="1"></div></div><div id="fileaddedrows"></div><input type="hidden" id="SkillCount" name="SkillCount" value="1"><div class="row"><div class="col-1"><button type="submit" class="AppBtn savebtn">Save</button><button type="submit" class="AppBtn Scndry">Cancel</button></div></div></div></td></tbody></table>';
    $(this).parent().after(newitemm);
});
$('body').on('click', '.Scndry', function () {
    $(this).closest('.AppGenTable').prev('.BranchDetails').find('.AddButton').show();
    $(this).closest('.AppGenTable').remove();
});
$('body').on('click', '.savebtn', function () {
    $(this).closest('.AppGenTable').prev('.BranchDetails').find('.AddButton').show();
    $(this).closest('.AppGenTable').remove();
});
$('body').on('click', '.addmore', function () {
    $(this).hide();
    $(this).closest('.AppGenTable').find('.addmulti').hide();
    var newRow = '<div class="row inputInsert" ><div class="col-5 "><input type="text" name="mytext_1"  class="Input" placeholder="Add Level 1 Category Name"></div><div class="col-3"  style="align-items: center;display: contents;" ><a href="#" class="Lnk Icn WISIcn-RemoveSolid remove_btn removebutton"  >Remove</a><a href="#" class="Lnk Icn WISIcn-AddSolid addmore"  >Add more</a><input type="file" class="file_id" style="display: none;" onchange="readCSVFile(this)" ><a href="#" class="Lnk Icn WISIcn-Upload addmulti">Add multiple using file</a><input type="hidden" id="mytext_status_1" name="mytext_status_1" value="1"></div></div>';
    $(this).closest('.inputInsert').last('div').after(newRow);

});
$('body').on('click', '.addmulti', function () {
    $(this).prev('.file_id').click();
});
$('body').on('click', '.removebutton', function () {

    var parent_ele = $(this).closest('.inputInsert').parent('.FormHldr');

    $(this).closest('.inputInsert').remove();
    parent_ele.children('.inputInsert').last('.inputInsert').find('.addmore').show();
    parent_ele.children('.inputInsert').last('.inputInsert').find('.addmulti').show();
});

function readCSVFile(item) {
    var files = item.files;
    if (files.length > 0) {
        // Selected file
        var file = files[0];

        // FileReader Object
        var reader = new FileReader();

        // Read file as string 
        reader.readAsText(file);

        // Load event
        reader.onload = function (event) {

            // Read file data
            var csvdata = event.target.result;

            // Split by line break to gets rows Array
            var rowData = csvdata.split('\n');
            var setting = Number(rowData.length) - 1;
            var i = 1;
            var item_ini_count = $(item).closest('.FormHldr').find('.inputInsert').length;
            if(item_ini_count == 1){
                var coldata = rowData[1].split(',');
                $(item).closest('.FormHldr').find('.inputInsert:first-child .Input').val(coldata);
                i = 2;
            }
            var newitem = '';
            for (i; i < setting; i++) {
                var coldata = rowData[i].split(',');
                newitem += '<div class="row inputInsert" ><div class="col-5 "><input type="text" name="mytext_1"  class="Input" placeholder="Add Level 1 Category Name" value="' + coldata + '"></div><div class="col-3"  style="align-items: center;display: contents;" ><a href="#" class="Lnk Icn WISIcn-RemoveSolid remove_btn removebutton">Remove</a><a href="#" class="Lnk Icn WISIcn-AddSolid addmore"  >Add more</a><input type="file" class="file_id" style="display: none;" onchange="readCSVFile(this)" ><a href="#" class="Lnk Icn WISIcn-Upload addmulti">Add multiple using file</a><input type="hidden" id="mytext_status_1" name="mytext_status_1" value="1"></div></div>';
            }
            $(item).closest('.inputInsert').after(newitem);
            var parent_ele = $(item).closest('.inputInsert').parent('.FormHldr');
            parent_ele.find('.addmore, .addmulti').hide();
            parent_ele.children('.inputInsert').last('.inputInsert').find('.addmore, .addmulti').show();
        };
    } else {
        alert("Please select a file.");
    }
    $(item).val('');
}

