<?php

class Vehicledetails extends CI_Controller{

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }





    public function status(){        //Controller method to get vehicle status
      $this->load->model('detailmodel');
      if ($this->detailmodel->assigned() || $this->detailmodel->notassigned()) {
        $data1['result1']= $this->detailmodel->assigned();
        $data1['result2']= $this->detailmodel->notassigned();
        $this->load->view('vehicledetails',$data1);
      }
      else {
        $this->session->set_flashdata('success8','No Data');

        $this->load->view('vehicledetails');
        session_unset();
      }




    }

    public function viewdetails(){  //controller method to view details of the vehicles.
      $this->load->model('detailmodel');
      if ($this->detailmodel->assigned() || $this->detailmodel->notassigned()) {
        $data['result1']= $this->detailmodel->assigned();
        $data['result2']= $this->detailmodel->notassigned();
        if ($this->detailmodel->foo() && $this->detailmodel->foo1() && $this->detailmodel->foo2()) {
        $data['res1']= $this->detailmodel->foo();
        $data['res2']= $this->detailmodel->foo1();
        $data['res3']= $this->detailmodel->foo2();
        $this->load->view('vehicledetails',$data);
        }
        else {

          $this->session->set_flashdata('success8','Not Assigned Or Invalid Vehicle Number');

          $this->load->view('vehicledetails',$data);
          session_unset();
        }
      }
      else {
        $this->session->set_flashdata('success8','No Data');

        $this->load->view('vehicledetails');
        session_unset();
      }

  }
  
}










?>
