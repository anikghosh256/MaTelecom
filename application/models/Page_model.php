<?php
	class Page_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}


		public function getProductsBylimit($limit = false){
			if ($limit != false) {
				$this->db->limit($limit);
			}
			$this->db->order_by('id', 'DESC');
			$query= $this->db->get('products');
			return $query->result_array();
		}

		public function getServiceBylimit($limit = false){
			if ($limit != false) {
				$this->db->limit($limit);
			}
			$this->db->order_by('id', 'DESC');
			$query= $this->db->get('services');
			return $query->result_array();
		}

		public function socialLinks(){
			
			$this->db->order_by('id', 'DESC');
			$query= $this->db->get('socialLinks');
			return $query->result_array();
		}
		public function sliderimgs(){
			
			$this->db->order_by('id', 'DESC');
			$query= $this->db->get('sliderimgs');
			return $query->result_array();
		}
		public function about(){
			
			$query= $this->db->get('siteabout');
			return $query->row_array();
		}
		public function productById($id){
			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function msg(){
			$data = array(
					'senderName' =>$this->security->xss_clean($this->input->post('Name')) ,
					'senderMail' =>$this->security->xss_clean($this->input->post('Email')),
					'senderMsg' =>$this->security->xss_clean($this->input->post('Msg'))
				);
				
			return $this->db->insert('inbox', $data);
		}

	}
