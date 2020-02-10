<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller 
{
	function __construct()
	{
        parent::__construct();
		chk_logged_admin();
		$this->load->model(ADMINCP.'/page_model');
    }
	
	public function index()
	{
		$data['sec_list'] = $this->page_model->get_section_list(array("page_name"=>"home","image_loc"=>"section"));
		$this->load->view(ADMINCP.'/home',$data);
	}
	
	public function add_new_section()
	{
		$page = $this->input->post('page');
		if($page != "")
		{
			$sec_data = array('page_name'=>$page,'image_loc'=>'section','created_on'=>time());
			$sec_add = $this->page_model->add_image($sec_data);
			if($sec_add > 0)
			{
				echo json_encode(array("status"=>"success"));
			}
			else
			{
				echo json_encode(array("status"=>"error","msg"=>"Please try again"));
			}
		}
	}
	
	public function delete_section()
	{
		$page = $this->input->post('page');
		$section_id = $this->input->post('id');
		if($page != "" && $section_id != "")
		{
			$get_sec_det = $this->page_model->get_section_details(array("id"=>$section_id));
			if(is_array($get_sec_det))
			{
				if($get_sec_det['image_name1'] != "") unlink(FCPATH.ADMIN_ASSETS.'/page_images/'.$page.'/'.$get_sec_det['image_name1']);
				if($get_sec_det['image_name2'] != "") unlink(FCPATH.ADMIN_ASSETS.'/page_images/'.$page.'/'.$get_sec_det['image_name2']);
				if($get_sec_det['image_name3'] != "") unlink(FCPATH.ADMIN_ASSETS.'/page_images/'.$page.'/'.$get_sec_det['image_name3']); 
					
				$del_sec = $this->page_model->delete_section($section_id);
				if($del_sec)
				{
					echo json_encode(array("status"=>"success"));
				}
				else
				{
					echo json_encode(array("status"=>"error","msg"=>"Please try again"));
				}
			}
			
		}
	}
	
	public function get_sub_section_content()
	{
		$page = $this->input->post('page');
		$sec_id = $this->input->post('secid');
		$subsec_no = $this->input->post('subsec_no');
		if($page != "" && $sec_id != "" && $subsec_no != "")
		{
			$image_link = "";
			$get_sec_det = $this->page_model->get_section_details(array("id"=>$sec_id));
			if(is_array($get_sec_det))
			{
				if($get_sec_det['image_name'.$subsec_no] != "") $image_link = site_url(ADMIN_ASSETS.'/page_images/'.$page.'/'.$get_sec_det['image_name'.$subsec_no]);
				
				echo json_encode(array("status"=>"success","image"=>$image_link,"text"=>$get_sec_det["image_text".$subsec_no],"media"=>$get_sec_det["image_media".$subsec_no]));
			}
			else
			{
				echo json_encode(array("status"=>"error","msg"=>"Not found"));
			}
		}
	}
	
	public function update_section_content()
	{
		$page = $this->input->post('page');
		$sec_id = $this->input->post('secid');
		$subsec_no = $this->input->post('subsec_no');
		$img_text = $this->input->post('sec_update_text');
		$img_media = $this->input->post('sec_update_media');
		$resp_data = "";
		$upd_status = "";
		$image_file = "";
		$time = time();
		if(isset($_FILES["image_file"]['name']) && $_FILES["image_file"]['name'] != "")
		{
			$this->load->library('upload');
			$this->load->library('image_lib');
			
			$config = array(
				'upload_path'=> FCPATH.'/'.PAGE_IMAGE.'/'.$page,
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => 8192,
				'file_ext_tolower' => true
				/*'max_width' => 1024,
				'max_height' => 768,
				'min_width' => '150',
				'min_height' => '150',
				'file_name' => $count_img.$time.'.jpg'*/
			);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('image_file'))
			{
				$resp_data .= $this->upload->display_errors();
				$update_status = "error";
			}
			else
			{
				$upl_file = $this->upload->data();
				$upd_data = array('image_name'.$subsec_no=>$upl_file['file_name'],'image_text'.$subsec_no=>htmlentities($img_text),'image_media'.$subsec_no=>htmlentities($img_media),'created_on'=>$time);
				$upd_data_status = $this->page_model->update_content(array("id"=>$sec_id),$upd_data);
				if($upd_data_status > 0)
				{
					$resp_data .= "Updated successfully";
					$update_status = "success";
					$image_file = site_url(ADMIN_ASSETS.'/page_images/'.$page.'/'.$upl_file['file_name']);
				}
				else
				{
					$resp_data .= "Please try again";
					$update_status = "error";
				}
			}
			echo json_encode(array("status"=>$update_status,"msg"=>$resp_data,"image"=>$image_file));
		}
		else
		{
			$upd_data = array('image_text'.$subsec_no=>htmlentities($img_text),'image_media'.$subsec_no=>htmlentities($img_media),'created_on'=>$time);
				$upd_data_status = $this->page_model->update_content(array("id"=>$sec_id),$upd_data);
				if($upd_data_status > 0)
				{
					$resp_data .= "Updated successfully";
					$update_status = "success";
				}
				else
				{
					$resp_data .= "Please try again";
					$update_status = "error";
				}
			echo json_encode(array("status"=>$update_status,"msg"=>$resp_data,"image"=>$image_file));
		}
	}
	
}