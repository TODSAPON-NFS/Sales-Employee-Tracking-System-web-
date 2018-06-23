<?php

class Viewvehicle extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }



    public function viewvehicle(){

      $this->load->model('personmodel');

      if ($this->personmodel->viewvehicle()) {
        $data['results1']= $this->personmodel->viewvehicle();

        $this->load->view('vehicle1',$data);
      }
      else {
        $this->session->set_flashdata('success8','Invalid Vehicle No');
        $this->load->view('vehicle1');
        session_unset();
      }

    }

    public function deletevehicle(){

      $this->load->model('personmodel');

      if ($this->personmodel->deletevehicle()) {
        $this->session->set_flashdata('success8','Vehicle Profile Deleted');
        $this->load->view('vehicle1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid Vehicle Number');
        $this->load->view('vehicle1');
        session_unset();
      }

    }
    public function updatevehicle(){

      $this->load->model('personmodel');
      if ($this->personmodel->updatevehicle()) {
        $this->session->set_flashdata('success8','Vehicle profile Updated');
        $this->load->view('vehicle1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid Vehicle Number');
        $this->load->view('vehicle1');
        session_unset();
      }


    }


  }










 ?>
