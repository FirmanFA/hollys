<?php  
defined('BASEPATH') OR exit('no direct script access allowed');

class M_Superadmin extends CI_Model 
{
    function getDataAdmin()
    {
        // Ambil semua user yang bukan member
        // $this->db->where('role_id !=', 2);
        $query = $this->db->get('users');
        return $query->result();
    }

    function insertDataAdmin($data)
    {
        $this->db->insert('users', $data); 
    }

    function getDataDetailAdmin($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    function updateDataAdmin($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function deleteDataAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}

?>