<?php
class Qforms_model extends CI_Model
{

    //////Faisal Models////
	//////get standard list//////
	function get_standard_list($status = 'all')
	{
		if($status != 'all') $this->db->where("std_active",$status);
		
		$query = $this->db->get('standards');
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}
	}

    //////get standard fields list//////
    function get_std_fields_list($status = 'all')
    {
        if($status != 'all') $this->db->where("fld_active",$status);

        $query = $this->db->get('standard_fields');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////get subject list//////
    function get_subject_list_by_id($field_id,$status = 'all')
    {
        if($status != 'all') $this->db->where("sub_active",$status);
        $this->db->where("std_field_id",$field_id);

        $query = $this->db->get('subjects');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////get chapters list on standard id and subject id//////
    function get_chapter_list_by_id($std_id,$sub_id,$status = 'all')
    {
        if($status != 'all') $this->db->where("chap_active",$status);
        $this->db->where("std_id",$std_id);
        $this->db->where("sub_id",$sub_id);

        $query = $this->db->get('chapters');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////Add question//////
    function add_question($data)
    {
        $sql = $this->db->insert('questions', $data);
        if ($sql) return $this->db->insert_id();
    }

    //////Add answer//////
    function add_answer($data)
    {
        $sql = $this->db->insert('answers', $data);
        if ($sql) return $this->db->insert_id();
    }


	//////Avinash Models///////

    //////get board list//////
    function get_board_list($status = 'all')
    {
        if($status != 'all') $this->db->where("board_active",$status);

        $query = $this->db->get('board');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////Add Boards//////
    function add_board($data)
    {

        $sql = $this->db->insert('board', $data);
        if ($sql) return true;
    }

    //////Update Boards//////
    function update_board($board_id,$data)
    {
        $this->db->where("board_id",$board_id);
        $query = $this->db->get('board');
        if ($query->num_rows() > 0)
        {
            $this->db->where('board_id',$board_id);
            $sql = $this->db->update('board',$data);
            if($sql) return true;
        }

    }

    //////Delete Boards//////
    function delete_board($data)
    {
        $this->db->where("board_id",$data['board_id']);
        $query = $this->db->get('board');
        if ($query->num_rows() > 0)
        {
            $this->db->where('board_id',$data['board_id']);
            $sql = $this->db->delete('board');
            if($sql) return true;
        }

    }

    //////Change Board Status//////
    function update_board_status($board_id,$data)
    {
        $this->db->where("board_id",$board_id);
        $query = $this->db->get('board');
        if ($query->num_rows() > 0)
        {
            $this->db->where('board_id',$board_id);
            $sql = $this->db->update('board',$data);
            if($sql) return true;
        }

    }

    //////Add Standards//////
    function add_standard($data)
    {
        $sql = $this->db->insert('standards', $data);
        if ($sql) return true;
    }

    //////Update Standards//////
    function update_standard($std_id,$data)
    {
        $this->db->where("std_id",$std_id);
        $query = $this->db->get('standards');
        if ($query->num_rows() > 0)
        {
            $this->db->where('std_id',$std_id);
            $sql = $this->db->update('standards',$data);
            if($sql) return true;
        }

    }

    //////Delete Standards//////
    function delete_standard($data)
    {
        $this->db->where("std_id",$data['std_id']);
        $query = $this->db->get('standards');
        if ($query->num_rows() > 0)
        {
            $this->db->where('std_id',$data['std_id']);
            $sql = $this->db->delete('standards');
            if($sql) return true;
        }

    }

    //////Change Standards Status//////
    function update_standard_status($std_id,$data)
    {
        $this->db->where("std_id",$std_id);
        $query = $this->db->get('standards');
        if ($query->num_rows() > 0)
        {
            $this->db->where('std_id',$std_id);
            $sql = $this->db->update('standards',$data);
            if($sql) return true;
        }

    }

    //////get subject list//////
    function get_subject_list($status = 'all')
    {
        if($status != 'all') $this->db->where("sub_active",$status);

        $query = $this->db->get('subjects');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }


    //////Add Subjects//////
    function add_subject($data)
    {
        $sql = $this->db->insert('subjects', $data);
        if ($sql) return true;
    }

    //////Update Subject//////
    function update_subject($sub_id,$data)
    {
        $this->db->where("sub_id",$sub_id);
        $query = $this->db->get('subjects');
        if ($query->num_rows() > 0)
        {
            $this->db->where('sub_id',$sub_id);
            $sql = $this->db->update('subjects',$data);
            if($sql) return true;
        }
    }

    //////Delete Subjects//////
    function delete_subject($data)
    {
        $this->db->where("sub_id",$data['sub_id']);
        $query = $this->db->get('subjects');
        if ($query->num_rows() > 0)
        {
            $this->db->where('sub_id',$data['sub_id']);
            $sql = $this->db->delete('subjects');
            if($sql) return true;
        }

    }

    //////Change Subject Status//////
    function update_subject_status($sub_id,$data)
    {
        $this->db->where("sub_id",$sub_id);
        $query = $this->db->get('subjects');
        if ($query->num_rows() > 0)
        {
            $this->db->where('sub_id',$sub_id);
            $sql = $this->db->update('subjects',$data);
            if($sql) return true;
        }
    }

    //////get Chapter list//////
    function get_chapter_list($status = 'all')
    {
        if($status != 'all') $this->db->where("chap_active",$status);

        $query = $this->db->get('chapters');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////get Chapter list along with Standard Name and Subject Name//////
    function get_chapter_details($status = 'all')
    {
        $this->db->select('chapters.*,subjects.subject_name,standards.std_name');
        $this->db->from('chapters');
        $this->db->join('subjects','subjects.sub_id=chapters.sub_id');
        $this->db->join('standards','standards.std_id=chapters.std_id');
        if($status != 'all') $this->db->where("chapters.chap_active",$status);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////Add Chapters//////
    function add_chapter($data)
    {
        $sql = $this->db->insert('chapters', $data);
        if ($sql) return true;
    }

    //////Update Chapter//////
    function update_chapter($chap_id,$data)
    {
        $this->db->where("chap_id",$chap_id);
        $query = $this->db->get('chapters');
        if ($query->num_rows() > 0)
        {
            $this->db->where('chap_id',$chap_id);
            $sql = $this->db->update('chapters',$data);
            if($sql) return true;
        }
    }

    //////Delete Chapters//////
    function delete_chapter($data)
    {
        $this->db->where("chap_id",$data['chap_id']);
        $query = $this->db->get('chapters');
        if ($query->num_rows() > 0)
        {
            $this->db->where('chap_id',$data['chap_id']);
            $sql = $this->db->delete('chapters');
            if($sql) return true;
        }

    }

    //////Change Chapter Status//////
    function update_chapter_status($chap_id,$data)
    {
        $this->db->where("chap_id",$chap_id);
        $query = $this->db->get('chapters');
        if ($query->num_rows() > 0)
        {
            $this->db->where('chap_id',$chap_id);
            $sql = $this->db->update('chapters',$data);
            if($sql) return true;
        }
    }

	   //////get subject list//////
    function get_subject_details($id)
    {
        $this->db->where("sub_id",$id);
        $query = $this->db->get('subjects');
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->row_array();
            return $result;
        }
    }
}
?>