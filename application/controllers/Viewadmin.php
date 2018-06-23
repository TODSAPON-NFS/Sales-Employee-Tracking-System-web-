<?php

class Viewadmin extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }



    public function viewadminprof(){

      $this->load->model('personmodel');

      if ($this->personmodel->viewadminprof1() && $this->personmodel->viewadminprof2() && $this->personmodel->viewadminprof3()) {
        $data['results1']= $this->personmodel->viewadminprof1();
        $data['results2']= $this->personmodel->viewadminprof2();
        $data['results3']= $this->personmodel->viewadminprof3();
        $this->load->view('adminprof',$data);
      }
      else {
        $this->session->set_flashdata('success8','Invalid Manager ID');

        $this->load->view('adminprof');
        session_unset();
      }

    }

    public function deleteadminprof(){
      $username=$this->input->post('adusername');
      $password=$this->input->post('adpassword');
      if ($username=="qwer" && $password=="asdf") {
        $this->load->model('personmodel');

        if ($this->personmodel->deleteadminprof()) {
          $this->session->set_flashdata('success8','Admin Profile Deleted');
          $this->load->view('adminprof');
          session_unset();
        }
        else {
          $this->session->set_flashdata('success8','Invalid NIC');
          $this->load->view('adminprof');
          session_unset();
        }
      }
      else {
        $this->session->set_flashdata('success8','Unauthorized Access');
        $this->load->view('adminprof');
        session_unset();
      }



    }
    public function updateadmin(){
      $username=$this->input->post('adusername');
      $password=$this->input->post('adpassword');
      if ($username=="qwer" && $password=="asdf") {
        $this->load->model('personmodel');
        if ($this->personmodel->updateadmin()) {
          $this->session->set_flashdata('success8','Admin profile Updated');
          $this->load->view('adminprof1');
          session_unset();
        }
        else {
          $this->session->set_flashdata('success8','Invalid NIC');
          $this->load->view('adminprof1');
          session_unset();
        }

      }
      else {
        $this->session->set_flashdata('success8','Unauthorized Access');
        $this->load->view('adminprof1');
        session_unset();
      }



    }


  }
