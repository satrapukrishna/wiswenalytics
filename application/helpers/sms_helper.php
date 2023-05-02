<?php

        if ( ! function_exists('smssend'))
            {
                
                function smssend($mobile,$message,$tempId)
                {
                   
        
        $url="http://198.15.103.106/API/pushsms.aspx?loginID=WENALYTICS&password=123456&mobile=".$mobile."&text=".$message."&senderid=WISIOT&route_id=1&Unicode=0&Template_id=".$tempId."";
        echo $url;
        $ch = curl_init($url);
       

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 

       // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $file_contents = curl_exec ( $ch );
if (curl_errno ( $ch )) {
    echo curl_error ( $ch );
    curl_close ( $ch );
    exit ();
}
curl_close ( $ch );

// dump output of api if you want during test
echo "$file_contents";

                }   
            }
?>


