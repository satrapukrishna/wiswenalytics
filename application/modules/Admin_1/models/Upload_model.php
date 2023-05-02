<?php


class Upload_model extends CI_Model {    


    function buildAmazonUploadConfig($f_type) {


        $config_upload = array();


        switch ($f_type) {


		
		 case "partner_doc" :
		
				$config_upload['upload_to'] = 'asset/admin/partner_doc';


                $config_upload['upload_path'] = 'asset/admin/partner_doc';


                $config_upload['allowed_types'] = '*';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
		
		
		
		
            case "account_docs":


                 $config_upload['upload_to'] = 'asset/admin/account_docs';


                $config_upload['upload_path'] = 'asset/admin/account_docs';


                $config_upload['allowed_types'] = '*';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			case "employee_docs":


                 $config_upload['upload_to'] = 'asset/admin/employee_docs';


                $config_upload['upload_path'] = 'asset/admin/employee_docs';


                $config_upload['allowed_types'] = '*';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			case "employee_pic":


                 $config_upload['upload_to'] = 'asset/admin/employee_pic';


                $config_upload['upload_path'] = 'asset/admin/employee_pic';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			


            /*case "country_flag":


                $config_upload['upload_to'] = 'assets/files/country_flag';


                $config_upload['upload_path'] = 'assets/files/country_flag';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;


                


            case "banner":


                $config_upload['upload_to'] = 'assets/files/banner';


                $config_upload['upload_path'] = 'assets/files/banner';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                $config_upload['max_size'] = '1024'; // 10240 Kb = 10 MB


                $config_upload['max_width'] = '260';


                $config_upload['max_height'] = '200';


                break;


                


            case "visa_copy":


                $config_upload['upload_to'] = 'assets/files/visa_copy';


                $config_upload['upload_path'] = 'assets/files/visa_copy';


                $config_upload['allowed_types'] = '*';


                break;


                


            case "news":


                $config_upload['upload_to'] = 'assets/files/news_images';


                $config_upload['upload_path'] = 'assets/files/news_images';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;





			case "pages":


                $config_upload['upload_to'] = 'assets/files/pages';


                $config_upload['upload_path'] = 'assets/files/pages';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;


            case "logo":


                $config_upload['upload_to'] = 'assets/files/site_logo';


                $config_upload['upload_path'] = 'assets/files/site_logo';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;





			case "slider":


                $config_upload['upload_to'] = 'assets/files/banner_images';


                $config_upload['upload_path'] = 'assets/files/banner_images';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;				





			case "album":


                $config_upload['upload_to'] = 'assets/files/album';


                $config_upload['upload_path'] = 'assets/files/album';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;


			case "album_images":


                $config_upload['upload_to'] = 'assets/files/album_images';


                $config_upload['upload_path'] = 'assets/files/album_images';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;


                


            case "menu":


                $config_upload['upload_to'] = 'assets/files/menu';


                $config_upload['upload_path'] = 'assets/files/menu';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;


           case "expenses_bill":


                $config_upload['upload_to'] = 'assets/files/expenses_bills';


                $config_upload['upload_path'] = 'assets/files/expenses_bills';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls|doc|docx';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;
                
            case "document":


                $config_upload['upload_to'] = 'assets/files/news_docs';


                $config_upload['upload_path'] = 'assets/files/news_docs';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls|doc|docx';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;


           case "vendor_docc":


                $config_upload['upload_to'] = 'assets/files/vendor_docs';


                $config_upload['upload_path'] = 'assets/files/vendor_docs';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls|doc|docx';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;


            case "customer_docc":


                $config_upload['upload_to'] = 'assets/files/customer_docs';


                $config_upload['upload_path'] = 'assets/files/customer_docs';
                
                $config_upload['allowed_types'] = '*';

               // $config_upload['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls|doc|docx';


				 // $config_upload['max_width']  = '1200';


                // $config_upload['max_height']  = '247';


                break;


           case "inv_upl_bill":


                $config_upload['upload_to'] = 'assets/files/inv_upl_bill';


                $config_upload['upload_path'] = 'assets/files/inv_upl_bill';


                $config_upload['allowed_types'] = '*';


                break;  */   


            default:





                $config_upload['upload_to'] = 'assets/files';


                $config_upload['upload_path'] = 'assets/files';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg|doc|pdf|ppt|txt|text|rtx|rtf|docx|xlsx|xl';


                //$config_upload['max_size'] = '10240'; // // 10240 Kb = 10 MB


				//$config_upload['max_size'] = '1024'; // 1024 Kb = 1 MB


                //$config_upload['max_width']  = '1400';


        		//$config_upload['max_height']  = '1024';


                break;





        }


        return $config_upload;


    }





