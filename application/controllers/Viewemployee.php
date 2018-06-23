<?php

class Viewemployee extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }

    public function viewstatus(){

      $this->load->model('personmodel');

      if ($this->personmodel->viewemployee()) {
        $data['results']= $this->personmodel->viewemployee();
        $this->load->view('empview1',$data);
      }
      else {
        $this->session->set_flashdata('success7','No data for those parametres');
        $this->load->view('empview2');
        session_unset();
      }

    }

    public function viewempprof(){

      $this->load->model('personmodel');

      if ($this->personmodel->viewemployeeprof1() && $this->personmodel->viewemployeeprof2() && $this->personmodel->viewemployeeprof3() && $this->personmodel->viewemployeeprof4()) {
        $data['results1']= $this->personmodel->viewemployeeprof1();
        $data['results2']= $this->personmodel->viewemployeeprof2();
        $data['results3']= $this->personmodel->viewemployeeprof3();
        $data['results4']= $this->personmodel->viewemployeeprof4();
        $this->load->view('employeeprof1',$data);
      }
      else {
        $this->session->set_flashdata('success8','Invalid Employee ID');

        $this->load->view('employeeprof1');
        session_unset();
      }

    }

    public function deleteempprof(){

      $this->load->model('personmodel');

      if ($this->personmodel->deleteemployeeprof()) {
        $this->session->set_flashdata('success8','Employee Profile Deleted');
        $this->load->view('employeeprof1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid NIC');
        $this->load->view('employeeprof1');
        session_unset();
      }

    }
    public function updateemployee(){

      $this->load->model('personmodel');
      if ($this->personmodel->updateemployee()) {
        $this->session->set_flashdata('success8','Employee profile Updated');
        $this->load->view('employeeprof1');
        session_unset();
      }
      else {
        $this->session->set_flashdata('success8','Invalid NIC');
        $this->load->view('employeeprof1');
        session_unset();
      }


    }


  }










 ?>
