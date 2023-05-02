$('#waterlevel').click(function(event) {
        $('#alltank').toggle();    
    });
    $('#flowcollapse').click(function(event) {
        $('#flowmeters').toggle();     
    });
    $('#dgcollapse').click(function(event) {
        $('#dgset').toggle();        
    });
    $('#emcollapse').click(function(event) {
        $('#emeter').toggle();  
    });
    $('#fpcollapse').click(function(event) {
        $('#fpump').toggle();   
    });
    $('#lpgcollapse').click(function(event) {
        $('#lpg').toggle();       
    });
    $('#collapseall').click(function(event) 
    {
        if($( "#alltank" ).is( ":hidden" ) && $( "#flowmeters" ).is( ":hidden" ) && $( "#dgset" ).is( ":hidden" ) && $( "#emeter" ).is( ":hidden" ) && $( "#fpump" ).is( ":hidden" ) && $( "#lpg" ).is( ":hidden" ) )
        {
            // alert("all hidden");
            $('#alltank').toggle();
            $('#flowmeters').toggle();
            $('#dgset').toggle();
            $('#emeter').toggle();
            $('#fpump').toggle();
            $('#lpg').toggle();
        } 
        else
        {
            if($( "#alltank" ).is( ":visible" )){ $('#alltank').toggle(); }
            else{}
            if($( "#flowmeters" ).is( ":visible" )){ $('#flowmeters').toggle(); }
            else{}
            if($( "#dgset" ).is( ":visible" )){ $('#dgset').toggle(); }
            else{}
            if($( "#emeter" ).is( ":visible" )){ $('#emeter').toggle(); }
            else{}
            if($( "#fpump" ).is( ":visible" )){ $('#fpump').toggle(); }
            else{}
            if($( "#lpg" ).is( ":visible" )){ $('#lpg').toggle(); }
            else{}
        }
   
    });

    $('#dshbrdMasterId').click(function(e) 
    {
        e.preventDefault();
        $("#hidedashboard").toggle();  
    });
  
    $('#reportsOuterId').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#reportsInnerId").toggle();
          
    });

    $('#dgsetouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#dgsetinnerid").toggle();
          
    });
    $('#emouterid').click(function(e) 
    {
        // alert("hello");
        e.preventDefault();
        $("#eminnerid").toggle();
          
    });