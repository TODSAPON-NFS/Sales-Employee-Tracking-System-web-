<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class home extends CI_Controller {

  function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("session","form_validation"));
        $this->load->database();
    }


    public function index()
    {
        if(!$this->session->userdata('loggedin')) {
            $this->load->view('login');

        }
        else{
            redirect('home/loadHome');
        }

    }




    public function loadHome()
    {
        $this->load->view('home');
    }

    public function loadaddPerson()
    {
        $this->load->view('addPerson');
    }




    public function loademployeeprof()
    {
        $this->load->view('employeeprof1');
    }

    public function loadadminprof1()
    {
        $this->load->view('adminprof');
    }
    public function loadownerprof()
    {
        $this->load->view('ownerprof1');
    }
    public function loadvehicle()
    {
        $this->load->view('vehicle1');
    }



    public function loadCurrentLocationsView()
    {
        $this->load->view('currentLocations');
    }

    public function empLocation()
    {
        $this->load->view('empLocation');
    }

    public function loadAddTasks()
    {
        $this->load->view('tasks');
    }
    public function loadViewTasks()
    {
        $this->load->view('taskChat');
    }



}
