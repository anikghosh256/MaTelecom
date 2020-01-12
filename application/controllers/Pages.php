<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

  public function home(){

    $data['title']=$this->Page_model->about()['siteName'];
  	$data['recentProducts']= $this->Page_model->getProductsBylimit(3);
  	$data['recentServices']= $this->Page_model->getServiceBylimit(3);
  	$data['about']=$this->Page_model->about();
  	$data['socialLinks']=$this->Page_model->socialLinks();

    $this->load->view('templates/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('templates/footer', $data);
  }

  public function store(){

    $data['title']='Store -'.$this->Page_model->about()['siteName'];
    $data['recentProducts']= $this->Page_model->getProductsBylimit();
    $data['about']=$this->Page_model->about();
    $data['socialLinks']=$this->Page_model->socialLinks();

    $this->load->view('templates/header', $data);
    $this->load->view('pages/store', $data);
    $this->load->view('templates/footer', $data);
  }

  public function product($id= false){

    if ($id== false) {
     redirect('home');
    }else{
      $data['title']=$this->Page_model->productById($id)['productTitle'];
      $data['product']= $this->Page_model->productById($id);
      $data['about']=$this->Page_model->about();
      $data['socialLinks']=$this->Page_model->socialLinks();

      $this->load->view('templates/header', $data);
      $this->load->view('pages/single', $data);
      $this->load->view('templates/footer', $data);
    }

   
  }

  public function about(){

    $data['title']='About  -'. $this->Page_model->about()['siteName'];
  	$data['recentProducts']= $this->Page_model->getProductsBylimit(3);
  	$data['recentServices']= $this->Page_model->getServiceBylimit(3);
  	$data['about']=$this->Page_model->about();
  	$data['socialLinks']=$this->Page_model->socialLinks();
  	$data['sliderimgs']=$this->Page_model->sliderimgs();

    $this->load->view('templates/header', $data);
    $this->load->view('pages/about', $data);
    $this->load->view('templates/footer', $data);
  }

  public function contact(){

    $data['title']='Contact  -'. $this->Page_model->about()['siteName'];
	  $data['about']=$this->Page_model->about();
	  $data['socialLinks']=$this->Page_model->socialLinks();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/footer', $data);
  }

  public function notfound(){
    $data['title']='404 not found';
    $data['about']=$this->Page_model->about();
    $data['socialLinks']=$this->Page_model->socialLinks();

    $this->load->view('templates/header', $data);
    $this->load->view('pages/404', $data);
    $this->load->view('templates/footer', $data);
  }

  public function msg(){

    $this->form_validation->set_rules('Name', 'Sender Name', 'trim|required');
    $this->form_validation->set_rules('Email', 'Sender Email', 'trim|required');
    $this->form_validation->set_rules('Msg', 'Message', 'trim|required');

    if($this->form_validation->run() === FALSE){

      redirect('');

    }else{
      if ($this->Page_model->msg()) {
        $this->session->set_flashdata('success', 'Message Sent Successfully ...');
      }else{
        $this->session->set_flashdata('error', 'somthing wrong on Message method.. try to troubleshoot the problem...');
      }
      redirect('');
    }

  }




}
