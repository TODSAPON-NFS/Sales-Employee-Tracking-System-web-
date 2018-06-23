<?php



Class personmodel extends CI_Model {
    public function insertadmin(){
      $image_info = $this->upload->data();
        $data1 = array(
        'FirstName'=> $this->input->post('fname'),
        'LastName'=>$this->input->post('lname'),
        'AddressL1'=>$this->input->post('address'),
        'Gender'=>$this->input->post('gender'),
        'Date'=>$this->input->post('date'),
        'NIC'=>$this->input->post('nic'),
        'Picture' => $image_info['file_name']

        );

        $data2 = array(
        'Number'=> $this->input->post('contact'),
        'NIC'=>$this->input->post('nic')

        );

        $data3 = array(
        'Username'=> $this->input->post('username'),
        'Password'=>$this->input->post('password'),
        'Type'=>$this->input->post('type'),
        'NIC'=>$this->input->post('nic')

        );

        $data4 = array(
        'ManagerID'=> $this->input->post('managerid'),
        'NIC'=>$this->input->post('nic')

        );
        $this->db->insert('person',$data1);
        $this->db->insert('phonenumber',$data2);
        $this->db->insert('user',$data3);
        $this->db->insert('manager',$data4);
    }

    public function insertsalesemp(){
      $image_info = $this->upload->data();
        $data1 = array(
        'FirstName'=> $this->input->post('fname'),
        'LastName'=>$this->input->post('lname'),
        'AddressL1'=>$this->input->post('address'),
        'Gender'=>$this->input->post('gender'),
        'Date'=>$this->input->post('date'),
        'NIC'=>$this->input->post('nic'),
        'Picture' => $image_info['file_name']

        );
        $data4 = array(
        'Username'=> $this->input->post('username'),
        'Password'=>$this->input->post('password'),
        'Type'=>$this->input->post('type'),
        'NIC'=>$this->input->post('nic')

        );

        $data2 = array(
        'Number'=> $this->input->post('contact'),
        'NIC'=>$this->input->post('nic')

        );

        $data3 = array(
        'Availability'=> $this->input->post('availability'),
        'VehicleNo'=>$this->input->post('vehicleno'),
        'EmpID'=>$this->input->post('empid'),
        'NIC'=>$this->input->post('nic'),
        'ManagerID'=> $this->input->post('managerid')

        );
        $this->db->insert('person',$data1);
        $this->db->insert('phonenumber',$data2);
        $this->db->insert('employee',$data3);
        $this->db->insert('user',$data4);
    }

    public function insertvehicleowner(){
      $image_info = $this->upload->data();
        $data1 = array(
        'FirstName'=> $this->input->post('fname'),
        'LastName'=>$this->input->post('lname'),
        'AddressL1'=>$this->input->post('address'),
        'Gender'=>$this->input->post('gender'),
        'Date'=>$this->input->post('date'),
        'NIC'=>$this->input->post('nic'),
        'Picture' => $image_info['file_name']

        );

        $data2 = array(
        'OwnerID'=> $this->input->post('ownerid'),
        'NIC'=>$this->input->post('nic')

        );

        $data3 = array(
        'Number'=> $this->input->post('contact'),
        'NIC'=>$this->input->post('nic')

        );
        $data4 = array(
        'Username'=> $this->input->post('username'),
        'Password'=>$this->input->post('password'),
        'Type'=>$this->input->post('type'),
        'NIC'=>$this->input->post('nic')

        );

        $this->db->insert('person',$data1);
        $this->db->insert('vehicleowner',$data2);
        $this->db->insert('phonenumber',$data3);
        $this->db->insert('user',$data4);
    }

    public function insertvehicle(){
      $image_info = $this->upload->data();
        $data1 = array(
        'OwnerID'=> $this->input->post('ownerid'),
        'brand'=>$this->input->post('brand'),
        'Model'=>$this->input->post('model'),
        'VehicleNo'=>$this->input->post('vehicleno'),
        'RegNo'=>$this->input->post('regno'),
        'Picture' => $image_info['file_name']

        );

        $this->db->insert('vehicle',$data1);

    }

    public function viewemployee(){
        $managerid=$this->input->post('managerid');
        $availability=$this->input->post('status');
        $where = array('ManagerID' => $managerid, 'Availability' => $availability);

        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where($where);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else {
          return false;
        }

    }

    public function viewemployeeprof1(){
        $empid=$this->input->post('empid');


        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('EmpID',$empid);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else {
          return false;
        }

    }
    public function viewemployeeprof2(){
        $empid=$this->input->post('empid');

          $this->db->select('*');
          $this->db->from('person');
          $this->db->join('employee', 'person.NIC = employee.NIC', 'inner');
          $this->db->where('EmpID',$empid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function viewemployeeprof3(){
        $empid=$this->input->post('empid');

          $this->db->select('*');
          $this->db->from('phonenumber');
          $this->db->join('employee', 'phonenumber.NIC = employee.NIC', 'inner');
          $this->db->where('EmpID',$empid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function viewemployeeprof4(){
        $empid=$this->input->post('empid');

          $this->db->select('*');
          $this->db->from('user');
          $this->db->join('employee', 'user.NIC = employee.NIC', 'inner');
          $this->db->where('EmpID',$empid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }


    public function updateemployee(){
      $nic=$this->input->post('nic');

      $data1 = array(
      'FirstName'=> $this->input->post('fname'),
      'LastName'=>$this->input->post('lname'),
      'AddressL1'=>$this->input->post('address'),
      'Gender'=>$this->input->post('gender'),
      'Date'=>$this->input->post('date'),
      'NIC'=>$this->input->post('nic')

      );
      $data3 = array(
      'Availability'=> $this->input->post('availability'),
      'VehicleNo'=>$this->input->post('vehicleno'),
      'EmpID'=>$this->input->post('empid'),
      'NIC'=>$this->input->post('nic'),
      'ManagerID'=> $this->input->post('managerid')

      );
      $data2 = array(
      'Number'=> $this->input->post('contact'),
      'NIC'=>$this->input->post('nic')

      );
      $data4 = array(
      'Username'=> $this->input->post('username'),
      'Password'=>$this->input->post('password'),
      'Type'=>$this->input->post('type'),
      'NIC'=>$this->input->post('nic')

      );

        $this->db->where('NIC', $nic);
        $this->db->update('person', $data1);
        $this->db->where('NIC', $nic);
        $this->db->update('employee', $data3);
        $this->db->where('NIC', $nic);
        $this->db->update('phonenumber', $data2);
        $this->db->where('NIC', $nic);
        $this->db->update('user', $data4);
        if ($this->db->affected_rows()>0) {
          return true;

        }
        else {
          return false;

        }
    }
    public function deleteemployeeprof(){
        $nic=$this->input->post('nic');


        $this->db->where('NIC', $nic);
        $this->db->delete('person');
        if ($this->db->affected_rows()) {
          return true;

        }
        else {
          return false;

        }



    }
    public function viewadminprof1(){
        $managerid=$this->input->post('managerid');


        $this->db->select('*');
        $this->db->from('manager');
        $this->db->where('ManagerID',$managerid);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else {
          return false;
        }

    }
    public function viewadminprof2(){
        $managerid=$this->input->post('managerid');

          $this->db->select('*');
          $this->db->from('person');
          $this->db->join('manager', 'person.NIC = manager.NIC', 'inner');
          $this->db->where('ManagerID',$managerid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function viewadminprof3(){
        $managerid=$this->input->post('managerid');

          $this->db->select('*');
          $this->db->from('phonenumber');
          $this->db->join('manager', 'phonenumber.NIC = manager.NIC', 'inner');
          $this->db->where('ManagerID',$managerid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function updateadmin(){
      $nic=$this->input->post('nic');

      $data1 = array(
      'FirstName'=> $this->input->post('fname'),
      'LastName'=>$this->input->post('lname'),
      'AddressL1'=>$this->input->post('address'),
      'Gender'=>$this->input->post('gender'),
      'Date'=>$this->input->post('date'),
      'NIC'=>$this->input->post('nic')

      );
      $data2 = array(
      'Number'=> $this->input->post('contact'),
      'NIC'=>$this->input->post('nic')

      );
      $data3 = array(
      'Username'=> $this->input->post('username'),
      'Password'=>$this->input->post('password'),
      'Type'=>$this->input->post('type'),
      'NIC'=>$this->input->post('nic')

      );

      $data4 = array(
      'ManagerID'=> $this->input->post('managerid'),
      'NIC'=>$this->input->post('nic')

      );

        $this->db->where('NIC', $nic);
        $this->db->update('person', $data1);
        $this->db->where('NIC', $nic);
        $this->db->update('user', $data3);
        $this->db->where('NIC', $nic);
        $this->db->update('phonenumber', $data2);
        $this->db->where('NIC', $nic);
        $this->db->update('manager', $data4);
        if ($this->db->affected_rows()>0) {
          return true;

        }
        else {
          return false;

        }
    }
    public function deleteadminprof(){
        $nic=$this->input->post('nic');


        $this->db->where('NIC', $nic);
        $this->db->delete('person');
        if ($this->db->affected_rows()) {
          return true;

        }
        else {
          return false;

        }



    }
    public function viewownerprof1(){
        $ownerid=$this->input->post('ownerid');


        $this->db->select('*');
        $this->db->from('vehicleowner');
        $this->db->where('OwnerID',$ownerid);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else {
          return false;
        }

    }
    public function viewownerprof2(){
        $ownerid=$this->input->post('ownerid');

          $this->db->select('*');
          $this->db->from('person');
          $this->db->join('vehicleowner', 'person.NIC = vehicleowner.NIC', 'inner');
          $this->db->where('OwnerID',$ownerid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function viewownerprof3(){
        $ownerid=$this->input->post('ownerid');

          $this->db->select('*');
          $this->db->from('phonenumber');
          $this->db->join('vehicleowner', 'phonenumber.NIC = vehicleowner.NIC', 'inner');
          $this->db->where('OwnerID',$ownerid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function viewownerprof4(){
        $ownerid=$this->input->post('ownerid');

          $this->db->select('*');
          $this->db->from('user');
          $this->db->join('vehicleowner', 'user.NIC = vehicleowner.NIC', 'inner');
          $this->db->where('OwnerID',$ownerid);
          $query1 = $this->db->get();

          if ( $query1->num_rows() > 0 )
          {
              return $query1->result_array();
          }
          else {
            return false;
          }

    }
    public function updateowner(){
      $nic=$this->input->post('nic');

      $data1 = array(
      'FirstName'=> $this->input->post('fname'),
      'LastName'=>$this->input->post('lname'),
      'AddressL1'=>$this->input->post('address'),
      'Gender'=>$this->input->post('gender'),
      'Date'=>$this->input->post('date'),
      'NIC'=>$this->input->post('nic')

      );
      $data3 = array(
      'OwnerID'=>$this->input->post('ownerid'),
      'NIC'=>$this->input->post('nic')
      );

      $data2 = array(
      'Number'=> $this->input->post('contact'),
      'NIC'=>$this->input->post('nic')

      );
      $data4 = array(
      'Username'=> $this->input->post('username'),
      'Password'=>$this->input->post('password'),
      'Type'=>$this->input->post('type'),
      'NIC'=>$this->input->post('nic')

      );

        $this->db->where('NIC', $nic);
        $this->db->update('person', $data1);
        $this->db->where('NIC', $nic);
        $this->db->update('vehicleowner', $data3);
        $this->db->where('NIC', $nic);
        $this->db->update('phonenumber', $data2);
        $this->db->where('NIC', $nic);
        $this->db->update('user', $data4);
        if ($this->db->affected_rows()>0) {
          return true;

        }
        else {
          return false;

        }
    }
    public function deleteownerprof(){
        $nic=$this->input->post('nic');


        $this->db->where('NIC', $nic);
        $this->db->delete('person');
        if ($this->db->affected_rows()) {
          return true;

        }
        else {
          return false;

        }



    }

    public function viewvehicle(){
        $vehicleno=$this->input->post('vehicleno');


        $this->db->select('*');
        $this->db->from('vehicle');
        $this->db->where('VehicleNo',$vehicleno);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else {
          return false;
        }

    }

    public function updatevehicle(){
      $vehicleno=$this->input->post('vehicleno');

      $data1 = array(
      'VehicleNo'=> $this->input->post('vehicleno'),
      'RegNo'=>$this->input->post('regno'),
      'Brand'=>$this->input->post('brand'),
      'Model'=>$this->input->post('model'),
      'OwnerID'=>$this->input->post('ownerid')


      );


        $this->db->where('VehicleNo', $vehicleno);
        $this->db->update('vehicle', $data1);

        if ($this->db->affected_rows()>0) {
          return true;

        }
        else {
          return false;

        }
    }
    public function deletevehicle(){
        $vehicleno=$this->input->post('vehicleno');


        $this->db->where('VehicleNo', $vehicleno);
        $this->db->delete('vehicle');
        if ($this->db->affected_rows()) {
          return true;

        }
        else {
          return false;

        }



    }
	public function getAttendance($Username) /*function to get the attendance details of employees */
    {



        $query = "SELECT p.FirstName, p.LastName, a.timeStamp, a.attendance FROM attendance a 
                  INNER JOIN user u ON u.Username = a.Username 
                  INNER JOIN person p ON p.NIC = u.NIC WHERE u.Username = '$Username'"; //search with the username.


        $result = $this->db->query($query);
        if ($result->num_rows() > 0 ) {

            return $result->result_array();

        } else {
            return false;
        }


        }




  }

?>
