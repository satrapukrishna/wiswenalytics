<footer style="margin-left:32px;margin-top: 15px;margin-bottom: 15px;">
    
    <strong>Copyright &copy; 2020<a href=""> Wenalytics </a>.</strong> All rights
    reserved.
  </footer> 

<script>
	var BASE_URL = '<?php echo base_url(); ?>';
var page = $("#page").val();
// alert(page);
if(page=='running'){
	$('#reportsmenu').css({'display':'block'});
	$('#subfirepump').css({'display':'block'});
}
if(page=='water'){
	$('#subcat555').css({'display':'block'});
}
if(page=='energy'){
	$('#subcat556').css({'display':'block'});
}
if(page=='aircondition'){
	$('#subcat559').css({'display':'block'});
}
if(page=='airqua'){
	$('#subcat560').css({'display':'block'});
}
if(page=='specialized'){
	$('#subcat571').css({'display':'block'});
}

function menushow(id){
	$("#subcat"+id).toggle('slow');
	return false;
}
// function reports2(id){
	// $("#subreports"+id).toggle('slow');
	// return false;
// }

$('#reports').click(function(){
	$('#reportsmenu').toggle('slow');
	return false;
});

$('#firepump').click(function(){
	$('#subfirepump').toggle('slow');
	return false;
});


   // $("#"+page).addClass('active');
</script>
