<?php


class Login_controller extends CI_Controller{

	public function loginUser(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){

			$this->load->view('home');

		}else{
			//Load user model and call loginUser function to retrieve data.
			$this->load->model('Login_model');
			$result =  $this->Login_model->login();

			if ($result != false){

				//Create data array to get user Data
				$user_data = array(
						'username'=>$result->username,

					//to check logged in
						'loggedin'=>TRUE
				);

				//Create Session to Adding Data. Get user details
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('welcomeMsg',"Welcome");
				redirect('home/loadHome');


				//direct to userDashboard controller and call index function

			}else{
				$this->session->set_flashdata('errormsg',"Wrong Username or Password");
				redirect('home/index');
			}
		}

	}


	public function logoutUser(){

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('loggedin');
		redirect('home/index');
	}



}