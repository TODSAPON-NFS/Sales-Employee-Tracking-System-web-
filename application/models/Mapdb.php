<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapdb extends CI_model
{
//   public function initiate()
//   {
//     // Start XML file, create parent node
//   $doc = domxml_new_doc("1.0");
//   $node = $doc->create_element("markers");
//   $parnode = $doc->append_child($node);
//
//     // Select all the rows in the markers table
//
//     $query = "SELECT * FROM markers WHERE 1";
//     $result = $this->db->query($query);
//     if ($result->num_rows()<0) {
//         die('Invalid query: ' . mysqli_connect_error());
//     }
//
//     header("Content-type: text/xml");
//
//     // Iterate through the rows, adding XML nodes for each
//
//     foreach ($result->result_array() as $row) {
//         // Add to XML document node
//         $node = $dom->createElement("marker");
//         $newnode = $parnode->appendChild($node);
//         $newnode->setAttribute("id",$row['id']);
//         $newnode->setAttribute("name",$row['name']);
//         $newnode->setAttribute("address", $row['address']);
//         $newnode->setAttribute("lat", $row['lat']);
//         $newnode->setAttribute("lng", $row['lng']);
//         $newnode->setAttribute("type", $row['type']);
//     }
//
//     echo $dom->saveXML();
//
//   }
// }

  public function initiatee()  {

    // Select all data from location table

    $query = "SELECT * FROM location WHERE TimeStamp IN (SELECT max(TimeStamp) FROM location GROUP BY userName ) ORDER BY TimeStamp DESC ";
    $result = $this->db->query($query);
    if ($result->num_rows()>0) {

        return $result->result_array();
    }
  }


  public function initiate($type)
  {

    // Select all the rows in the markers table

    $query = "SELECT * FROM location WHERE type = 'e1'";
    $result = $this->db->query($query);
    if ($result->num_rows()>0) {

      return $result->result_array();
    }
  }

  public function addPlaces($data)
  {
    $this->db->insert('markers', $data);

  }



}


