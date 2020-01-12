<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function register(){
      if($this->session->userdata('logged_in')){
         redirect('Home');
       }
       $data['title'] = 'Create an account';

       $this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');
       $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists');
       $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email_exists');
       $this->form_validation->set_rules('password', 'Password', 'trim|required');
       $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');



  		if($this->form_validation->run() === FALSE){

           $this->load->view('admin/register' ,$data);
  		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password')."@#*2#@*");
				if ($this->User_model->register($enc_password)) {
			$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
			}else{
				$this->session->set_flashdata('user_registered', 'For now we just support only one admin account..!!! ');
			}
  				
  			redirect('admin/Login');
        }

  }

  public function login(){
    if($this->session->userdata('logged_in')){
				redirect('admin/home');
			}
			$data['title'] = 'Log In';
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run() === FALSE){

				$this->load->view('admin/login', $data);
			} else {

				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password')."@#*2#@*");
				// Login user
				$user_id = $this->User_model->login($username, $password);
				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect('admin/home');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('admin/login');
				}
			}
		}

    // Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('admin/login');
		}



  // Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->User_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

    public function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists', 'That eamil is taken. Please choose a different one');
      if($this->User_model->check_email_exists($email)){
        return true;
      } else {
        return false;
      }
    }


}
