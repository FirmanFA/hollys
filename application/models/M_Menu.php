<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu extends CI_Model
{
	function getFoods()
	{
		$sql = 'SELECT * FROM menus WHERE type = "foods"';
		$query = $this->db->query($sql);

		return $query->result();
	}

	function getDrinks()
	{
		$sql = 'SELECT * FROM menus WHERE type = "drinks"';
		$query = $this->db->query($sql);

		return $query->result();
	}

	function getSnacks()
	{
		$sql = 'SELECT * FROM menus WHERE type = "snacks"';
		$query = $this->db->query($sql);

		return $query->result();
	}

	function getMenu($id)
	{
		$query = $this->db->select('*')->from('menus')->where('id',$id)->get();

		return $query->result();
	}

	function getAllMenu($search,$limit,$offset)
	{
		$sql = "SELECT * FROM menus WHERE name LIKE '%$search%' LIMIT $offset, $limit";

		$query = $this->db->query($sql);

		return $query->result();
	}

	function getMenuCount(){
		$query = $this->db->count_all('menus');

		return $query;

	}

	// Di bawah ini fungsi admin
	function insertDataMenus($data)
    {
        $this->db->insert('menus', $data); 
    }

	function updateDataMenus($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('menus', $data);
    }

    function deleteDataMenus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menus');
    }

	function getDataDetailMenus($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('menus');
        return $query->row();
    }
}
