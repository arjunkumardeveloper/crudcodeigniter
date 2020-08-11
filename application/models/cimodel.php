<?php
	class cimodel extends CI_model
	{
		public function userRegistration($data)
		{
			
			return $this->db->insert('ciregistration', $data);
		}
		public function userlogin($username, $password)
		{
			//print_r($username . " " . $password);
			//exit;
			
			$query = $this->db->where(array("username like binary"=>$username, "password like binary"=>$password))
							->from('ciregistration')
							->get();
							
			if($query->num_rows())
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}
		public function contactus($data)
		{
			return $this->db->insert('cicontact', $data);
		}
		public function addArticle($data)
		{
			return $this->db->insert('ciarticle', $data);
		}
		public function fetchData($limit, $offset)
		{
			$query = $this->db->select()
							  ->from('ciarticle')
							  ->order_by('id', 'desc')
							  ->limit($limit, $offset) // only for pagination
							  ->get();
							 // echo "<pre>";
							//print_r($query->result());
							//exit;
							return $query->result();
		}
		public function get_row()
		{
			$query = $this->db->select()
							  ->from('ciarticle')
							  ->get();
							  
							  return $query->num_rows();
		}
		public function deleteArticle($id)
		{
			return $this->db->delete('ciarticle', array('id'=>$id));
		}
		public function articleEdit($id)
		{
			
			$query = $this->db->select()
							  ->from('ciarticle')
							  ->where('id', $id)
							  ->get();
			//echo $this->db->last_query();
			//exit;
			return $query->row();
		}
		public function editpost($post, $id)
		{
			return $this->db->where('id', $id)
					 ->update('ciarticle', $post);
		}
		public function fetchGallary()
		{
			$query = $this->db->select('articleimage')
							  ->from('ciarticle')
							  ->where(array('user_id'=>$this->session->userdata('id')))
							  ->get();
					return $query->result();	
		}
		public function excelData()
		{
			$query = $this->db->select()
							  ->from('ciarticle')
							  ->order_by('id', 'desc')
							  ->get();
							 // echo "<pre>";
							//print_r($query->result());
							//exit;
							return $query->result();
		}
	}
?>