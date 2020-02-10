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
		$this->load->view(ADMINCP.'/home');
	}
	
	public function upload_img_files()
	{
		/* Getting file name */
		$filename = $_FILES['file']['name'];

		/* Getting File size */
		$filesize = $_FILES['file']['size'];

		/* Location */
		$location = FCPATH."/admin_assets/page_images/".$filename;

		$return_arr = array();

		/* Upload file */
		if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			$src = "default.png";
			$src = "default.png";

			// checking file is image or not
			if(is_array(getimagesize($location))){
				$src = $location;
			}
			$return_arr = array("name" => $filename,"size" => $filesize, "src"=> $src);
		}

		echo json_encode($return_arr);

	}
	
	public function upload_section_img()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->load->library('upload');
			$this->load->library('image_lib');
			$rand = mt_rand();
			$time = time();
			//$file_name = $rand.$time;
			$config = array(
				'upload_path'=> FCPATH."/admin_assets/page_images/home/",
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => 8192
			);
			$this->upload->initialize($config);
			
			
			$upl_field = 'img_file';
			$error = '';
			$img = '';
			//$dir = 'uploads/';
			$dir = FCPATH."/admin_assets/page_images/home/";
			//$extensions = array("jpeg","jpg","png");
			foreach($_FILES['img_file']['tmp_name'] as $key => $tmp_name )
			{
				/*$file_name = $_FILES['img_file']['name'][$key];
				$file_size =$_FILES['img_file']['size'][$key];
				$file_tmp =$_FILES['img_file']['tmp_name'][$key];
				$file_type=$_FILES['img_file']['type'][$key];*/
				$_FILES['img_file[]']['name']= $_FILES[$upl_field]['name'][$key];
				$_FILES['img_file[]']['type']= $_FILES[$upl_field]['type'][$key];
				$_FILES['img_file[]']['tmp_name']= $_FILES[$upl_field]['tmp_name'][$key];
				$_FILES['img_file[]']['error']= $_FILES[$upl_field]['error'][$key];
				$_FILES['img_file[]']['size']= $_FILES[$upl_field]['size'][$key];
				///cd////
				if(!$this->upload->do_upload('img_file[]') /*&& $file_name !== ""*/)
				{
					$error = $this->upload->display_errors();
				}
				else
				{
					$upl_file = $this->upload->data();
					/*$img .= '';
					$img .= '<img src="'.site_url('admin_assets/page_images/home/'.$upl_file['file_name']).'" class="img-thumbnail" width="200" />';
					$img .= '';	*/
					
					$img_data = array('page_name'=>'home','image_name'=>$upl_file['file_name'],'image_type'=>'section','updated_on'=>$time);
					$this->page_model->add_image($img_data);
					
				}
				///cd///
				/*$file_ext = strtolower(end(explode('.',$file_name)));  
				if(in_array($file_ext,$extensions ) === true)
				{
					if(move_uploaded_file($file_tmp, $dir.$file_name))
					{
						$img .= '<div class="col-sm-2"><div class="thumbnail">';
						$img .= '<img src="'.$dir.$file_name.'" />';
						$img .= '</div></div>';		
					}
					else
						$error = 'Error in uploading few files. Some files couldn\'t be uploaded.';				
				}	
				else
				{
					$error = 'Error in uploading few files. File type is not allowed.';
				}*/	
			}
			echo (json_encode(array('error' => $error, 'img' => $this->get_image_list_data('home','section'))));	
		}

	}
	
	private function get_image_list_data($page,$type)
	{
		$img_list = $this->page_model->get_image_list(array('page_name'=>'home','image_type'=>'section'));
		$img = '';
		if(is_array($img_list))
		{
			foreach($img_list as $il)
			{
				$img .= '
				<div class="col-2">
				<img src="'.site_url(ADMIN_ASSETS.'/page_images/'.$page.'/'.$il['image_name']).'" class="img-thumbnail" alt="'.$il['image_name'].'" width="200" />
				<p><a href="'.site_url(ADMIN_ASSETS.'/page_images/'.$page.'/'.$il['image_name']).'" target="_blank">'.$il['image_name'].'</p>
				</div>';
		
			}
			return $img;
		}
	}
	
	public function get_image_list($page,$type)
	{
		$img_list = $this->page_model->get_image_list(array('page_name'=>'home','image_type'=>'section'));
		
		if(is_array($img_list))
		{
			foreach($img_list as $il)
			{
		?>
			<div class='col-2'>
			<img src="<?php echo site_url(ADMIN_ASSETS.'/page_images/'.$page.'/'.$il['image_name']);?>" class="img-thumbnail" alt="<?php echo $il['image_name'];?>" width="200" />
			<p><a href="<?php echo site_url(ADMIN_ASSETS.'/page_images/'.$page.'/'.$il['image_name']);?>" target="_blank"><?php echo $il['image_name'];?></p>
			</div>
		<?php
			}
		}
	}
	
}