    function uploadfiles($file_field_name, $file_type,$e_path) {


        $conf_arr = $this->buildAmazonUploadConfig($file_type);


        if($e_path!=''){


            $conf_arr['upload_to'] = $conf_arr['upload_to'].'/'.$e_path.'/';


            $conf_arr['upload_path'] = $conf_arr['upload_path'].'/'.$e_path.'/';


        }


        


        $this->load->library('upload');





        $present_file_name = $_FILES[$file_field_name]['name'];


        $extntion_pos = strrpos($present_file_name, '.');


        $name = explode('.',$present_file_name);


        $file_name=$name[0];


        if ($extntion_pos) {


            $new_file_name = $file_name.'__-'. date('YmdHis');


            $new_file_name .= substr($present_file_name, $extntion_pos);


        } else {


            $new_file_name = $present_file_name;


        }


        $conf_arr['file_name'] = $new_file_name;


        $this->upload->initialize($conf_arr);


        if (!$this->upload->do_upload($file_field_name)) {


            $upl_file_data['msg'] = $this->upload->display_errors(); //$error;


            $upl_file_data['file_path'] = '';


            $upl_file_data['file_name'] = '';


            $upl_file_data['success'] = 0;


        } else {


            $data = array('upload_data' => $this->upload->data());


            $upl_file_data['msg'] = 'File upload successfully';


            $upl_file_data['file_path'] = $conf_arr['upload_path'] . '/' . $data['upload_data']['file_name'];


            $upl_file_data['file_name'] = $data['upload_data']['file_name'];


            $upl_file_data['success'] = 1;


        }


        return $upl_file_data;


    }


    


    function uploadDocuments($file_field_name,$file_type) {


       
	  
        $conf_arr = $this->buildAmazonUploadConfig($file_type);


        $this->load->library('upload');


        $present_file_name = $_FILES[$file_field_name]['name'];


		$extntion_pos = strrpos($present_file_name, '.');


        if ($extntion_pos) {  // Rename the file to eliminate unwnated characters and spaces


            $new_file_name = $file_type . '_' . date('YmdHis'); //substr($oldfile_name, 0, $extntion_pos);


			//$new_file_name =  $present_file_name;


            $new_file_name .= substr($present_file_name, $extntion_pos);


        } else {


            $new_file_name = $present_file_name;


        }


        $conf_arr['file_name'] = $new_file_name;


        $this->upload->initialize($conf_arr);


        if (!$this->upload->do_upload($file_field_name)) {


            //$error = array('error' => $this->upload->display_errors());


            $upl_file_data['msg'] = $this->upload->display_errors(); //$error;


            $upl_file_data['file_path'] = '';


            $upl_file_data['file_name'] = '';


            $upl_file_data['success'] = 0;


        } else {


            $data = array('upload_data' => $this->upload->data());


            $upl_file_data['msg'] = 'File upload successfully';


            $upl_file_data['file_path'] = $conf_arr['upload_path'] . '/' . $data['upload_data']['file_name'];


            $upl_file_data['file_name'] = $data['upload_data']['file_name'];


            $upl_file_data['success'] = 1;


        }


        return $upl_file_data;


    }


}


?>