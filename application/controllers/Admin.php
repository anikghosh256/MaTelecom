<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function home(){
	  	if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Admin Dashbord';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		$data['recentProducts']= $this->Page_model->getProductsBylimit(3);
		$data['recentServices']= $this->Page_model->getServiceBylimit(3);
		
			
		$this->load->view('admin/templates/header' ,$data);
		$this->load->view('admin/home' ,$data);
		$this->load->view('admin/templates/footer');
	}


	//product 
	public function addProduct(){
	  	if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Add new product';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		
		$this->form_validation->set_rules('productTitle', 'Product Title', 'trim|required');
        $this->form_validation->set_rules('productName', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('productPrice', 'Product Price ', 'trim|required');
        $this->form_validation->set_rules('productSD', 'Product Short Description', 'trim|required');
        $this->form_validation->set_rules('productDes', 'Product Description', 'trim|required');


  		if($this->form_validation->run() === FALSE){

            $this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/addProduct' ,$data);

  		} else {
				// Upload Image
			// Get filename.
			$temp = explode(".", $_FILES["productImg"]["name"]);
			// Get extension.
			$imageType = strtolower(end($temp));
			$ThumbnailName = sha1(microtime()) . "." . $imageType;
			$config['upload_path'] = './uploads/temp';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
			$config['max_size'] = '5000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';
			$config['file_name'] =$ThumbnailName;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('productImg')){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $ThumbnailName;
				
        		$this->doResize($post_image, '400', '500', 'pImg');
        		$this->doResize($post_image, '300', '200', 'thumbnail');
			}

			if ($this->Admin_model->addProduct($post_image)) {
				$this->session->set_flashdata('postCreated', 'Product has been added to database ....');
			}else{
				$this->session->set_flashdata('error', 'somthing wrong on product add method.. try to troubleshoot the problem...');
			}
  				
  			redirect('admin/home');
        }

	}

	public function editProduct($id=false){
	  	if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Edit Products';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		if ($id==false || $this->Admin_model->productById($id)== null) {
			
			$data['recentProducts']= $this->Page_model->getProductsBylimit();
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/products' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}else{

			$this->form_validation->set_rules('productTitle', 'Product Title', 'trim|required');
	        $this->form_validation->set_rules('productName', 'Product Name', 'trim|required');
	        $this->form_validation->set_rules('productPrice', 'Product Price ', 'trim|required');
	        $this->form_validation->set_rules('productSD', 'Product Short Description', 'trim|required');
	        $this->form_validation->set_rules('productDes', 'Product Description', 'trim|required');


	  		if($this->form_validation->run() === FALSE){

	  			$data['postData']= $this->Admin_model->productById($id);

	            $this->load->view('admin/templates/header' ,$data);
				$this->load->view('admin/editProduct' ,$data);

	  		} else {
				// Upload Image
				// Get filename.
				$temp = explode(".", $_FILES["productImg"]["name"]);
				// Get extension.
				$imageType = strtolower(end($temp));
				$ThumbnailName = sha1(microtime()) . "." . $imageType;
				$config['upload_path'] = './uploads/temp';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
				$config['max_size'] = '5000';
				$config['max_width'] = '4000';
				$config['max_height'] = '4000';
				$config['file_name'] =$ThumbnailName;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('productImg')){
					$errors = array('error' => $this->upload->display_errors());
					$post_image =$this->Admin_model->productById($id)['productImg'];
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $ThumbnailName;
					
	        		$this->doResize($post_image, '400', '500', 'pImg');
	        		$this->doResize($post_image, '300', '200', 'thumbnail');
				}

				if ($this->Admin_model->updateProduct($post_image,$id)) {
					$this->session->set_flashdata('success', 'Product has been edited ....');
				}else{
					$this->session->set_flashdata('error', 'somthing wrong on product edit method.. try to troubleshoot the problem...');
				}
	  				
	  			redirect('admin/home');
	        }
		}
	
	}

	public function deleteProduct($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Delete Products';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));

		if ($id==false || $this->Admin_model->productById($id) == null) {
			$data['recentProducts']= $this->Page_model->getProductsBylimit();
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/products' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}else{
			$data['product']= $this->Admin_model->productById($id);
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/product' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}
	}

	public function deleteP($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->productById($id) == null) {
			$this->session->set_flashdata('error', 'somthing wrong on product delete method.. try to troubleshoot the problem...');
			redirect('admin');
		}else{
			if ($this->Admin_model->deleteP($id)) {
				$this->session->set_flashdata('success', 'Product has been deleted ....');
				redirect('admin');
			}else{
				$this->session->set_flashdata('error', 'somthing wrong on product delete method.. try to troubleshoot the problem...');
				redirect('admin');
			}
		}
	}


	//service
	public function addService(){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Add new service';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		
		$this->form_validation->set_rules('serviceName', 'Service Name', 'trim|required');
        $this->form_validation->set_rules('serviceDes', 'Service Description', 'trim|required');


  		if($this->form_validation->run() === FALSE){

            $this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/addService' ,$data);
            $this->load->view('admin/templates/footer' ,$data);


  		} else {
				// Upload Image
			// Get filename.
			$temp = explode(".", $_FILES["serviceImg"]["name"]);
			// Get extension.
			$imageType = strtolower(end($temp));
			$ThumbnailName = sha1(microtime()) . "." . $imageType;
			$config['upload_path'] = './uploads/temp';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
			$config['max_size'] = '5000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';
			$config['file_name'] =$ThumbnailName;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('serviceImg')){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $ThumbnailName;
				
        		$this->doResize($post_image, '400', '500', 'pImg');
        		$this->doResize($post_image, '300', '200', 'thumbnail');
			}

			if ($this->Admin_model->addService($post_image)) {
				$this->session->set_flashdata('success', 'Service has been added to database ....');
			}else{
				$this->session->set_flashdata('error', 'somthing wrong on Service add method.. try to troubleshoot the problem...');
			}
  				
  			redirect('admin/home');
        }
	}


	public function editService($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Add new service';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));

		if ($id==false || $this->Admin_model->serviceById($id)== null) {
			$data['recentServices']= $this->Page_model->getServiceBylimit();
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/services' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}else{
			$this->form_validation->set_rules('serviceName', 'Service Name', 'trim|required');
	        $this->form_validation->set_rules('serviceDes', 'Service Description', 'trim|required');


	  		if($this->form_validation->run() === FALSE){
	  			$data['serviceData']= $this->Admin_model->serviceById($id);

	            $this->load->view('admin/templates/header' ,$data);
				$this->load->view('admin/editService' ,$data);
	            $this->load->view('admin/templates/footer' ,$data);


	  		} else {
					// Upload Image
				// Get filename.
				$temp = explode(".", $_FILES["serviceImg"]["name"]);
				// Get extension.
				$imageType = strtolower(end($temp));
				$ThumbnailName = sha1(microtime()) . "." . $imageType;
				$config['upload_path'] = './uploads/temp';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
				$config['max_size'] = '5000';
				$config['max_width'] = '4000';
				$config['max_height'] = '4000';
				$config['file_name'] =$ThumbnailName;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('serviceImg')){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = $this->Admin_model->serviceById($id)['serviceImg'];
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $ThumbnailName;
					
	        		$this->doResize($post_image, '400', '500', 'pImg');
	        		$this->doResize($post_image, '300', '200', 'thumbnail');
				}

				if ($this->Admin_model->updateService($post_image, $id)) {
					$this->session->set_flashdata('success', 'Service has been added to database ....');
				}else{
					$this->session->set_flashdata('error', 'somthing wrong on Service add method.. try to troubleshoot the problem...');
				}
	  				
	  			redirect('admin/home');
        	}
		}
		
		$data['product']= $this->Admin_model->productById($id);
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/product' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
	}

	public function deleteService($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Delete service';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));

		if ($id==false || $this->Admin_model->serviceById($id)== null) {
			$data['recentServices']= $this->Page_model->getServiceBylimit();
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/services' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}else{
			$data['service']= $this->Admin_model->serviceById($id);
			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/service' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}
		
		
	}

	public function deleteS($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->serviceById($id) == null) {
			$this->session->set_flashdata('error', 'somthing wrong on service delete method.. try to troubleshoot the problem...');
			redirect('admin');
		}else{
			if ($this->Admin_model->deleteS($id)) {
				$this->session->set_flashdata('success', 'Service has been deleted ....');
				redirect('admin');
			}else{
				$this->session->set_flashdata('error', 'somthing wrong on product delete method.. try to troubleshoot the problem...');
				redirect('admin');
			}
		}
	}


	//social icons

	public function socialLinks(){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='Add new social link';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		$data['socialLinks']=$this->Page_model->socialLinks();

		$this->load->view('admin/templates/header' ,$data);
		$this->load->view('admin/socialLinks' ,$data);
		$this->load->view('admin/templates/footer' ,$data);
	}

	public function addSLink(){
    	if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
        $this->form_validation->set_rules('title', 'Name', 'required|trim');
        $this->form_validation->set_rules('url', 'Link', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('error', 'something wrong..!!');
				redirect('admin/socialLinks');
		} else {
			$this->Admin_model->addSLink();
			// Set message
			$this->session->set_flashdata('success', 'Your Link has been created');
			redirect('admin/socialLinks');
		}
    }

    public function editSLink($id=false){
    	if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->socialById($id)== null) {
			redirect('admin/socialLinks');
		}else{
			$this->form_validation->set_rules('title', 'Name', 'required|trim');
	        $this->form_validation->set_rules('url', 'Link', 'required|trim');
	        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
			if($this->form_validation->run() === FALSE){
				$data['title']='Edit social link';
				$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
				$data['sLink']=$this->Admin_model->socialById($id);
				$data['socialLinks']=$this->Page_model->socialLinks();

				$this->load->view('admin/templates/header' ,$data);
				$this->load->view('admin/editSLink' ,$data);
				$this->load->view('admin/templates/footer' ,$data);
			} else {
				$this->Admin_model->updateSLink($id);
				// Set message
				$this->session->set_flashdata('success', 'Your Link has been edited');
				redirect('admin/socialLinks');
			}
		}
        
    }

    public function deleteSLink($id){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->socialById($id)== null) {
			redirect('admin/socialLinks');
		}else{
			$data['title']='Delete social link';
			$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
			$data['sLink']=$this->Admin_model->socialById($id);

			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/sLink' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}
		
	}

	public function deleteL($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->socialById($id) == null) {
			$this->session->set_flashdata('error', 'somthing wrong on social delete method.. try to troubleshoot the problem...');
			redirect('admin/socialLinks');
		}else{
			if ($this->Admin_model->deleteL($id)) {
				$this->session->set_flashdata('success', 'social link has been deleted ....');
				redirect('admin/socialLinks');
			}else{
				$this->session->set_flashdata('error', 'somthing wrong on social delete method.. try to troubleshoot the problem...');
				redirect('admin/socialLinks');
			}
		}
	}

	//slaiderImg

	public function slaiderImg(){
		
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
        $this->form_validation->set_rules('title', 'Name', 'required|trim');
		if($this->form_validation->run() === FALSE){
			$data['title']='Add new Slaider Img';
			$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
			$data['sliderimgs']=$this->Page_model->sliderimgs();

			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/sliderimgs' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		} else {
			// Upload Image
			// Get filename.
			$temp = explode(".", $_FILES["Img"]["name"]);
			// Get extension.
			$imageType = strtolower(end($temp));
			$ThumbnailName = sha1(microtime()) . "." . $imageType;
			$config['upload_path'] = './uploads/temp';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
			$config['max_size'] = '5000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';
			$config['file_name'] =$ThumbnailName;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('Img')){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = '';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $ThumbnailName;
        		$this->doResize($post_image, '400', '500', 'pImg');
        		$this->doResize($post_image, '1200', '650', 'slider');
			}
			if ($post_image=='') {
				$this->session->set_flashdata('error', 'somthing wrong on slider img add method.. try to troubleshoot the problem...');
			}else{
				if ($this->Admin_model->addSI($post_image)) {
					$this->session->set_flashdata('success', 'Slaider img has been added to database ....');
				}else{
					$this->session->set_flashdata('error', 'somthing wrong on slider img add method.. try to troubleshoot the problem...');
				}
			}

			redirect('admin/slaiderImg');
			
		}
	}


    public function deleteSI($id){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->imgById($id)== null) {
			redirect('admin/slaiderImg');
		}else{
			$data['title']='Delete social link';
			$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
			$data['sI']=$this->Admin_model->imgById($id);

			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/sliderI' ,$data);
			$this->load->view('admin/templates/footer' ,$data);
		}
		
	}

	public function dSI($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		if ($id==false || $this->Admin_model->dSI($id) == null) {
			$this->session->set_flashdata('error', 'somthing wrong on slider img delete method.. try to troubleshoot the problem...');
			redirect('admin/slaiderImg');
		}else{
			if ($this->Admin_model->dSI($id)) {
				$this->session->set_flashdata('success', 'slider img link has been deleted ....');
				redirect('admin/slaiderImg');
			}else{
				$this->session->set_flashdata('error', 'somthing wrong on slider img delete method.. try to troubleshoot the problem...');
				redirect('admin/slaiderImg');
			}
		}
	}

	//site about area

	public function about(){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='about';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		$data['about']=$this->Page_model->about();


		$this->load->view('admin/templates/header' ,$data);
		$this->load->view('admin/about' ,$data);
		$this->load->view('admin/templates/footer' ,$data);

		
	}

	public function editAbout($id=false){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='edit about';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		$data['about']=$this->Page_model->about();

		$this->form_validation->set_rules('siteName', 'website name', 'required|trim');
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('shortDes', 'short description', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');
		if($this->form_validation->run() === FALSE){

			$this->load->view('admin/templates/header' ,$data);
			$this->load->view('admin/editAbout' ,$data);

		}else{
			// Upload Image
			// Get filename.
			$temp = explode(".", $_FILES["Img"]["name"]);
			// Get extension.
			$imageType = strtolower(end($temp));
			$ThumbnailName = sha1(microtime()) . "." . $imageType;
			$config['upload_path'] = './uploads/temp';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
			$config['max_size'] = '5000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';
			$config['file_name'] =$ThumbnailName;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('Img')){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = $this->Page_model->about()['img'];
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $ThumbnailName;
        		$this->doResize($post_image, '500', '300', 'pImg');
			}
			
			if ($this->Admin_model->aboutUpdate($post_image, $this->Page_model->about()['id'])) {

				$this->session->set_flashdata('success', 'Site about updated ....');

			}else{

				$this->session->set_flashdata('error', 'somthing wrong on about edit method.. try to troubleshoot the problem...');

			}
			redirect('admin');
			
		}

		
	}

	public function inbox(){
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
		$data['title']='inbox';
		$data['adminData']=$this->Admin_model->getAdminData($this->session->userdata('user_id'));
		$data['about']=$this->Page_model->about();
		$data['msgs']=$this->Admin_model->msgs();


		$this->load->view('admin/templates/header' ,$data);
		$this->load->view('admin/inbox' ,$data);
		$this->load->view('admin/templates/footer' ,$data);

		
	}







	//thumbnail crop
    public function doResize($filename, $width, $height, $path){
        $destination_thumbs="./uploads/".$path."/";
        $upload_path="./uploads/temp/";
        $this->load->library('image_moo') ;
        $this->image_moo
        ->load($upload_path.$filename)
        ->resize_crop($width,$height)
        ->save($destination_thumbs.$filename);
    
    }







}
