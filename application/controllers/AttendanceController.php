<?php


class AttendanceController extends CI_Controller{
    public function attendance()	{

        $this->load->model('personmodel');
        $Username = $this->input->post('search');      /*Use the post method*/

        if($this->personmodel->getAttendance($Username)){
            $data['result1'] = $this->personmodel->getAttendance($Username);
            $this->load->view('reports',$data);
        }
        else{
            $this->session->set_flashdata('success8','Invalid username..!');
            $this->load->view('reports');
            session_unset();
        }






    }
}