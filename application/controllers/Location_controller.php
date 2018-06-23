<?php

if(!Defined('BASEPATH'))
    exit ('No direct script access allowed');

class Location_controller extends CI_Controller
{
    public function index()
    {

        $this->load->model('Location_model');

    }


//
//    public function getCurrentLocation()	{
//        header('Content-type: text/xml');
//        $dom = new DOMDocument("1.0");
//        $node = $dom->createElement("markers");
//        $parnode = $dom->appendChild($node);
//        $this->load->model('Location_model');
//        $result = $this->Location_model->employeeLocation();
//        if (!$result) {
//            die('Invalid query: ' . mysqli_error($connection));
//        }
//        while ($row = @mysqli_fetch_assoc($result)){
//            $node = $dom->createElement("marker");
//            $newnode = $parnode->appendChild($node);
//            $newnode->setAttribute("id",$row['EmpID']);
//            $newnode->setAttribute("lng", $row['Longtitude']);
//            $newnode->setAttribute("lat", $row['Langtitude']);
//        }
//
//        echo $dom->saveXML();
//    }


    public function getCurrentLocations()
    {

        $type = $this->input->get('keyword');
        $this->load->model('Location_model');
        $markers = $this->Location_model->initiate();
        // this loop will change retrieved results to add links in the info window for the provider
        $data = array();
        if (count($markers)) {
            foreach ($markers as $row) {
                $marker['id'] = $row['EmpID'];
                $marker['name'] = $row['EmpID'];
                $marker['address'] = $row['TimeStamp'];
                $marker['lat'] = $row['Langtitude'];
                $marker['lng'] = $row['Longtitude'];
                $marker['type'] = $row['TimeStamp'];

                array_push($data, $marker);
            }
        }

        //var_dump($data);
        echo json_encode($data);

    }

    public function getEmployeeLocations()
    {


        $this->load->model('Location_model');
        $markers = $this->Location_model->empLocation();
        // this loop will change retrieved results to add links in the info window for the provider
        $data = array();
        if (count($markers)) {
            foreach ($markers as $row) {
                $marker['id'] = $row['EmpID'];
                $marker['name'] = $row['EmpID'];
                $marker['address'] = $row['TimeStamp'];
                $marker['lat'] = $row['Langtitude'];
                $marker['lng'] = $row['Longtitude'];
                $marker['type'] = $row['TimeStamp'];

                array_push($data, $marker);
            }
        }

        //var_dump($data);
        echo json_encode($data);

    }
}