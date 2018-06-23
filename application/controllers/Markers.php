<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Markers extends CI_Controller
{

  public function index ()
  {
      $this->load->view('pages/googlemap');
      $this->load->model('mapdb');

  }

  // this function receive ajax request and return closest providers
  public function closest_locations(){

      $type=$this->input->get('keyword');
      $this->load->model('mapdb');
      $markers= $this->mapdb->initiate();
      // this loop will change retrieved results to add links in the info window for the provider
      $data=array();
      if (count($markers)) {
        foreach ($markers as $row)
        {
          $marker['id']=$row['userName'];
          $marker['name']=$row['userName'];
          $marker['address']=$row['userName'];
          $marker['lat']=$row['Langtitude'];
          $marker['lng']=$row['Longtitude'];
          $marker['type']=$row['userName'];

          array_push($data,$marker);
        }
      }

      //var_dump($data);
      echo json_encode($data);

  }

    public function closest_locations2(){

        $type=$this->input->get('keyword');
        $this->load->model('mapdb');
        $markers= $this->mapdb->initiate2();
        // this loop will change retrieved results to add links in the info window for the provider
        $data=array();
        if (count($markers)) {
            foreach ($markers as $row)
            {
                $marker['id']=$row['userName'];
                $marker['name']=$row['userName'];
                $marker['address']=$row['userName'];
                $marker['lat']=$row['Langtitude'];
                $marker['lng']=$row['Longtitude'];
                $marker['type']=$row['useName'];

                array_push($data,$marker);
            }
        }

        //var_dump($data);
        echo json_encode($data);

    }


  public function update_places()
  {
    $this->load->view('pages/Admin/updateplaces_page');
  }
  public function add_markers()
  {
    $this->form_validation->set_rules('name','Place Name','required');
    $this->form_validation->set_rules('address','Address','required');
    $this->form_validation->set_rules('lat','latitude','required|callback_regex_check');
    $this->form_validation->set_rules('lang','longitude','required|callback_regex_check');
    $this->form_validation->set_rules('type','Type','required');

    if($this->form_validation->run()==FALSE)
    {
      $this->load->view('pages/Admin/updateplaces_page');
    }
    else
    {
      $data['name'] =$this->input->post('name');
      $data['address'] =$this->input->post('address');
      $data['lat'] =$this->input->post('lat');
      $data['lng'] =$this->input->post('lang');
      $data['type'] =$this->input->post('type');
      //$data['description'] =$this->input->post('description');
      if($this->getDistance($data['lat'],$data['lng']))
      {
            $this->form_validation->set_message('longitude', 'The cordinates are not within the range!');
            $this->load->view('pages/Admin/updateplaces_page');

      }
      $this->load->model('mapdb');
      $this->mapdb->addPlaces($data);
    }




  }

  public function getDistance($latitude2, $longitude2) {
    $earth_radius = 6371;
    $latitude1 = 6.902431;
    $longitude1 =79.861326;
    $dLat = deg2rad($latitude2 - $latitude1);
    $dLon = deg2rad($longitude2 - $longitude1);

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;
    echo $d;

    if($d>1000){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function regex_check($str)
  {
      if (1 === preg_match("/^[+-]?([0-9]*[.])?[0-9]+$/", $str))
      {
          return TRUE;
      }
      else
      {
          $this->form_validation->set_message('regex_check', 'The %s field is not valid!');
          return FALSE;
      }
  }

}



