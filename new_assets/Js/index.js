var BaseURL = $("#BaseURL").val();
//Common Functions
function change_status(Item, Module, Status, Id){
    var data = {
        "ModuleName" : Module,
        "RowID" : Id,
        "Status" : (Status == 0) ? 1 : 0
    }
    $.ajax({
        type: 'POST',
        url: BaseURL+"/change_status",
        data: data,
        beforeSend: function(){
            $(".Loading").show();
        },
        success: function(data) {
            if(data == 1)
                $(Item).toggleClass('Inactive', 'Access');
        },
        complete:function(data){
            $(".Loading").hide();
        }
    });
}
function delete_data(Item, Module, Id){
    var data = {
        "ModuleName" : Module,
        "RowID" : Id
    }
    $.ajax({
        type: 'POST',
        url: BaseURL+"/delete_data",
        data: data,
        beforeSend: function(){
            $(".Loading").show();
        },
        success: function(data) {
            if(data == 1){
                if(Module == 'AssetFiles'){
                    $(Item).parent('.UpldFile').remove(); 
                }else{
                    location.reload();
                }
            }
        },
        complete:function(data){
            $(".Loading").hide();
        }
    });
}
$('body').on('click', '.ArrowBtn', function() {
    if($(this).closest('.AppGenTable').find('td form:visible').length > 0 && $(this).closest('.AppGenTable').find('td form:visible').find('input[type="text"]').val() != ''){
        var cfrm = confirm("You have unsaved changed on this block. Once you close it, your changes will be lost. Do you wish to continue ?");
        if (cfrm == true) {
            $('.MainForm').remove();
            $(this).closest('.BranchDetails').nextAll('.AppGenTable').toggle();
            $(this).toggleClass("Actv");
            $('.AddButton').show();
        }
    }else{
        $('.MainForm').remove();
        $(this).closest('.BranchDetails').nextAll('.AppGenTable').toggle();
        $(this).toggleClass("Actv");
        $('.AddButton').show();
    }
});
$("body").on("click", ".WISIcn-Cross-Big", function() {
    $(this).parent('.GenMsg').hide();
});
$('body').on('click', '.ToggleBtn', function() {
    if($(this).hasClass('WISIcn-Expand')){
        $(this).closest('tr').find('.AppGenTable').show();
        $(this).closest('tr').find('.ArrowBtn').addClass('Actv');
        $(this).removeClass('WISIcn-Expand').addClass('WISIcn-Collapse');
    }else{
        $(this).closest('tr').find('.AppGenTable').hide();
        $(this).closest('tr').find('.ArrowBtn').removeClass('Actv');
        $(this).removeClass('WISIcn-Collapse').addClass('WISIcn-Expand');
    }
});
$.validator.addMethod("regex", function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
});

$.validator.addMethod("ValidEmail", function(value, element) { 
    return this.optional(element) || /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
}, "Please Enter Valid Email.");

$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param * 1000000)
}, 'File size must be less than {0} MB');

$.validator.addMethod('filesizeinkb', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param * 1000)
}, 'File size must be less than {0} KB');

