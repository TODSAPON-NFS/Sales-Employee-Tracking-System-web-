<?php

if(!Defined('BASEPATH'))
    exit ('No direct script access allowed');


class Addperson extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }


  public function registerUser(){
    if ($this->input->post('submit1')) {
      $username=$this->input->post('adusername');
      $password=$this->input->post('adpassword');
      if ($username=="qwer" && $password=="asdf") {
        $config['upload_path'] = './assets/img/admin';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0'; // Unlimited
        $config['max_width']  = '0'; // Unlimited
        $config['max_height']  = '0'; // Unlimited

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
        $this->upload->initialize($config);

        $input_name = "adminpic";

        if ( ! $this->upload->do_upload($input_name))
        {
          $this->session->set_flashdata('success','Invalid Picture');
          $this->load->view('addPerson');
          session_unset();

        }
        else
        {

          $this->load->model('personmodel');
          $this->personmodel->insertadmin();
          $this->session->set_flashdata('success','Admin is registered successfully');
          $this->load->view('addPerson');
          session_unset();


        }

      }
      else {
        $this->session->set_flashdata('success','Unauthorized Access or invalid username,password');
        $this->load->view('addPerson');
        session_unset();
      }



    }

    if ($this->input->post('submit2')) {
      $config['upload_path'] = './assets/img/employee';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0'; // Unlimited
      $config['max_width']  = '0'; // Unlimited
      $config['max_height']  = '0'; // Unlimited

      $this->load->library('upload', $config);

      // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
      $this->upload->initialize($config);

      $input_name1 = "emppic";

      if ( ! $this->upload->do_upload($input_name1))
      {
        $this->session->set_flashdata('success','Invalid Picture');
        $this->load->view('addPerson');
        session_unset();

      }
      else
      {

        $this->load->model('personmodel');
        $this->personmodel->insertsalesemp();

        $this->session->set_flashdata('success','SalesEmployee is registered successfully');
        $this->load->view('addPerson');
        session_unset();


      }



    }

    if ($this->input->post('submit3')) {
      $config['upload_path'] = './assets/img/vehicleowner';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0'; // Unlimited
      $config['max_width']  = '0'; // Unlimited
      $config['max_height']  = '0'; // Unlimited

      $this->load->library('upload', $config);

      // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
      $this->upload->initialize($config);

      $input_name2 = "ownerpic";

      if ( ! $this->upload->do_upload($input_name2))
      {
        $this->session->set_flashdata('success','Invalid Picture');
        $this->load->view('addPerson');
        session_unset();

      }
      else
      {

        $this->load->model('personmodel');
        $this->personmodel->insertvehicleowner();

        $this->session->set_flashdata('success','VehicleOwner is registered successfully');
        $this->load->view('addPerson');
        session_unset();


      }



    }

    if ($this->input->post('submit4')) {
      $config['upload_path'] = './assets/img/vehicle';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0'; // Unlimited
      $config['max_width']  = '0'; // Unlimited
      $config['max_height']  = '0'; // Unlimited

      $this->load->library('upload', $config);

      // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
      $this->upload->initialize($config);

      $input_name3 = "vehiclepic";

      if ( ! $this->upload->do_upload($input_name3))
      {
        $this->session->set_flashdata('success','Invalid Picture');
        $this->load->view('addPerson');
        session_unset();

      }
      else
      {

        $this->load->model('personmodel');
        $this->personmodel->insertvehicle();

        $this->session->set_flashdata('success','Vehicle is registered successfully');
        $this->load->view('addPerson');
        session_unset();


      }



    }

  }

}
