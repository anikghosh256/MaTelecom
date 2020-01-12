<?php
	class User_model extends CI_Model{
    public function __construct(){
			$this->load->database();
		}
		public function register($enc_password){
			if ($this->getAdmin()) {
				return false;
			}else{
				// User data array
				$data = array(
					'fullName' =>$this->security->xss_clean($this->input->post('fuLLName')) ,
					'username' =>$this->security->xss_clean($this->input->post('username')) ,
					'email' =>$this->security->xss_clean($this->input->post('email')) ,
					'email' =>$this->security->xss_clean($this->input->post('email')) ,
					'adminImg' =>'no-avator.png' ,
					'password' => $enc_password
				);
				// Insert user
				return $this->db->insert('admin_t', $data);
			}
		
		}
		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('username', $this->security->xss_clean($username));
			$this->db->or_where('email', $this->security->xss_clean($username));
			$this->db->where('password', $password);
			$result = $this->db->get('admin_t');
			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}
		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('admin_t', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('admin_t', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		// Get the position
		public function getAdmin(){
			$query = $this->db->get('admin_t');
			if(empty($query->row_array())){
				return false;
			} else {
				return true;
			}
		}
	}
