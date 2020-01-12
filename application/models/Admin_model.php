<?php
	class Admin_model extends CI_Model{
    	public function __construct(){
			$this->load->database();
		}

		public function getAdminData($id){
			$this->db->select('username, fullName, adminImg, email');
			$query = $this->db->get_where('admin_t', array('id' => $id));
			return $query->row_array();
		}

		public function addProduct($post_image){
			// product data array
				$data = array(
					'productTitle' =>$this->security->xss_clean($this->input->post('productTitle')) ,
					'productSlug' =>$this->security->xss_clean(url_title($this->input->post('productTitle'))) ,
					'productName' =>$this->security->xss_clean($this->input->post('productName')) ,
					'productPrice' =>$this->security->xss_clean($this->input->post('productPrice')) ,
					'productSD' =>$this->security->xss_clean($this->input->post('productSD')) ,
					'productDes' =>$this->input->post('productDes'),
					'authId' =>$this->session->userdata('user_id') ,
					'productImg' => $post_image
				);
				// Insert product 
				return $this->db->insert('products', $data);
		}

		public function productById($id){
			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function updateProduct($post_image,$id){
				$data = array(
					'productTitle' =>$this->security->xss_clean($this->input->post('productTitle')) ,
					'productName' =>$this->security->xss_clean($this->input->post('productName')) ,
					'productPrice' =>$this->security->xss_clean($this->input->post('productPrice')) ,
					'productSD' =>$this->security->xss_clean($this->input->post('productSD')) ,
					'productDes' =>$this->input->post('productDes'),
					'authId' =>$this->session->userdata('user_id') ,
					'productImg' => $post_image
				);

			$this->db->where('id', $id);
			return $this->db->update('products', $data);
		}

		public function deleteP($id){
			return $this->db->delete('products', array('id' => $id));
		}


		public function serviceById($id){
			$query = $this->db->get_where('services', array('id' => $id));
			return $query->row_array();
		}


		public function addService($serviceImg){
			// product data array
				$data = array(
					'serviceName' =>$this->security->xss_clean($this->input->post('serviceName')) ,
					'serviceDes' =>$this->security->xss_clean($this->input->post('serviceDes')) ,
					'serviceImg' => $serviceImg
				);
				// Insert product 
				return $this->db->insert('services', $data);
		}

		public function updateService($serviceImg,$id){
				$data = array(
					'serviceName' =>$this->security->xss_clean($this->input->post('serviceName')) ,
					'serviceDes' =>$this->security->xss_clean($this->input->post('serviceDes')) ,
					'serviceImg' => $serviceImg
				);

			$this->db->where('id', $id);
			return $this->db->update('services', $data);
		}

		public function deleteS($id){
			return $this->db->delete('services', array('id' => $id));
		}

		public function addSLink(){
			$data = array(
				'title' =>$this->security->xss_clean($this->input->post('title')) ,
				'url' =>$this->security->xss_clean($this->input->post('url')) ,
				'icon' =>$this->security->xss_clean($this->input->post('icon')) 
			);
			
			return $this->db->insert('sociallinks', $data);
		}
		public function socialById($id){
			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function updateSLink($id){
				$data = array(
				'title' =>$this->security->xss_clean($this->input->post('title')) ,
				'url' =>$this->security->xss_clean($this->input->post('url')) ,
				'icon' =>$this->security->xss_clean($this->input->post('icon')) 
			);

			$this->db->where('id', $id);
			return $this->db->update('sociallinks', $data);
		}

		public function deleteL($id){
			return $this->db->delete('sociallinks', array('id' => $id));
		}

		public function addSI($img){
			// slider data array
				$data = array(
					'title' =>$this->security->xss_clean($this->input->post('title')),
					'img' => $img
				);
				// Insert slider 
				return $this->db->insert('sliderimgs', $data);
		}
		public function imgById($id){
			$query = $this->db->get_where('sliderimgs', array('id' => $id));
			return $query->row_array();
		}

		public function dSI($id){
			return $this->db->delete('sliderimgs', array('id' => $id));
		}
		public function aboutUpdate($img,$id){
				$data = array(
					'siteName' =>$this->security->xss_clean($this->input->post('siteName')) ,
					'title' =>$this->security->xss_clean($this->input->post('title')) ,
					'shortDes' =>$this->security->xss_clean($this->input->post('shortDes')) ,
					'description' =>$this->security->xss_clean($this->input->post('description')) ,
					'img' => $img
				);

			$this->db->where('id', $id);
			return $this->db->update('siteabout', $data);
		}

		public function msgs(){
			
			$this->db->order_by('id', 'DESC');
			$query= $this->db->get('inbox');
			return $query->result_array();
		}
		
	}
