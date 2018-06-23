<?php

class Login_model extends CI_Model
{

    function login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $this->db->where('username', $username);
        $this->db->where('password', $password);
//  get user details from user table
        $respond = $this->db->get('user');
       // $picture = "SELECT person.Picture FROM person WHERE ";

        if ($respond->num_rows() == 1) {
            return $respond->row(0);
            die();
        } else {
            return false;
            die();
        }

    }
}