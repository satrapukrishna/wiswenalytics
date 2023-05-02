<?php


class Upload_model extends CI_Model {    


    function buildAmazonUploadConfig($f_type) {


        $config_upload = array();


        switch ($f_type) {


		
		 case "partner_doc" :
		
				$config_upload['upload_to'] = 'asset/hospital_admin/partner_doc';


                $config_upload['upload_path'] = 'asset/hospital_admin/partner_doc';


                $config_upload['allowed_types'] = '*';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
            case "scheduled_doc" :
		
                    $config_upload['upload_to'] = 'asset/hospital_admin/scheduled_doc';
    
    
                    $config_upload['upload_path'] = 'asset/hospital_admin/scheduled_doc';
    
    
                    $config_upload['allowed_types'] = '*';
    
    
                    //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB
    
    
                    break;
				
		case "device_icon" :
		
				$config_upload['upload_to'] = 'asset/hospital_admin/img';


                $config_upload['upload_path'] = 'asset/hospital_admin/img';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';


                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
		
		
		
		
            case "account_docs":


                 $config_upload['upload_to'] = 'asset/hospital_admin/account_docs';


                $config_upload['upload_path'] = 'asset/hospital_admin/account_docs';


                $config_upload['allowed_types'] = '*';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			case "employee_docs":


                 $config_upload['upload_to'] = 'asset/hospital_admin/employee_docs';


                $config_upload['upload_path'] = 'asset/hospital_admin/employee_docs';


                $config_upload['allowed_types'] = '*';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			case "employee_pic":


                 $config_upload['upload_to'] = 'asset/hospital_admin/employee_pic';


                $config_upload['upload_path'] = 'asset/hospital_admin/employee_pic';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			case "installation_pic":


                 $config_upload['upload_to'] = 'asset/hospital_admin/installation_pic';


                $config_upload['upload_path'] = 'asset/hospital_admin/installation_pic';


                $config_upload['allowed_types'] = 'gif|jpg|png|jpeg';



                //$config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB


                break;
				
			



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