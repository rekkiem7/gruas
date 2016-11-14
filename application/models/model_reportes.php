<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Reportes extends CI_Model
{
    function all_operarios()
    {
        $query=$this->db->get('operario');
        if($query -> num_rows() >0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}