$('body').on('click', '.UpdateProfileModalBtn', function() {
    $('.UpdateProfileModal .InnrCntntHldr').animate({
        'scrollTop': 0
    });
    if ($(this).hasClass("Close")) {
        $(".UpdateProfileModal").hide();
    }else{
        $.ajax({
            type: 'GET',
            url: BaseURL+"/GetUserProfile",
            beforeSend: function() {
                $(".Loading").show();
            },
            success: function(data) {
                var Result = JSON.parse(data);
                if (Result.Status == 1) {
                    data = Result.Data;
                    $('[name="EmployeeId"]').val(data.Basic[0].UserID);
                    $('[name="FirstName"]').val(data.Basic[0].Firstname);
                    $('[name="LastName"]').val(data.Basic[0].Lastname);
                    $('[name="MobileCountryCode"]').val(data.Basic[0].MobileCountryID + '###' + data.Basic[0].MobileCountryCode);
                    $('[name="Mobile"]').val(data.Basic[0].Mobile);
                    $('[name="EmergencyMobileCountryCode"]').val(data.Basic[0].EmergencyMobileCountryID + '###' + data.Basic[0].EmergencyMobileCountryCode);
                    $('[name="EmergencyMobile"]').val(data.Basic[0].EmergencyMobile);

                    if (data.Basic[0].IsWhatsappNumberSameAsMobileNumber == 1) {
                        $('[name="IsWhatsappNumberSameAsMobileNumber"]').prop('checked', true);
                        $('.WhtApDtls').hide();
                        $('[name="WhatsAppMobileCountryCode"]').val($('[name="WhatsAppMobileCountryCode"] option:first').val());
                        $('[name="WhatsAppMobile"]').val('');
                    } else {
                        $('[name="IsWhatsappNumberSameAsMobileNumber"]').prop('checked', false);
                        $('.WhtApDtls').show();
                        $('[name="WhatsAppMobileCountryCode"]').val(data.Basic[0].WhatsAppMobileCountryID + '###' + data.Basic[0].WhatsAppMobileCountryCode);
                        $('[name="WhatsAppMobile"]').val(data.Basic[0].WhatsAppMobile);
                    }
                    $('[name="Email"]').val(data.Basic[0].Email);
                    $('[name="EmpCode"]').val(data.Basic[0].Username);
                    $('[name="DOB"]').val(data.Basic[0].DOB);
                    $('[name="Gender"]').val(data.Basic[0].Gender);
                    $('[name="OldProfilePic"]').val(data.Basic[0].ProfilePic);
                    if (data.Basic[0].ProfilePic != '') {
                        $('.OldProfilePic').attr('src', BaseURL+'/uploads/employees/profilepics/' + data.Basic[0].ProfilePic).show();
                    }

                    if (data.EmployeeAddress.length > 0) {
                        $('[name="PresentLine1"]').val(data.EmployeeAddress[0].AddressLine1);
                        $('[name="PresentLine2"]').val(data.EmployeeAddress[0].AddressLine2);
                        $('[name="PresentCountry"]').val(data.EmployeeAddress[0].CountryID);

                        $('[name="PresentZipcode"]').val(data.EmployeeAddress[0].Zipcode);
                        if (data.EmployeeAddress[0].EmployeeDocs.length > 0 && data.EmployeeAddress[0].EmployeeDocs.length > 0) {
                            $('[name="OldPresentDocName"]').val(data.EmployeeAddress[0].EmployeeDocs[0].FileName);
                            if (data.EmployeeAddress[0].EmployeeDocs[0].FileName != '') {
                                $('.OldPresentDocName').attr('src', BaseURL+'/uploads/employees/documents/' + data.EmployeeAddress[0].EmployeeDocs[0].FileName).show();
                            }
                        }
                        if (data.EmployeeAddress[0].IsPresentAddressSameAsPermanentAddress == 1) {
                            $('[name="IsPresentAddressSameAsPermanentAddress"]').prop('checked', true);
                            $(".PermanentAddressDetails").hide();
                            $('[name="PermanentLine1"], [name="PermanentLine2"], [name="PermanentZipcode"], [name="OldPermanentDocName"]').val('');
                            $('[name="PermanentCountry"], [name="PermanentState"], [name="PermanentCity"], [name="PermanentDocType"]').val(0);
                        } else {
                            if (typeof(data.EmployeeAddress[1]) != "undefined" && data.EmployeeAddress[1] !== null) {
                                $('[name="PermanentLine1"]').val(data.EmployeeAddress[1].AddressLine1);
                                $('[name="PermanentLine2"]').val(data.EmployeeAddress[1].AddressLine2);
                                $('[name="PermanentCountry"]').val(data.EmployeeAddress[1].CountryID);
                                $('[name="PermanentZipcode"]').val(data.EmployeeAddress[1].Zipcode);
                                if (data.EmployeeAddress[1].EmployeeDocs.length > 0) {
                                    $('[name="OldPermanentDocName"]').val(data.EmployeeAddress[1].EmployeeDocs[0].FileName);
                                    if (data.EmployeeAddress[1].EmployeeDocs[0].FileName != '') {
                                        $('.OldPermanentDocName').attr('src', BaseURL+'/uploads/employees/documents/' + data.EmployeeAddress[1].EmployeeDocs[0].FileName).show();
                                    } else {
                                        $('.OldPermanentDocName').attr('src', '').hide();
                                    }
                                }
                                GetProfileStatesAndUserDocumentTypes(data.EmployeeAddress[1].CountryID, 'PermanentState', 'PermanentDocType', data.EmployeeAddress[1].StateID, (typeof(data.EmployeeAddress[1].EmployeeDocs) != "undefined" && data.EmployeeAddress[1].EmployeeDocs !== null) ? data.EmployeeAddress[1].EmployeeDocs[0].UserDocumentTypeID : '');
                                GetProfileCities(data.EmployeeAddress[1].StateID, 'PermanentCity', data.EmployeeAddress[1].CityID);
                            }
                            $(".PermanentAddressDetails").show();
                        }
                        GetProfileStatesAndUserDocumentTypes(data.EmployeeAddress[0].CountryID, 'PresentState', 'PresentDocType', data.EmployeeAddress[0].StateID, (data.EmployeeAddress[0].EmployeeDocs.length > 0) ? data.EmployeeAddress[0].EmployeeDocs[0].UserDocumentTypeID : '');
                        GetProfileCities(data.EmployeeAddress[0].StateID, 'PresentCity', data.EmployeeAddress[0].CityID);
                    }
                } else {
                    $(".UpdateProfileModal .PopUpMsg .MsgTxt").html(data.Data);
                    $(".UpdateProfileModal .PopUpMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
                $(".UpdateProfileModal").show();
            }
        });
    }
});

//Toggle Permanent Address Block
$('body').on('click', '.UpdateProfileModal [name="IsPresentAddressSameAsPermanentAddress"]', function() {
    if ($(this).prop('checked') == true) {
        $(".UpdateProfileModal .PermanentAddressDetails").hide();
    } else {
        $(".UpdateProfileModal .PermanentAddressDetails").show();
    }
});
//Toggle WhatsApp Details
$('body').on('click', '.UpdateProfileModal [name="IsWhatsappNumberSameAsMobileNumber"]', function() {
    if ($(this).prop('checked') == true) {
        $('.UpdateProfileModal .WhtApDtls').hide();
    } else {
        $('.UpdateProfileModal .WhtApDtls').show();
    }
});
function GetProfileStatesAndUserDocumentTypes(CountryID, Item1, Item2, StateID, UserDocumentTypeID) {
    $.get(BaseURL+"/GetStates/" + CountryID, function(data, status) {
        var States = '<option value="0" ' + ((StateID != '' && StateID == 0) ? 'selected' : '') + '>Select State</option>';
        $.each(jQuery.parseJSON(data), function(index, value) {
            States += '<option value="' + value.StateID + '" ' + ((StateID != '' && value.StateID ==
                StateID) ? 'selected' : '') + '>' + value.StateName + '</option>';
        });
        $('.UpdateProfileModal [name="' + Item1 + '"]').html(States);
    });

    $.get(BaseURL+"/GetUserDocumentTypes/" + CountryID, function(data, status) {
        var DocumentType = '<option value="0" ' + ((UserDocumentTypeID != '' && UserDocumentTypeID == 0) ? 'selected' : '') + '>Select Type Of Document</option>';
        $.each(jQuery.parseJSON(data), function(index, value) {
            DocumentType += '<option value="' + value.UserDocumentTypeID + '" ' + ((
                    UserDocumentTypeID != '' && value.UserDocumentTypeID == UserDocumentTypeID) ?
                'selected' : '') + '>' + value.UserDocumentType + '</option>';
        });
        $('.UpdateProfileModal [name="' + Item2 + '"]').html(DocumentType);
    });
}

function GetProfileCities(StateID, Item, CityID) {
    $.get(BaseURL+"/GetCities/" + StateID, function(data, status) {
        var Cities = '<option value="0" ' + ((CityID != '' && CityID == 0) ? 'selected' : '') + '>Select City</option>';
        $.each(jQuery.parseJSON(data), function(index, value) {
            Cities += '<option value="' + value.CityID + '" ' + ((CityID != '' && value.CityID ==
                CityID) ? 'selected' : '') + '>' + value.CityName + '</option>';
        });
        $('.UpdateProfileModal [name="' + Item + '"]').html(Cities);
    });
}

$("#UpdateProfileForm").validate({
    rules: {
        FirstName: {
            required: true,
            regex: "^[a-zA-Z0-9-_.(&),\'/ ]+$",
            normalizer: function(value) {
                return $.trim(value);
            },
            maxlength: 50
        },
        LastName: {
            maxlength: 50,
            regex: "^[a-zA-Z0-9-_.(&),\'/ ]+$"
        },
        DOB: "required",
        EmergencyMobileCountryCode: "required",
        EmergencyMobile: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            },
            minlength: 10,
            maxlength: 10,
            digits: true
        },
        MobileCountryCode: "required",
        Mobile: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            },
            minlength: 10,
            maxlength: 10,
            digits: true,
            remote: {
                url: BaseURL+"/isUniqueMobile",
                type: "post",
                data: {
                    'MobileCountryID': function() {
                        var CountryID = $('[name="MobileCountryCode"]').val().split('###');
                        return CountryID[0];
                    },
                    'MobileCountryCode': function() {
                        var CountryID = $('[name="MobileCountryCode"]').val().split('###');
                        return CountryID[1];
                    },
                    'IsEdit': function() {
                        return 1;
                    },
                    'EmployeeID': function() {
                        return $('[name="EmployeeId"]').val();
                    }
                },
                dataFilter: function(data) {
                    if (data != 1)
                        return false;
                    else
                        return true;
                }
            }
        },
        WhatsAppMobileCountryCode: {
            required: function(element) {
                if ($("input[name='IsWhatsappNumberSameAsMobileNumber']").prop('checked') == false)
                    return true;
                else
                    return false;
            }
        },
        WhatsAppMobile: {
            required: function(element) {
                if ($("input[name='IsWhatsappNumberSameAsMobileNumber']").prop('checked') == false)
                    return true;
                else
                    return false;
            },
            normalizer: function(value) {
                return $.trim(value);
            },
            minlength: 10,
            maxlength: 10,
            digits: true
        },
        Gender: "required",
        Email: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            },
            ValidEmail: true,
            remote: {
                url: BaseURL+"/isUniqueEmail",
                type: "post",
                data: {
                    'IsEdit': function() {
                        return 1;
                    },
                    'EmployeeID': function() {
                        return $('[name="EmployeeId"]').val();
                    }
                },
                dataFilter: function(data) {
                    if (data != 1)
                        return false;
                    else
                        return true;
                }
            }
        },
        EmpCode: {
            required: true,
            regex: "^[a-zA-Z0-9-_.(&),\'/ ]+$",
            normalizer: function(value) {
                return $.trim(value);
            },
            maxlength: 50,
            remote: {
                url: BaseURL+"/isUniqueEmployeeCode",
                type: "post",
                data: {
                    'IsEdit': function() {
                        return 1;
                    },
                    'EmployeeID': function() {
                        return $('[name="EmployeeId"]').val();
                    }
                },
                dataFilter: function(data) {
                    if (data != 1)
                        return false;
                    else
                        return true;
                }
            }
        },
        ProfilePic: {
            extension: "jpg|jpeg|png|gif",
            filesize: 1,
        },
        PresentZipcode: {
            digits: true,
            maxlength: 6
        },
        PermanentZipcode: {
            digits: true,
            maxlength: 6
        },
        PresentLine1: {
            required: function(element) {
                if ($("[name='PresentLine2']").val() == '' && $("[name='PresentCountry']").val() == 0 && $("[name='PresentState']").val() == 0 && $("[name='PresentCity']").val() == 0 && $("[name='PresentZipcode']").val() == '' && $("[name='PresentDocName']").val() == '' && $("[name='PresentDocType']").val() == 0)
                    return false;
                else
                    return true;
            },
            normalizer: function(value) {
                return $.trim(value);
            }
        },
        PermanentLine1: {
            required: function(element) {
                if ($("[name='PermanentLine2']").val() == '' && $("[name='PermanentCountry']").val() == 0 && $("[name='PermanentState']").val() == 0 && $("[name='PermanentCity']").val() == 0 && $("[name='PermanentZipcode']").val() == '' && $("[name='PermanentDocName']").val() == '' && $("[name='PermanentDocType']").val() == 0)
                    return false;
                else
                    return true;
            },
            normalizer: function(value) {
                return $.trim(value);
            }
        }
    },
    messages: {
        FirstName: {
            required: "Please Enter First Name.",
            maxlength: "Maximum Limit For First Name Is 50.",
            regex: "Invalid Characters."
        },
        LastName: {
            maxlength: "Maximum Limit For Last Name Is 50.",
            regex: "Invalid Characters."
        },
        DOB: "Please Select Date Of Birth.",
        EmergencyMobileCountryCode: "Please Select Emergency Country Code.",
        EmergencyMobile: {
            required: "<div style='position:relative;top:15px;'>Please Enter Emergency<br>Mobile Number.",
            minlength: "<div style='position:relative;top:15px;'>Please Enter Valid<br>Mobile Number.",
            maxlength: "<div style='position:relative;top:15px;'>Please Enter Valid<br>Mobile Number.",
            digits: "<div style='position:relative;top:15px;'>Please Enter Valid<br>Mobile Number."
        },
        MobileCountryCode: "Please Select Country Code.",
        Mobile: {
            required: "<div style='position:relative;top:15px;'>Please Enter Mobile<br>Number.",
            remote: "Mobile Number Must Be Unique.",
            minlength: "Please Enter Valid Phone Number.",
            maxlength: "Please Enter Valid Phone Number.",
            digits: "Please Enter Valid Phone Number."
        },
        WhatsAppMobileCountryCode: "Please Select Country Code.",
        WhatsAppMobile: {
            required: "<div style='position:relative;top:15px;'>Please Enter WhatsApp<br>Number.",
            minlength: "<div style='position:relative;top:15px;'>Please Enter Valid<br>WhatsApp Number.",
            maxlength: "<div style='position:relative;top:15px;'>Please Enter Valid<br>WhatsApp Number.",
            digits: "<div style='position:relative;top:15px;'>Please Enter Valid<br>WhatsApp Number."
        },
        Gender: "Please Select Gender.",
        Email: {
            required: "Please Enter Email Id",
            remote: "Email Must Be Unique.",
        },
        EmpCode: {
            required: "Please Enter User Name.",
            maxlength: "Maximum Limit For User Name Is 50.",
            regex: "Invalid Characters.",
            remote: "User Name Must Be Unique."
        },
        ProfilePic: {
            extension: "Invalid File."
        },
        PresentZipcode: {
            digits: "Invalid Zip Code.",
            maxlength: "Invalid Zip Code."
        },
        PermanentZipcode: {
            digits: "Invalid Zip Code.",
            maxlength: "Invalid Zip Code."
        },
        PresentLine1: "Please Enter Line1.",
        PermanentLine1: "Please Enter Line1.",
    },
    submitHandler: function(form) {
        var data = new FormData($("#UpdateProfileForm")[0]);
        $.ajax({
            url: BaseURL+"/UpdateUserProfile",
            type: "POST",
            data: data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $(".Loading").show();
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.Status == 1) {
                    $(".UpdateProfileModal .PopUpMsg .MsgTxt").html(data.Data);
                    $(".UpdateProfileModal .PopUpMsg").removeClass('Error').addClass('Success').show();
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $(".UpdateProfileModal .PopUpMsg .MsgTxt").html(data.Data);
                    $(".UpdateProfileModal .PopUpMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    }
});
$('body').on('click', '.ChangePasswordModalBtn', function() {
    $('.ChangePasswordModal').toggle();
});
$('body').on('click', '.ShowPwd', function() {
    $(this).toggleClass("fa-eye-slash fa-eye");
    $('.NwPwd').attr('type', (($('.NwPwd').attr('type') == 'password') ? 'text' : 'password'));
});

$("#ChangePasswordForm").validate({
    rules: {
        OldPassword: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            }
        },
        NewPassword: {
            required: true,
            normalizer: function(value) {
                return $.trim(value);
            }
        }
    },
    messages: {
        OldPassword: {
            required: "Please Enter Old Password.",
        },
        NewPassword: {
            required: "Please Enter New Password.",
        }
    },
    submitHandler: function(form) {
        var data = new FormData($("#ChangePasswordForm")[0]);
        $.ajax({
            url: BaseURL+"/ChangePassword",
            type: "POST",
            data: data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $(".Loading").show();
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.Status == 1) {
                    $(".ChangePasswordModal .PopUpMsg .MsgTxt").html(data.Data);
                    $(".ChangePasswordModal .PopUpMsg").removeClass('Error').addClass('Success').show();
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $(".ChangePasswordModal .PopUpMsg .MsgTxt").html(data.Data);
                    $(".ChangePasswordModal .PopUpMsg").removeClass('Success').addClass('Error').show();
                }
            },
            complete: function(data) {
                $(".Loading").hide();
            }
        });
    }
});
