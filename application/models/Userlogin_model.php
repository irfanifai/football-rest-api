<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin_model extends CI_Model {

    public function index($id = null)
    {
        if ($id === null ){
            return $this->db->get('user_login')->result_array();
        } else {
            return $this->db->get_where('user_login', ['id' => $id])->result_array();
        }
    }

    public function delete($id)
    {
        $this->db->delete('user_login', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function create($data)
    {
        $this->db->insert('user_login', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('user_login', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

}

/* End of file Userlogin_model.php */
