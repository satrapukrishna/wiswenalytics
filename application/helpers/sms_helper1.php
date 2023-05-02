<?php

        if ( ! function_exists('smssend'))
            {
                
                function smssend($mobile,$message,$tempId)
                {
                    $post = [
            'loginID' => 'WENALYTICS',
            'password' => '123456',
            'mobile'   => $mobile,
            'text'=>$message,
            'senderid'=>'WISIOT',
            'route_id'=>'1',
            'Unicode'=>'0',
            'Template_id'=>$tempId

        ];
        
        $url="http://198.15.103.106/API/pushsms.aspx?loginID=WENALYTICS&password=123456&mobile=$mobile&text=$message&senderid=WISIOT&route_id=1&Unicode=0&Template_id=$tempId";
        echo $url;die();
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 

        // curl_setopt($ch, CURLOPT_POST, true);

        //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $resuponce=curl_exec($ch);
        print_r($resuponce);

        curl_close($ch);
                }   
            }
?>


