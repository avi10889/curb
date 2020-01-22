<?php
class Qgenerator_model extends CI_Model
{
	//////get subject list//////
	function get_chap_ques_list_details($chap_id)
	{
		$this->db->select("q.*,ch.chap_id,ch.chap_title,ch.sub_id,ch.std_id");
		$this->db->from("qgn_questions q");
		$this->db->join("qgn_chapters ch","q.chap_id=ch.chap_id");
		$this->db->where(array("ch.chap_id"=>$chap_id,"ch.chap_active"=>"Y","q.ques_active"=>"Y"));
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}
	}
	
	//////get chapter list//////
	function get_chap_list($sub_id)
	{
		$this->db->where(array("sub_id"=>$sub_id,"chap_active"=>"Y"));	
		$query = $this->db->get("qgn_chapters");
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}
	}
	
	//////get question details on ques id//////
	function get_ques_details($ques_id)
	{
		$this->db->select("q.*,ch.chap_id,ch.chap_title,ch.sub_id,ch.std_id");
		$this->db->from("qgn_questions q");
		$this->db->join("qgn_chapters ch","q.chap_id=ch.chap_id");
		$this->db->where(array("q.ques_id"=>$ques_id,"q.ques_active"=>"Y"));
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array();
			return $result;
		}
	}
	
		//////get question paper format//////
	function get_qpaper_format_list()
	{	
		$query = $this->db->get("paper_formats");
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}
	}
	
	//////get question paper format//////
	function get_qpaper_format_details($qpaper_id)
	{	
		$this->db->where('id',$qpaper_id);
		$query = $this->db->get("paper_formats");
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array();
			return $result;
		}
	}
	
	//////get question paper format desc//////
	function get_qpaper_format_desc($qpaper_id)
	{	
		$this->db->where('ques_format_id',$qpaper_id);
		$this->db->order_by('ques_no');
		$query = $this->db->get("paper_format_desc");
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}
	}
	
	//////get subject list//////
	function get_chap_ques_sel_list($chap_ids,$marks,$type,$limit)
	{
		$this->db->select("q.*,ch.chap_id,ch.chap_title,ch.sub_id,ch.std_id");
		$this->db->from("qgn_questions q");
		$this->db->join("qgn_chapters ch","q.chap_id=ch.chap_id");
		$this->db->where_in("ch.chap_id",$chap_ids);
		$this->db->where(array("ques_type"=>$type,"q.marks"=>$marks,"ch.chap_active"=>"Y","q.ques_active"=>"Y"));
		$this->db->limit($limit);
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}
	}
	
}
?>