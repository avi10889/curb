<?php

class Page_model extends CI_Model
{
	public function update_content($cond,$data)
	{
		$this->db->where($cond);
		$sql=$this->db->update("page_images",$data);
		//echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	
	public function add_image($data)
	{
		$sql=$this->db->insert("page_images",$data);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	}
	
	function get_section_list($cond)
	{
		$this->db->where($cond);
		$this->db->order_by("created_on");
		$sql=$this->db->get("page_images");
		
		if($sql->num_rows() > 0)
		{
			return $sql->result_array();
		}
	}
	
	function get_section_details($cond)
	{
		$this->db->where($cond);
		$sql=$this->db->get("page_images");
		
		if($sql->num_rows() > 0)
		{
			return $sql->row_array();
		}
	}
	
	public function add_section($data)
	{
		$sql=$this->db->insert("page_images",$data);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	}
	
	public function delete_section($id)
	{
		$this->db->where("id",$id);
		return $sql=$this->db->delete("page_images");
	}
	
}
?>