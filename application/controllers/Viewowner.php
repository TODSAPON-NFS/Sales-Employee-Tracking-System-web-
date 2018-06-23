<?php

class Viewowner extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }



    public function viewownerprof(){

      $this->load->model('personmodel');

      if ($this->personmodel->viewownerprof1() && $this->personmodel->viewownerprof2() && $this->personmodel->viewownerprof3() && $this->personmodel->viewownerprof4()) {
        $data['results1']= $this->personmodel->viewownerprof1();
        $data['results2']= $this->personmodel->viewownerprof2();
        $data['results3']= $this->personmodel->viewownerprof3();
        $data['results4']= $this->personmodel->viewownerprof4();
        $this->load->view('ownerprof1',$data);
      }
      else {
        $this->session->set_flashdata('success8','Invalid Vehicle Owner ID');

        $this->load->view('ownerprof1');
        session_unset();
      }

    }

    public function deleteownerprof(){

      $this->load->model('personmodel');

      if ($this->personmodel->deleteownerprof()) {
        $this->session->set_flashdata('success8','Vehicle Owner Profile Deleted');
        $this->load->view('ownerprof1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid NIC');
        $this->load->view('ownerprof1');
        session_unset();
      }

    }
    public function updateowner(){

      $this->load->model('personmodel');
      if ($this->personmodel->updateowner()) {
        $this->session->set_flashdata('success8','Vehicle Owner profile Updated');
        $this->load->view('ownerprof1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid NIC');
        $this->load->view('ownerprof1');
        session_unset();
      }


    }


  }










 ?>
