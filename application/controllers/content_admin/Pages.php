<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller 
{
	function __construct()
	{
        parent::__construct();
		chk_logged_admin();
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
}